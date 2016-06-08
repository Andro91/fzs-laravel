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
            dd('????? ?? ?? ???????????? ??????.' . $e->getMessage());
        }

        return view('sifarnici.statusStudiranja', compact('statusStudiranja'));
    }

    public function unos(Request $request)
    {
        $statusStudiranja = new StatusStudiranja();

        $statusStudiranja->naziv = $request->naziv;
        if($request->indikatorAktivan == 'on') {
            $statusStudiranja->indikatorAktivan = 1;
        }
        else{
            $statusStudiranja->indikatorAktivan = 0;
        }

        try {
            $statusStudiranja->save();
        } catch (\Illuminate\Database\QueryException $e) {
            dd('????? ?? ?? ???????????? ??????.' . $e->getMessage());
        }

        return back();
    }

    public function edit(StatusStudiranja $statusStudiranja)
    {
        return view('sifarnici.editStatusStudiranja', compact('statusStudiranja'));
    }

    public function update(Request $request, StatusStudiranja $statusStudiranja)
    {
        $statusStudiranja->naziv = $request->naziv;
        if($request->indikatorAktivan == 'on') {
            $statusStudiranja->indikatorAktivan = 1;
        }
        else{
            $statusStudiranja->indikatorAktivan = 0;
        }

        try {
            $statusStudiranja->update();
        } catch (\Illuminate\Database\QueryException $e) {
            dd('????? ?? ?? ???????????? ??????.' . $e->getMessage());
        }

        return Redirect::to('/statusStudiranja');
    }

    public function delete(StatusStudiranja $statusStudiranja)
    {
        try {
            $statusStudiranja->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            dd('????? ?? ?? ???????????? ??????.' . $e->getMessage());
        }

        return back();
    }
}
