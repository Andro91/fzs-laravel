<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\StudijskiProgram;
use App\TipStudija;
use Illuminate\Support\Facades\Redirect;

class StudijskiProgramController extends Controller
{
    public function index()
    {
        $studijskiProgram = StudijskiProgram::all();
        $tipStudija = TipStudija::all();

        return view('sifarnici.studijskiProgram', compact('studijskiProgram', 'tipStudija'));
    }

    public function unos(Request $request)
    {
        $studijskiProgram = new StudijskiProgram();

        $studijskiProgram->naziv = $request->naziv;
        $studijskiProgram->tipStudija_id = $request->tipStudija_id;
        $studijskiProgram->skrNazivStudijskogPrograma = $request->skrNazivStudijskogPrograma;
        if($request->indikatorAktivan == 'on') {
            $studijskiProgram->indikatorAktivan = 1;
        }
        else{
            $studijskiProgram->indikatorAktivan = 0;
        }
        $studijskiProgram->save();

        return back();
    }

    public function edit(StudijskiProgram $studijskiProgram)
    {
        $tipStudija = TipStudija::all();

        return view('sifarnici.editStudijskiProgram', compact('studijskiProgram', 'tipStudija'));
    }

    public function update(Request $request, StudijskiProgram $studijskiProgram)
    {
        $studijskiProgram->naziv = $request->naziv;
        $studijskiProgram->tipStudija_id = $request->tipStudija_id;
        $studijskiProgram->skrNazivStudijskogPrograma = $request->skrNazivStudijskogPrograma;
        if($request->indikatorAktivan == 'on') {
            $studijskiProgram->indikatorAktivan = 1;
        }
        else{
            $studijskiProgram->indikatorAktivan = 0;
        }

        $studijskiProgram->update();

        return Redirect::to('/studijskiProgram');
    }

    public function delete(StudijskiProgram $studijskiProgram)
    {
        $studijskiProgram->delete();

        return back();
    }

}
