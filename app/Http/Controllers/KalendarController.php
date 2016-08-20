<?php

namespace App\Http\Controllers;

use App\AktivniIpsitniRokovi;
use App\IspitniRok;
use Illuminate\Http\Request;

use App\Http\Requests;

class KalendarController extends Controller
{
    public function index()
    {
        return view('kalendar.kalendar');
    }

    public function createRok()
    {
        $ispitniRok = IspitniRok::all();
        return view('kalendar.create_rok', compact('ispitniRok'));
    }

    public function storeRok(Request $request)
    {
        $rok = new AktivniIpsitniRokovi($request->all());
        $rok->naziv = IspitniRok::where(['id' => $request->rok_id])->first()->naziv . " " . substr($request->pocetak,0,4);
        $rok->save();
        return redirect('/kalendar/');
    }

    public function eventSource()
    {
//        $rokovi = \DB::table('aktivni_ipsitni_rokovis')->join('ispitni_rok', 'aktivni_ipsitni_rokovis.rok_id', '=', 'ispitni_rok.id')
//            ->selectRaw("CONCAT(ispitni_rok.naziv, ' ', YEAR(aktivni_ipsitni_rokovis.pocetak)) as title, aktivni_ipsitni_rokovis.pocetak as start, aktivni_ipsitni_rokovis.kraj as end")->get();
        $rokovi = AktivniIpsitniRokovi::where(['indikatorAktivan' => 1])->select('naziv as title', 'pocetak as start', 'kraj as end')->get();

        return $rokovi;
    }
}
