<?php

namespace App\Http\Controllers;

use App\IspitniRok;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class IspitniRokController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        try {
            $ispitniRok = IspitniRok::all();
        } catch (\Illuminate\Database\QueryException $e) {
            dd('????? ?? ?? ???????????? ??????.' . $e->getMessage());
        }

        return view('sifarnici.ispitniRok', compact('ispitniRok'));
    }

    public function unos(Request $request)
    {
        $ispitniRok = new IspitniRok();

        $ispitniRok->naziv = $request->naziv;
        $ispitniRok->indikatorAktivan = 1;


        try {
            $ispitniRok->save();
        } catch (\Illuminate\Database\QueryException $e) {
            dd('????? ?? ?? ???????????? ??????.' . $e->getMessage());
        }

        return Redirect::to('/ispitniRok');
    }

    public function edit(IspitniRok $ispitniRok)
    {
        return view('sifarnici.editIspitniRok', compact('ispitniRok'));
    }

    public function add()
    {
        return view('sifarnici.addIspitniRok');
    }

    public function update(Request $request, IspitniRok $ispitniRok)
    {
        $ispitniRok->naziv = $request->naziv;
        if ($request->indikatorAktivan == 'on') {
            $ispitniRok->indikatorAktivan = 1;
        } else {
            $ispitniRok->indikatorAktivan = 0;
        }

        try {
            $ispitniRok->update();
        } catch (\Illuminate\Database\QueryException $e) {
            dd('????? ?? ?? ???????????? ??????.' . $e->getMessage());
        }

        return Redirect::to('/ispitniRok');
    }

    public function delete(IspitniRok $ispitniRok)
    {
        try {
            $ispitniRok->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            dd('????? ?? ?? ???????????? ??????.' . $e->getMessage());
        }

        return back();
    }
}
