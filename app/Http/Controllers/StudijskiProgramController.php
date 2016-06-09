<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\StudijskiProgram;
use App\TipStudija;
use Illuminate\Support\Facades\Redirect;

class StudijskiProgramController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        try {
            $studijskiProgram = StudijskiProgram::all();
            $tipStudija = TipStudija::all();
        } catch (\Illuminate\Database\QueryException $e) {
            dd('????? ?? ?? ???????????? ??????.' . $e->getMessage());
        }

        return view('sifarnici.studijskiProgram', compact('studijskiProgram', 'tipStudija'));
    }

    public function unos(Request $request)
    {
        $studijskiProgram = new StudijskiProgram();

        $studijskiProgram->naziv = $request->naziv;
        $studijskiProgram->tipStudija_id = $request->tipStudija_id;
        $studijskiProgram->skrNazivStudijskogPrograma = $request->skrNazivStudijskogPrograma;
        $studijskiProgram->indikatorAktivan = 1;


        try {
            $studijskiProgram->save();
        } catch (\Illuminate\Database\QueryException $e) {
            dd('????? ?? ?? ???????????? ??????.' . $e->getMessage());
        }

        return back();
    }

    public function edit(StudijskiProgram $studijskiProgram)
    {
        try {
            $tipStudija = TipStudija::all();
        } catch (\Illuminate\Database\QueryException $e) {
            dd('????? ?? ?? ???????????? ??????.' . $e->getMessage());
        }

        return view('sifarnici.editStudijskiProgram', compact('studijskiProgram', 'tipStudija'));
    }

    public function update(Request $request, StudijskiProgram $studijskiProgram)
    {
        $studijskiProgram->naziv = $request->naziv;
        $studijskiProgram->tipStudija_id = $request->tipStudija_id;
        $studijskiProgram->skrNazivStudijskogPrograma = $request->skrNazivStudijskogPrograma;
        if ($request->indikatorAktivan == 'on') {
            $studijskiProgram->indikatorAktivan = 1;
        } else {
            $studijskiProgram->indikatorAktivan = 0;
        }

        try {
            $studijskiProgram->update();
        } catch (\Illuminate\Database\QueryException $e) {
            dd('????? ?? ?? ???????????? ??????.' . $e->getMessage());
        }


        return Redirect::to('/studijskiProgram');
    }

    public function delete(StudijskiProgram $studijskiProgram)
    {
        try {
            $studijskiProgram->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            dd('????? ?? ?? ???????????? ??????.' . $e->getMessage());
        }

        return back();
    }

}
