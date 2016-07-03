<?php

namespace App\Http\Controllers;

use App\Bodovanje;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class BodovanjeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        try {
            $bodovanje = Bodovanje::all();
        } catch (\Illuminate\Database\QueryException $e) {
            dd('Дошло је до непредвиђене грешке.' . $e->getMessage());
        }

        return view('sifarnici.bodovanje', compact('bodovanje'));
    }

    public function unos(Request $request)
    {
        $bodovanje = new Bodovanje();

        $bodovanje->opisnaOcena = $request->opisnaOcena;
        $bodovanje->poeniMin = $request->poeniMin;
        $bodovanje->poeniMax = $request->poeniMax;
        $bodovanje->ocena = $request->ocena;
        $bodovanje->indikatorAktivan = 1;


        try {
            $bodovanje->save();
        } catch (\Illuminate\Database\QueryException $e) {
            dd('Дошло је до непредвиђене грешке.' . $e->getMessage());
        }

        return Redirect::to('/bodovanje');
    }

    public function edit(Bodovanje $bodovanje)
    {
        return view('sifarnici.editBodovanje', compact('bodovanje'));
    }

    public function add()
    {
        return view('sifarnici.addBodovanje');
    }

    public function update(Request $request, Bodovanje $bodovanje)
    {
        $bodovanje->opisnaOcena = $request->opisnaOcena;
        $bodovanje->poeniMin = $request->poeniMin;
        $bodovanje->poeniMax = $request->poeniMax;
        $bodovanje->ocena = $request->ocena;
        if ($bodovanje->indikatorAktivan == 'on') {
            $bodovanje->indikatorAktivan = 1;
        } else {
            $bodovanje->indikatorAktivan = 0;
        }

        try {
            $bodovanje->update();
        } catch (\Illuminate\Database\QueryException $e) {
            dd('Дошло је до непредвиђене грешке.' . $e->getMessage());
        }

        return Redirect::to('/bodovanje');
    }

    public function delete(Bodovanje $bodovanje)
    {
        try {
            $bodovanje->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            dd('Дошло је до непредвиђене грешке.' . $e->getMessage());
        }

        return back();
    }
}
