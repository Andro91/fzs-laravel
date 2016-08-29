<?php

namespace App\Http\Controllers;

use App\AktivniIspitniRokovi;
use App\Kandidat;
use App\PolozeniIspiti;
use App\Predmet;
use App\PrijavaIspita;
use App\StatusIspita;
use App\ZapisnikOPolaganju_Student;
use App\ZapisnikOPolaganju_StudijskiProgram;
use App\ZapisnikOPolaganjuIspita;
use Illuminate\Http\Request;

use App\Http\Requests;

class IspitController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function indexZapisnik()
    {
        $zapisnici = ZapisnikOPolaganjuIspita::all();
        return view('ispit.indexZapisnik', compact('zapisnici'));
    }

    public function createZapisnik()
    {
        $aktivniIspitniRok = AktivniIspitniRokovi::all();
        if(count($aktivniIspitniRok->all()) == 0){
            $aktivniIspitniRok = null;
        }
        $predmeti = Predmet::all();

        $rok_id = null;
        $predmet_id = null;

        return view('ispit.createZapisnik', compact('aktivniIspitniRok','predmeti', 'rok_id', 'predmet_id' ));
    }

    public function podaci(Request $request)
    {
        $prijavaIspita = PrijavaIspita::where(['predmet_id' => $request->predmet_id, 'rok_id' => $request->rok_id])->get();
        $ids = array_map(function(PrijavaIspita $o) { return $o->kandidat_id; }, $prijavaIspita->all());

        $prijavaIds = array();
        foreach ($ids as $id) {
            $pom = PrijavaIspita::where(['predmet_id' => $request->predmet_id, 'rok_id' => $request->rok_id, 'kandidat_id' => $id])->first();
            if($pom != null){
                $prijavaIds[$id] = $pom->id;
            }

        }

        $aktivniIspitniRok = AktivniIspitniRokovi::all();
        $predmeti = Predmet::all();
        $studenti = Kandidat::whereIn('id', $ids)->get();
        //dd($studenti);
        $rok_id = $request->rok_id;
        $predmet_id = $request->predmet_id;

        if(!empty($prijavaIds)){
            return view('ispit.createZapisnik', compact('aktivniIspitniRok','predmeti', 'studenti', 'rok_id', 'predmet_id', 'prijavaIds'));
        }else{
            return view('ispit.createZapisnik', compact('aktivniIspitniRok','predmeti', 'studenti', 'rok_id', 'predmet_id'));
        }

    }

    public function storeZapisnik(Request $request)
    {
        $zapisnik = new ZapisnikOPolaganjuIspita($request->all());
        $zapisnik->save();

        foreach ($request->odabir as $id) {
            $zapisStudent = new ZapisnikOPolaganju_Student();
            $zapisStudent->zapisnik_id = $zapisnik->id;
            $zapisStudent->prijavaIspita_id = $request->odabir2[$id];
            $zapisStudent->kandidat_id = $id;
            $zapisStudent->save();

            $kandidat = Kandidat::find($id);
            $prijava = $kandidat->prijaveIspita()->where(['rok_id' => $zapisnik->rok_id, 'predmet_id' => $zapisnik->predmet_id])->first();

            $polozenIspit = new PolozeniIspiti();
            $polozenIspit->indikatorAktivan = 0;
            $polozenIspit->kandidat_id = $id;
            $polozenIspit->predmet_id = $zapisnik->predmet_id;
            $polozenIspit->zapisnik_id = $zapisnik->id;
            $polozenIspit->prijava_id = $prijava->id;
            $polozenIspit->save();
        }

        return redirect('/zapisnik/');

    }

    public function deleteZapisnik($id)
    {
        ZapisnikOPolaganjuIspita::destroy($id);
        ZapisnikOPolaganju_Student::where(['zapisnik_id' => $id])->delete();
        ZapisnikOPolaganju_StudijskiProgram::where(['zapisnik_id' => $id])->delete();

        return \Redirect::back();
    }

    public function pregledZapisnik($zapisnikId)
    {
        $zapisnik = ZapisnikOPolaganjuIspita::find($zapisnikId);
        $zapisnikStudent = ZapisnikOPolaganju_Student::where(['zapisnik_id' => $zapisnikId])->get();
        $ids = array_map(function(ZapisnikOPolaganju_Student $o) { return $o->kandidat_id; }, $zapisnikStudent->all());
        $studenti = Kandidat::whereIn('id', $ids)->get();

        $prijavaIds = array();
        foreach ($ids as $id) {
            $pom = PrijavaIspita::where(['predmet_id' => $zapisnik->predmet_id, 'rok_id' => $zapisnik->rok_id, 'kandidat_id' => $id])->first();
            if($pom != null){
                $prijavaIds[$id] = $pom->id;
            }
        }

        $polozeniIspitIds = array();
        foreach ($ids as $id) {
            $pom = PolozeniIspiti::where(['zapisnik_id' => $zapisnik->id, 'predmet_id' => $zapisnik->predmet_id, 'kandidat_id' => $id])->first();
            if($pom != null){
                $polozeniIspitIds[$id] = $pom->id;
            }
        }

        $studijskiProgrami = ZapisnikOPolaganju_StudijskiProgram::where(['zapisnik_id' => $zapisnikId])->get();
        $statusIspita = StatusIspita::all();
        $polozeniIspiti = PolozeniIspiti::where(['zapisnik_id' => $zapisnikId])->get();

        return view('ispit.pregledZapisnik', compact('zapisnik','studenti','studijskiProgrami','statusIspita', 'polozeniIspiti', 'polozeniIspitIds', 'prijavaIds'));
    }

    public function polozeniIspit(Request $request)
    {
        $zapisnikId = 0;
        foreach ($request->ispit_id as $index => $ispit) {
            $polozeniIspit = PolozeniIspiti::find($ispit);
            $polozeniIspit->ocenaPismeni = $request->ocenaPismeni[$index];
            $polozeniIspit->ocenaUsmeni = $request->ocenaUsmeni[$index];
            $polozeniIspit->konacnaOcena = $request->konacnaOcena[$index];
            $polozeniIspit->brojBodova = $request->brojBodova[$index];
            $polozeniIspit->statusIspita = $request->statusIspita[$index];
            $polozeniIspit->indikatorAktivan = 1;
            $polozeniIspit->save();

            $zapisnikId = $polozeniIspit->zapisnik_id;
        }

        return redirect('/zapisnik/pregled/' . $zapisnikId);
    }

}
