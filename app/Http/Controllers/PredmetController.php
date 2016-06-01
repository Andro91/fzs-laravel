<?php

namespace App\Http\Controllers;

use App\GodinaStudija;
use App\Predmet;
use App\StudijskiProgram;
use App\TipStudija;
use Illuminate\Http\Request;

use App\Http\Requests;

class PredmetController extends Controller
{
    public function index()
    {
        $predmet = Predmet::all();
        $tipStudija = TipStudija::all();
        $studijskiProgram = StudijskiProgram::all();
        $godinaStudija = GodinaStudija::all();

        return view('sifarnici.predmet', compact('predmet', 'tipStudija', 'studijskiProgram', 'godinaStudija'));
    }

    public function unos(Request $request)
    {
        $predmet = new Predmet();

        $predmet->naziv = $request->naziv;
        $predmet->studijskiProgram_id = $request->studijskiProgram_id;
        $predmet->godinaStudija_id = $request->godinaStudija_id;
        $predmet->tipStudija_id = $request->tipStudija_id;
        $predmet->semestarSlusanjaPredmeta = $request->semestarSlusanjaPredmeta;
        $predmet->espb = $request->espb;
        if($request->statusPredmeta == 'on') {
            $predmet->statusPredmeta = 1;
        }
        else{
            $predmet->statusPredmeta = 0;
        }

        $predmet->save();

        return back();
    }
}
