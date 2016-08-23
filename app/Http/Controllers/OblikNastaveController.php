<?php

namespace App\Http\Controllers;

use App\OblikNastave;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class OblikNastaveController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        try {
            $oblikNastave = OblikNastave::all();
        } catch (\Illuminate\Database\QueryException $e) {
            dd('Дошло је до непредвиђене грешке.' . $e->getMessage());
        }

        return view('sifarnici.oblikNastave', compact('oblikNastave'));
    }

    public function unos(Request $request)
    {
        $oblikNastave = new OblikNastave();

        $oblikNastave->naziv = $request->naziv;
        $oblikNastave->skrNaziv = $request->skrNaziv;
        $oblikNastave->indikatorAktivan = 1;


        try {
            $oblikNastave->save();
        } catch (\Illuminate\Database\QueryException $e) {
            dd('Дошло је до непредвиђене грешке.' . $e->getMessage());
        }

        return Redirect::to('/oblikNastave');
    }

    public function edit(OblikNastave $oblikNastave)
    {
        return view('sifarnici.editOblikNastave', compact('oblikNastave'));
    }

    public function add()
    {
        return view('sifarnici.addOblikNastave');
    }

    public function update(Request $request, OblikNastave $oblikNastave)
    {
        $oblikNastave->naziv = $request->naziv;
        $oblikNastave->skrNaziv = $request->skrNaziv;
        if ($request->indikatorAktivan == 'on' || $request->indikatorAktivan == 1) {
            $oblikNastave->indikatorAktivan = 1;
        } else {
            $oblikNastave->indikatorAktivan = 0;
        }

        try {
            $oblikNastave->update();
        } catch (\Illuminate\Database\QueryException $e) {
            dd('Дошло је до непредвиђене грешке.' . $e->getMessage());
        }

        return Redirect::to('/oblikNastave');
    }

    public function delete(OblikNastave $oblikNastave)
    {
        try {
            $oblikNastave->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            dd('Дошло је до непредвиђене грешке.' . $e->getMessage());
        }

        return back();
    }
}
