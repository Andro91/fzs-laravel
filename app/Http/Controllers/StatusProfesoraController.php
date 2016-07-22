<?php

namespace App\Http\Controllers;

use App\StatusProfesora;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;


class StatusProfesoraController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        try {
            $status = statusProfesora::all();
        } catch (\Illuminate\Database\QueryException $e) {
            dd('Дошло је до непредвиђене грешке.' . $e->getMessage());
        }

        return view('sifarnici.statusProfesora', compact('status'));
    }

    public function unos(Request $request)
    {
        $status = new statusProfesora();

        $status->naziv = $request->naziv;
        $status->indikatorAktivan = 1;


        try {
            $status->save();
        } catch (\Illuminate\Database\QueryException $e) {
            dd('Дошло је до непредвиђене грешке.' . $e->getMessage());
        }

        return Redirect::to('/statusProfesora');
    }

    public function edit(statusProfesora $status)
    {
        return view('sifarnici.editstatusProfesora', compact('status'));
    }

    public function add()
    {
        return view('sifarnici.addstatusProfesora');
    }

    public function update(Request $request, statusProfesora $status)
    {
        $status->naziv = $request->naziv;
        $status->indikatorAktivan = 1;


        try {
            $status->update();
        } catch (\Illuminate\Database\QueryException $e) {
            dd('Дошло је до непредвиђене грешке.' . $e->getMessage());
        }

        return Redirect::to('/statusProfesora');
    }

    public function delete(statusProfesora $status)
    {
        try {
            $status->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            dd('Дошло је до непредвиђене грешке.' . $e->getMessage());
        }

        return back();
    }
}
