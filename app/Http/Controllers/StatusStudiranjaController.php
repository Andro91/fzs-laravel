<?php

namespace App\Http\Controllers;

use App\StatusStudiranja;
use Illuminate\Http\Request;

use App\Http\Requests;

class StatusStudiranjaController extends Controller
{
    public function index()
    {
        $statusStudiranja = StatusStudiranja::all();

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

        $statusStudiranja->save();

        return back();
    }
}
