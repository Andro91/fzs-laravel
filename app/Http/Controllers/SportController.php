<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sport;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class SportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        try {
            $sport = Sport::all();
        } catch (\Illuminate\Database\QueryException $e) {
            dd('????? ?? ?? ???????????? ??????.' . $e->getMessage());
        }

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

        try {
            $sport->save();
        } catch (\Illuminate\Database\QueryException $e) {
            dd('????? ?? ?? ???????????? ??????.' . $e->getMessage());
        }

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

        try {
            $sport->update();
        } catch (\Illuminate\Database\QueryException $e) {
            dd('????? ?? ?? ???????????? ??????.' . $e->getMessage());
        }

        return Redirect::to('/sport');
    }

    public function delete(Sport $sport)
    {
        try {
            $sport->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            dd('????? ?? ?? ???????????? ??????.' . $e->getMessage());
        }

        return back();
    }
}
