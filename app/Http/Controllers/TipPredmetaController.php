<?php

namespace App\Http\Controllers;

use App\TipPredmeta;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class TipPredmetaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        try {
            $tipPredmeta = TipPredmeta::all();
        } catch (\Illuminate\Database\QueryException $e) {
            dd('Дошло је до непредвиђене грешке.' . $e->getMessage());
        }

        return view('sifarnici.tipPredmeta', compact('tipPredmeta'));
    }

    public function unos(Request $request)
    {
        $tipPredmeta = new TipPredmeta();

        $tipPredmeta->naziv = $request->naziv;
        $tipPredmeta->skrNaziv = $request->skrNaziv;
        $tipPredmeta->indikatorAktivan = 1;


        try {
            $tipPredmeta->save();
        } catch (\Illuminate\Database\QueryException $e) {
            dd('Дошло је до непредвиђене грешке.' . $e->getMessage());
        }

        return Redirect::to('/tipPredmeta');
    }

    public function edit(TipPredmeta $tipPredmeta)
    {
        return view('sifarnici.editTipPredmeta', compact('tipPredmeta'));
    }

    public function add()
    {
        return view('sifarnici.addTipPredmeta');
    }

    public function update(Request $request, TipPredmeta $tipPredmeta)
    {
        $tipPredmeta->naziv = $request->naziv;
        $tipPredmeta->skrNaziv = $request->skrNaziv;
        if ($tipPredmeta->indikatorAktivan == 'on') {
            $tipPredmeta->indikatorAktivan = 1;
        } else {
            $tipPredmeta->indikatorAktivan = 0;
        }

        try {
            $tipPredmeta->update();
        } catch (\Illuminate\Database\QueryException $e) {
            dd('Дошло је до непредвиђене грешке.' . $e->getMessage());
        }

        return Redirect::to('/tipPredmeta');
    }

    public function delete(TipPredmeta $tipPredmeta)
    {
        try {
            $tipPredmeta->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            dd('Дошло је до непредвиђене грешке.' . $e->getMessage());
        }

        return back();
    }
}
