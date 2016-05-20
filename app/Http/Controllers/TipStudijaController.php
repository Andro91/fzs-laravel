<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\TipStudija;

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
}
