<?php

namespace App\Http\Controllers;

use App\TipPrijave;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;;

class TipPrijaveController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        try {
            $tip = TipPrijave::all();
        } catch (\Illuminate\Database\QueryException $e) {
            dd('Дошло је до непредвиђене грешке.' . $e->getMessage());
        }

        return view('sifarnici.tipPrijave', compact('tip'));
    }

    public function unos(Request $request)
    {
        $tip = new TipPrijave();

        $tip->naziv = $request->naziv;
        $tip->indikatorAktivan = 1;


        try {
            $tip->save();
        } catch (\Illuminate\Database\QueryException $e) {
            dd('Дошло је до непредвиђене грешке.' . $e->getMessage());
        }

        return Redirect::to('/tipPrijave');
    }

    public function edit(TipPrijave $tip)
    {
        return view('sifarnici.editTipPrijave', compact('tip'));
    }

    public function add()
    {
        return view('sifarnici.addTipPrijave');
    }

    public function update(Request $request, TipPrijave $tip)
    {
        $tip->naziv = $request->naziv;
        if ($request->indikatorAktivan == 'on' || $request->indikatorAktivan == 1) {
            $tip->indikatorAktivan = 1;
        } else {
            $tip->indikatorAktivan = 0;
        }

        try {
            $tip->update();
        } catch (\Illuminate\Database\QueryException $e) {
            dd('Дошло је до непредвиђене грешке.' . $e->getMessage());
        }

        return Redirect::to('/tipPrijave');
    }

    public function delete(TipPrijave $tip)
    {
        try {
            $tip->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            dd('Дошло је до непредвиђене грешке.' . $e->getMessage());
        }

        return back();
    }
}
