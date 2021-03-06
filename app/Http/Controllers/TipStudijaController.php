<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\TipStudija;
use Illuminate\Support\Facades\Redirect;

class TipStudijaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        try {
            $tipStudija = TipStudija::all();
        } catch (\Illuminate\Database\QueryException $e) {
            dd('Дошло је до непредвиђене грешке.' . $e->getMessage());
        }

        return view('sifarnici.tipStudija', compact('tipStudija'));
    }

    public function unos(Request $request)
    {
        $tipStudija = new TipStudija();

        $tipStudija->naziv = $request->naziv;
        $tipStudija->skrNaziv = $request->skrNaziv;
        $tipStudija->indikatorAktivan = 1;


        try {
            $tipStudija->save();
        } catch (\Illuminate\Database\QueryException $e) {
            dd('Дошло је до непредвиђене грешке.' . $e->getMessage());
        }

        return Redirect::to('/tipStudija');
    }

    public function edit(TipStudija $tipStudija)
    {
        return view('sifarnici.editTipStudija', compact('tipStudija'));
    }

    public function add()
    {
        return view('sifarnici.addTipStudija');
    }

    public function update(Request $request, TipStudija $tipStudija)
    {
        $tipStudija->naziv = $request->naziv;
        $tipStudija->skrNaziv = $request->skrNaziv;
        if ($request->indikatorAktivan == 'on' || $request->indikatorAktivan == 1) {
            $tipStudija->indikatorAktivan = 1;
        } else {
            $tipStudija->indikatorAktivan = 0;
        }

        try {
            $tipStudija->update();
        } catch (\Illuminate\Database\QueryException $e) {
            dd('Дошло је до непредвиђене грешке.' . $e->getMessage());
        }

        return Redirect::to('/tipStudija');
    }

    public function delete(TipStudija $tipStudija)
    {
        try {
            $tipStudija->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            dd('Дошло је до непредвиђене грешке.' . $e->getMessage());
        }

        return back();
    }
}
