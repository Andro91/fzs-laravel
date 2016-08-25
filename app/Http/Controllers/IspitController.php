<?php

namespace App\Http\Controllers;

use App\AktivniIspitniRokovi;
use App\Kandidat;
use App\Predmet;
use App\PrijavaIspita;
use App\ZapisnikOPolaganju_Student;
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
        //dd($ids);
        $aktivniIspitniRok = AktivniIspitniRokovi::all();
        $predmeti = Predmet::all();
        $studenti = Kandidat::whereIn('id', $ids)->get();
        //dd($studenti);
        $rok_id = $request->rok_id;
        $predmet_id = $request->predmet_id;

        return view('ispit.createZapisnik', compact('aktivniIspitniRok','predmeti', 'studenti', 'rok_id', 'predmet_id'));
    }

    public function storeZapisnik(Request $request)
    {
        $zapisnik = new ZapisnikOPolaganjuIspita($request->all());
        $zapisnik->save();

        foreach ($request->odabir as $id) {
            $zapisStudent = new ZapisnikOPolaganju_Student();
            $zapisStudent->zapisnik_id = $zapisnik->id;
            $zapisStudent->kandidat_id = $id;
            $zapisStudent->save();
        }

        return redirect('/zapisnik/');

    }

}
