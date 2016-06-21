<?php

namespace App\Http\Controllers;

use App\StatusStudiranja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests;

class StatusStudiranjaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        try {
            $statusStudiranja = StatusStudiranja::all();
        } catch (\Illuminate\Database\QueryException $e) {
            dd('Дошло је до непредвиђене грешке.' . $e->getMessage());
        }

        return view('sifarnici.statusStudiranja', compact('statusStudiranja'));
    }

    public function unos(Request $request)
    {
        $statusStudiranja = new StatusStudiranja();

        $statusStudiranja->naziv = $request->naziv;
        $statusStudiranja->indikatorAktivan = 1;


        try {
            $statusStudiranja->save();
        } catch (\Illuminate\Database\QueryException $e) {
            dd('Дошло је до непредвиђене грешке.' . $e->getMessage());
        }

        return Redirect::to('/statusStudiranja');
    }

    public function edit(StatusStudiranja $statusStudiranja)
    {
        return view('sifarnici.editStatusStudiranja', compact('statusStudiranja'));
    }

    public function add()
    {
        return view('sifarnici.addStatusStudiranja');
    }

    public function update(Request $request, StatusStudiranja $statusStudiranja)
    {
        $statusStudiranja->naziv = $request->naziv;
        $statusStudiranja->indikatorAktivan = 1;


        try {
            $statusStudiranja->update();
        } catch (\Illuminate\Database\QueryException $e) {
            dd('Дошло је до непредвиђене грешке.' . $e->getMessage());
        }

        return Redirect::to('/statusStudiranja');
    }

    public function delete(StatusStudiranja $statusStudiranja)
    {
        try {
            $statusStudiranja->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            dd('Дошло је до непредвиђене грешке.' . $e->getMessage());
        }

        return back();
    }
}
