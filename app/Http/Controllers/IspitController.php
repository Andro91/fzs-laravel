<?php

namespace App\Http\Controllers;

use App\AktivniIspitniRokovi;
use App\Kandidat;
use App\PolozeniIspiti;
use App\Predmet;
use App\PredmetProgram;
use App\PrijavaIspita;
use App\Profesor;
use App\StatusIspita;
use App\ZapisnikOPolaganju_Student;
use App\ZapisnikOPolaganju_StudijskiProgram;
use App\ZapisnikOPolaganjuIspita;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class IspitController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function indexZapisnik(Request $request)
    {
        $zapisnici = ZapisnikOPolaganjuIspita::where(['arhiviran' => false]);
        if(!empty($request->filter_predmet_id)){
            $zapisnici = $zapisnici->where(['predmet_id' => $request->filter_predmet_id]);
        }
        if(!empty($request->filter_rok_id)){
            $zapisnici = $zapisnici->where(['rok_id' => $request->filter_rok_id]);
        }
        if(!empty($request->filter_profesor_id)){
            $zapisnici = $zapisnici->where(['profesor_id' => $request->filter_profesor_id]);
        }

        $zapisnici = $zapisnici->get();

        $predmeti = Predmet::all();
        $profesori = Profesor::all();
        $aktivniIspitniRok = AktivniIspitniRokovi::where(['indikatorAktivan' => 1])->get();

        return view('ispit.indexZapisnik', compact('zapisnici', 'predmeti', 'profesori', 'aktivniIspitniRok'));
    }

    public function createZapisnik()
    {
        $aktivniIspitniRok = AktivniIspitniRokovi::all();
        if (count($aktivniIspitniRok->all()) == 0) {
            $aktivniIspitniRok = null;
        }
        $predmeti = Predmet::all();

        $profesori = Profesor::all();

        $rok_id = null;
        $predmet_id = null;

        return view('ispit.createZapisnik', compact('aktivniIspitniRok', 'predmeti', 'rok_id', 'predmet_id', 'profesori'));
    }

    public function vratiZapisnikPredmet(Request $request)
    {
        $prijava = PrijavaIspita::where([
            'rok_id' => $request->rokId
        ])->select('predmet_id', 'profesor_id')->get();
        $predmetId = array_unique($prijava->pluck('predmet_id')->all());
        $profesorId = array_unique($prijava->pluck('profesor_id')->all());

        $profesori = Profesor::whereIn('id', $profesorId)->get()->isEmpty()
            ? Profesor::all()
            : Profesor::whereIn('id', $profesorId)->get();

        return ['predmeti' => $predmeti = Predmet::whereIn('id', $predmetId)->get(), 'profesori' => $profesori];
    }

    public function vratiZapisnikStudenti(Request $request)
    {
        $prijava = PrijavaIspita::where([
            'rok_id' => $request->rok_id,
            'predmet_id' => $request->predmet_id,
            'profesor_id' => $request->profesor_id
        ])->get();

        $prijavaId = $prijava->isEmpty() ? null : $prijava->first()->id;

        $studentiId = $prijava->pluck('kandidat_id')->all();

        $message = count($studentiId) == 0 ? '<div class="alert alert-dismissable alert-info"><strong>Обавештење: </strong> Нема студената пријављених за испит.</div>' : '';

        return [
            'message' => $message,
            'kandidati' => Kandidat::whereIn('id', $studentiId)->select(['id', 'brojIndeksa', 'imeKandidata', 'prezimeKandidata'])->get(),
            'prijavaId' => $prijavaId
        ];
    }

    public function podaci(Request $request)
    {
        $prijavaIspita = PrijavaIspita::where(['predmet_id' => $request->predmet_id, 'rok_id' => $request->rok_id])->get();
        $ids = array_map(function (PrijavaIspita $o) {
            return $o->kandidat_id;
        }, $prijavaIspita->all());

        $prijavaIds = array();
        foreach ($ids as $id) {
            $pom = PrijavaIspita::where(['predmet_id' => $request->predmet_id, 'rok_id' => $request->rok_id, 'kandidat_id' => $id])->first();
            if ($pom != null) {
                $prijavaIds[$id] = $pom->id;
            }
        }

        $aktivniIspitniRok = AktivniIspitniRokovi::all();
        $predmeti = PredmetProgram::all();
        $studenti = Kandidat::whereIn('id', $ids)->get();
        //dd($studenti);
        $rok_id = $request->rok_id;
        $predmet_id = $request->predmet_id;

        if (!empty($prijavaIds)) {
            return view('ispit.createZapisnik', compact('aktivniIspitniRok', 'predmeti', 'studenti', 'rok_id', 'predmet_id', 'prijavaIds'));
        } else {
            return view('ispit.createZapisnik', compact('aktivniIspitniRok', 'predmeti', 'studenti', 'rok_id', 'predmet_id'));
        }

    }

    public function storeZapisnik(Request $request)
    {
        $messages = [
            'odabir.required' => 'Нисте одабрали студенте за полагање испита!',
        ];

        $this->validate($request, [
            'odabir' => 'required',
        ], $messages);

        try {
            $zapisnik = new ZapisnikOPolaganjuIspita($request->all());
            $zapisnik->save();

            $smerovi = array();

            foreach ($request->odabir as $id) {
                $zapisStudent = new ZapisnikOPolaganju_Student();
                $zapisStudent->zapisnik_id = $zapisnik->id;
                $zapisStudent->prijavaIspita_id = $zapisnik->prijavaIspita_id;
                $zapisStudent->kandidat_id = $id;
                $zapisStudent->save();

                $kandidat = Kandidat::find($id);
                $smerovi[] = $kandidat->studijskiProgram_id;

                $polozenIspit = new PolozeniIspiti();
                $polozenIspit->indikatorAktivan = 0;
                $polozenIspit->kandidat_id = $id;
                $polozenIspit->predmet_id = $zapisnik->predmet_id;
                $polozenIspit->zapisnik_id = $zapisnik->id;
                $polozenIspit->prijava_id = $zapisnik->prijavaIspita_id;
                $polozenIspit->save();
            }

            $smerovi = array_unique($smerovi);
            foreach ($smerovi as $id) {
                $zapisSmer = new ZapisnikOPolaganju_StudijskiProgram();
                $zapisSmer->zapisnik_id = $zapisnik->id;
                $zapisSmer->StudijskiProgram_id = $id;
                $zapisSmer->save();
            }

        }catch (QueryException $ex){
            Session::flash('flash-error', 'create');
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
        $zapisnikStudent = ZapisnikOPolaganju_Student::where(['zapisnik_id' => $zapisnikId])->pluck('kandidat_id')->all();
        $studenti = Kandidat::whereIn('id', $zapisnikStudent)->get();

        $prijavaIds = array();
        foreach ($zapisnikStudent as $id) {
            $pom = PrijavaIspita::where(['predmet_id' => $zapisnik->predmet_id, 'rok_id' => $zapisnik->rok_id, 'kandidat_id' => $id])->first();
            if ($pom != null) {
                $prijavaIds[$id] = $pom->id;
            }
        }

        $polozeniIspitIds = array();
        foreach ($zapisnikStudent as $id) {
            $pom = PolozeniIspiti::where(['zapisnik_id' => $zapisnik->id, 'predmet_id' => $zapisnik->predmet_id, 'kandidat_id' => $id])->first();
            if ($pom != null) {
                $polozeniIspitIds[$id] = $pom->id;
            }
        }

        $studijskiProgrami = ZapisnikOPolaganju_StudijskiProgram::where(['zapisnik_id' => $zapisnikId])->get();
        $statusIspita = StatusIspita::all();
        $polozeniIspiti = PolozeniIspiti::where(['zapisnik_id' => $zapisnikId])->get()->all();
        $kandidati = Kandidat::all();

        return view('ispit.pregledZapisnik', compact('zapisnik', 'studenti', 'studijskiProgrami', 'statusIspita', 'polozeniIspiti', 'polozeniIspitIds', 'prijavaIds','kandidati'));
    }

    public function polozeniIspit(Request $request)
    {
        $zapisnikId = 0;
        foreach ($request->ispit_id as $index => $ispit) {
//            if($request->brojBodova[$index] == 0){
//                continue;
//            }
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

    public function priznavanjeIspita($id)
    {
        $kandidat = Kandidat::find($id);

        $predmetProgram = PredmetProgram::where([
            'tipStudija_id' => $kandidat->tipStudija_id,
            'studijskiProgram_id' => $kandidat->studijskiProgram_id
        ])->orderBy('semestar')->get();

        return view('ispit.priznatiIspiti', compact('kandidat', 'predmetProgram'));
    }

    public function storePriznatiIspiti(Request $request)
    {
        foreach ($request->predmetId as $index => $ispit) {

            $polozenIspit = new PolozeniIspiti();
            $polozenIspit->kandidat_id = $request->kandidat_id;
            $polozenIspit->predmet_id = $ispit;
            $polozenIspit->zapisnik_id = 0;
            $polozenIspit->prijava_id = 0;
            $polozenIspit->konacnaOcena = $request->konacnaOcena[$index];
            $polozenIspit->statusIspita = 5;
            $polozenIspit->indikatorAktivan = 1;
            $polozenIspit->save();
        }

        return redirect("/prijava/zaStudenta/{$request->kandidat_id}");
    }

    public function deletePriznatIspit($id)
    {
        $polozenIspit = PolozeniIspiti::find($id);
        $kandidatId = $polozenIspit->kandidat_id;
        $polozenIspit->delete();

        return redirect("/prijava/zaStudenta/{$kandidatId}");
    }

    //Brisanje ispita sa privremene forme za retroaktivne studente
    public function deletePrivremeniIspit($id)
    {
        $polozenIspit = PolozeniIspiti::find($id);
        $polozenIspit->delete();

        return Redirect::back();
    }

    public function pregledZapisnikDelete($zapisnikId, $kandidatId)
    {
        ZapisnikOPolaganju_Student::where([
            'zapisnik_id' => $zapisnikId,
            'kandidat_id' => $kandidatId
        ])->delete();

        PolozeniIspiti::where([
            'zapisnik_id' => $zapisnikId,
            'kandidat_id' => $kandidatId
        ])->delete();

        return \Redirect::back();
    }

    public function dodajStudenta(Request $request)
    {
        $zapisnikId = $request->zapisnikId;

        $messages = [
            'odabir.required' => 'Нисте одабрали студенте за полагање испита!',
        ];

        $this->validate($request, [
            'odabir' => 'required',
        ], $messages);

        try {
            $zapisnik = ZapisnikOPolaganjuIspita::find($zapisnikId);

            $prijavljeniStudenti = ZapisnikOPolaganju_Student::where([
                'zapisnik_id' => $zapisnikId
            ])->pluck('kandidat_id')->all();

            $prijavljeniSmerovi = ZapisnikOPolaganju_StudijskiProgram::where([
                'zapisnik_id' => $zapisnikId
            ])->pluck('studijskiProgram_id')->all();

            $smerovi = array();

            foreach ($request->odabir as $id) {
                if(in_array($id, $prijavljeniStudenti)){
                    //ako student vec postoji u zapisniku, preskacemo ga
                    continue;
                }

                $zapisStudent = new ZapisnikOPolaganju_Student();
                $zapisStudent->zapisnik_id = $zapisnik->id;
                $zapisStudent->prijavaIspita_id = $zapisnik->prijavaispita_id;
                $zapisStudent->kandidat_id = $id;
                $zapisStudent->save();

                $kandidat = Kandidat::find($id);
                if(!in_array($kandidat->studijskiProgram_id, $prijavljeniSmerovi)){
                    $smerovi[] = $kandidat->studijskiProgram_id;
                }

                $polozenIspit = new PolozeniIspiti();
                $polozenIspit->indikatorAktivan = 0;
                $polozenIspit->kandidat_id = $id;
                $polozenIspit->predmet_id = $zapisnik->predmet_id;
                $polozenIspit->zapisnik_id = $zapisnik->id;
                $polozenIspit->prijava_id = $zapisnik->prijavaispita_id;
                $polozenIspit->save();

                $prijavaIspita = new PrijavaIspita();
                $prijavaIspita->kandidat_id = $id;
                $prijavaIspita->predmet_id = $zapisnik->predmet_id;
                $prijavaIspita->profesor_id = $zapisnik->profesor_id;
                $prijavaIspita->rok_id = $zapisnik->rok_id;
                $prijavaIspita->brojPolaganja = 1;
                $prijavaIspita->datum = Carbon::now();
                $prijavaIspita->tipPrijave_id = 0;
                $prijavaIspita->save();
            }

            $smerovi = array_unique($smerovi);
            foreach ($smerovi as $id) {
                $zapisSmer = new ZapisnikOPolaganju_StudijskiProgram();
                $zapisSmer->zapisnik_id = $zapisnik->id;
                $zapisSmer->StudijskiProgram_id = $id;
                $zapisSmer->save();
            }

        }catch (QueryException $ex){
            dd($ex);
            Session::flash('flash-error', 'Дошло је до грешке!');
        }

        return redirect('/zapisnik/pregled/' . $zapisnikId);
    }

    public function izmeniPodatke(Request $request)
    {
        $zapisnik = ZapisnikOPolaganjuIspita::find($request->zapisnikId);

        $zapisnik->vreme = $request->vreme;
        $zapisnik->ucionica = $request->ucionica;
        $zapisnik->save();

        return Redirect::back();

    }

    public function arhivaZapisnik()
    {
        $arhiviraniZapisnici = ZapisnikOPolaganjuIspita::where(['arhiviran' => true])->get();
        $aktivniIspitniRok = AktivniIspitniRokovi::where(['indikatorAktivan' => 1])->get();
        return view('ispit.arhivaZapisnik', compact('arhiviraniZapisnici', 'aktivniIspitniRok'));
    }

    public function arhivirajZapisnik($id)
    {
        $zapsinik = ZapisnikOPolaganjuIspita::find($id);

        $zapsinik->arhiviran = true;
        $zapsinik->save();

        return Redirect::back();
    }

    public function arhivirajZapisnikeZaIspitniRok(Request $requset)
    {
        $zapsinici = ZapisnikOPolaganjuIspita::where(['rok_id'=>$requset->rok_id])->get();

        foreach ($zapsinici as $zapsinik) {
            $zapsinik->arhiviran = true;
            $zapsinik->save();
        }

        return Redirect::back();
    }

}
