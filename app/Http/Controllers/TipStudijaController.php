<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\TipStudija;
use Illuminate\Support\Facades\Redirect;

class TipStudijaController extends Controller
{
    public function index()
    {
        $tipStudija = TipStudija::all();

        return view('sifarnici.tipStudija', compact('tipStudija'));
    }

    public function unos(Request $request)
    {
        $tipStudija = new TipStudija();

        $tipStudija->naziv = $request->naziv;
        $tipStudija->skrNaziv = $request->skrNaziv;
        if($request->indikatorAktivan == 'on') {
            $tipStudija->indikatorAktivan = 1;
        }
        else{
            $tipStudija->indikatorAktivan = 0;
        }

        $tipStudija->save();

        return back();
    }

    public function edit(TipStudija $tipStudija)
    {
        return view('sifarnici.editTipStudija', compact('tipStudija'));
    }

    public function update(Request $request, TipStudija $tipStudija)
    {
        $tipStudija->naziv = $request->naziv;
        $tipStudija->skrNaziv = $request->skrNaziv;
        if($request->indikatorAktivan == 'on') {
            $tipStudija->indikatorAktivan = 1;
        }
        else{
            $tipStudija->indikatorAktivan = 0;
        }

        $tipStudija->update();

        return Redirect::to('/tipStudija');
    }

    public function delete(TipStudija $tipStudija)
    {
        $tipStudija->delete();

        return back();
    }
}
