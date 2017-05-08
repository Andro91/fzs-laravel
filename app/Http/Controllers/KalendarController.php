<?php

namespace App\Http\Controllers;

use App\AktivniIspitniRokovi;
use App\IspitniRok;
use Illuminate\Http\Request;

use App\Http\Requests;

class KalendarController extends Controller
{
    public function index()
    {
        return view('kalendar.kalendar');
    }

    public function indexRok()
    {
        $ispitniRokovi = AktivniIspitniRokovi::orderByRaw('YEAR(pocetak) DESC')->orderBy('pocetak', 'asc')->get();
        return view('kalendar.index_rok', compact('ispitniRokovi'));
    }

    public function createRok()
    {
        $ispitniRok = IspitniRok::all();
        return view('kalendar.create_rok', compact('ispitniRok'));
    }

    public function editRok($id)
    {
        $ispitniRok = IspitniRok::all();
        $rok = AktivniIspitniRokovi::find($id);
        return view('kalendar.edit_rok', compact('ispitniRok', 'rok'));
    }

    public function storeRok(Request $request)
    {
        $rok = new AktivniIspitniRokovi($request->all());
        $rok->save();
        return redirect('/kalendar/');
    }

    public function updateRok(Request $request)
    {
        $rok = AktivniIspitniRokovi::find($request->rokId);
        $rok->fill($request->all());
        if(!$request->has('indikatorAktivan')){
            $rok->indikatorAktivan = 0;
        }
        $rok->save();
        return redirect('/kalendar/');
    }

    public function deleteRok($id)
    {
        AktivniIspitniRokovi::destroy($id);
        return redirect('/kalendar/');
    }

    public function eventSource()
    {
        $rokovi = AktivniIspitniRokovi::where(['indikatorAktivan' => 1])->select('id', 'naziv as title', 'pocetak as start', 'kraj as end')->get();

        return $rokovi;
    }
}
