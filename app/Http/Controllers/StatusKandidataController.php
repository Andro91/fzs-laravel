<?php

namespace App\Http\Controllers;

use App\StatusGodine;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;


class StatusKandidataController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        try {
            $status = StatusGodine::all();
        } catch (\Illuminate\Database\QueryException $e) {
            dd('Дошло је до непредвиђене грешке.' . $e->getMessage());
        }

        return view('sifarnici.statusKandidata', compact('status'));
    }

    public function unos(Request $request)
    {
        $status = new StatusGodine();

        $status->naziv = $request->naziv;
        $status->indikatorAktivan = 1;


        try {
            $status->save();
        } catch (\Illuminate\Database\QueryException $e) {
            dd('Дошло је до непредвиђене грешке.' . $e->getMessage());
        }

        return Redirect::to('/statusKandidata');
    }

    public function edit(StatusGodine $status)
    {
        return view('sifarnici.editStatusKandidata', compact('status'));
    }

    public function add()
    {
        return view('sifarnici.addStatusKandidata');
    }

    public function update(Request $request, StatusGodine $status)
    {
        $status->naziv = $request->naziv;
        if ($request->indikatorAktivan == 'on' || $request->indikatorAktivan == 1) {
            $status->indikatorAktivan = 1;
        } else {
            $status->indikatorAktivan = 0;
        }

        try {
            $status->update();
        } catch (\Illuminate\Database\QueryException $e) {
            dd('Дошло је до непредвиђене грешке.' . $e->getMessage());
        }

        return Redirect::to('/statusKandidata');
    }

    public function delete(StatusGodine $status)
    {
        try {
            $status->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            dd('Дошло је до непредвиђене грешке.' . $e->getMessage());
        }

        return back();
    }
}
