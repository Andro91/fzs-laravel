<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sport;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class SportController extends Controller
{
    public function index()
    {
        $sport = Sport::all();

        return view('sifarnici.sport', compact('sport'));
    }

    public function unos(Request $request)
    {
        $sport = new Sport();

        $sport->naziv = $request->naziv;
        if($request->indikatorAktivan == 'on') {
            $sport->indikatorAktivan = 1;
        }
        else{
            $sport->indikatorAktivan = 0;
        }

        $sport->save();

        return back();
    }

    public function edit(Sport $sport)
    {
        return view('sifarnici.editSport', compact('sport'));
    }

    public function update(Request $request, Sport $sport)
    {
        $sport->naziv = $request->naziv;
        if($request->indikatorAktivan == 'on') {
            $sport->indikatorAktivan = 1;
        }
        else{
            $sport->indikatorAktivan = 0;
        }

        $sport->update();

        return Redirect::to('/sport');
    }

    public function delete(Sport $sport)
    {
        $sport->delete();

        return back();
    }
}
