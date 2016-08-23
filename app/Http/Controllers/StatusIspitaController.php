<?php

namespace App\Http\Controllers;

use App\StatusIspita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class StatusIspitaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        try {
            $status = StatusIspita::all();
        } catch (\Illuminate\Database\QueryException $e) {
            dd('Дошло је до непредвиђене грешке.' . $e->getMessage());
        }

        return view('sifarnici.statusIspita', compact('status'));
    }

    public function unos(Request $request)
    {
        $status = new StatusIspita();

        $status->naziv = $request->naziv;
        $status->indikatorAktivan = 1;


        try {
            $status->save();
        } catch (\Illuminate\Database\QueryException $e) {
            dd('Дошло је до непредвиђене грешке.' . $e->getMessage());
        }

        return Redirect::to('/statusIspita');
    }

    public function edit(StatusIspita $status)
    {
        return view('sifarnici.editStatusIspita', compact('status'));
    }

    public function add()
    {
        return view('sifarnici.addStatusIspita');
    }

    public function update(Request $request, StatusIspita $status)
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

        return Redirect::to('/statusIspita');
    }

    public function delete(StatusIspita $status)
    {
        try {
            $status->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            dd('Дошло је до непредвиђене грешке.' . $e->getMessage());
        }

        return back();
    }
}
