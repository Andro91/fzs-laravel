<?php

namespace App\Http\Controllers;

use App\Profesor;
use App\StatusProfesora;
use Illuminate\Http\Request;

use App\Http\Requests;

class ProfesorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        try {
            $profesor = Profesor::all();
            $status = StatusProfesora::all();
        } catch (\Illuminate\Database\QueryException $e) {
            dd('Дошло је до непредвиђене грешке.' . $e->getMessage());
        }

        return view('sifarnici.profesor', compact('profesor', 'status'));
    }

    public function unos(Request $request)
    {
        $profesor = new Profesor();

        $profesor->jmbg = $request->jmbg;
        $profesor->ime = $request->ime;
        $profesor->prezime = $request->prezime;
        $profesor->telefon = $request->telefon;
        $profesor->zvanje = $request->zvanje;
        $profesor->kabinet = $request->kabinet;
        $profesor->mail = $request->mail;
        $profesor->indikatorAktivan = 1;
        $profesor->status_id = $request->status_id;

        try {
            $profesor->save();
        } catch (\Illuminate\Database\QueryException $e) {
            dd('Дошло је до непредвиђене грешке.' . $e->getMessage());
        }

        return Redirect::to('/profesor');
    }

    public function edit(Profesor $profesor)
    {
        try {
            $status = StatusProfesora::all();
        } catch (\Illuminate\Database\QueryException $e) {
            dd('Дошло је до непредвиђене грешке.' . $e->getMessage());
        }

        return view('sifarnici.editProfesor', compact('profesor', 'status'));
    }

    public function add()
    {
        try {
            $status = StatusProfesora::all();
        } catch (\Illuminate\Database\QueryException $e) {
            dd('Дошло је до непредвиђене грешке.' . $e->getMessage());
        }

        return view('sifarnici.addProfesor', compact('status'));
    }

    public function update(Request $request, Profesor $profesor)
    {
        $profesor->jmbg = $request->jmbg;
        $profesor->ime = $request->ime;
        $profesor->mail = $request->mail;
        $profesor->prezime = $request->prezime;
        $profesor->telefon = $request->telefon;
        $profesor->zvanje = $request->zvanje;
        $profesor->kabinet = $request->kabinet;
        $profesor->status_id = $request->status_id;
        if ($request->indikatorAktivan == 'on') {
            $profesor->indikatorAktivan = 1;
        } else {
            $profesor->indikatorAktivan = 0;
        }

        try {
            $profesor->update();
        } catch (\Illuminate\Database\QueryException $e) {
            dd('Дошло је до непредвиђене грешке.' . $e->getMessage());
        }

        return Redirect::to('/profesor');
    }

    public function delete(Profesor $profesor)
    {
        try {
            $profesor->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            dd('Дошло је до непредвиђене грешке.' . $e->getMessage());
        }

        return back();
    }
}
