<?php

namespace App\Http\Controllers;

use App\Semestar;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;


class SemestarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        try {
            $semestar = Semestar::all();
        } catch (\Illuminate\Database\QueryException $e) {
            dd('Дошло је до непредвиђене грешке.' . $e->getMessage());
        }

        return view('sifarnici.semestar', compact('semestar'));
    }

    public function unos(Request $request)
    {
        $semestar = new Semestar();

        $semestar->naziv = $request->naziv;
        $semestar->nazivRimski = $request->nazivRimski;
        $semestar->nazivBrojcano = $request->nazivBrojcano;
        $semestar->indikatorAktivan = 1;


        try {
            $semestar->save();
        } catch (\Illuminate\Database\QueryException $e) {
            dd('Дошло је до непредвиђене грешке.' . $e->getMessage());
        }

        return Redirect::to('/semestar');
    }

    public function edit(Semestar $semestar)
    {
        return view('sifarnici.editSemestar', compact('semestar'));
    }

    public function add()
    {
        return view('sifarnici.addSemestar');
    }

    public function update(Request $request, Semestar $semestar)
    {
        $semestar->naziv = $request->naziv;
        $semestar->nazivRimski = $request->nazivRimski;
        $semestar->nazivBrojcano = $request->nazivBrojcano;
        if ($semestar->indikatorAktivan == 'on') {
            $semestar->indikatorAktivan = 1;
        } else {
            $semestar->indikatorAktivan = 0;
        }

        try {
            $semestar->update();
        } catch (\Illuminate\Database\QueryException $e) {
            dd('Дошло је до непредвиђене грешке.' . $e->getMessage());
        }

        return Redirect::to('/semestar');
    }

    public function delete(Semestar $semestar)
    {
        try {
            $semestar->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            dd('Дошло је до непредвиђене грешке.' . $e->getMessage());
        }

        return back();
    }
}
