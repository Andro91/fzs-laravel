<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KrsnaSlava;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests;

class KrsnaSlavaController extends Controller
{
    public function index()
    {
        $krsnaSlava = KrsnaSlava::all();

        return view('sifarnici.krsnaSlava', compact('krsnaSlava'));
    }

    public function unos(Request $request)
    {
        $krsnaSlava = new KrsnaSlava();
        $krsnaSlava->naziv = $request->naziv;
        $krsnaSlava->datumSlave = $request->datumSlave;
        if($krsnaSlava->indikatorAktivan == 'on') {
            $krsnaSlava->indikatorAktivan = 1;
        }
        else{
            $krsnaSlava->indikatorAktivan = 0;
        }

        $krsnaSlava->save();

        return back();
    }

    public function edit(KrsnaSlava $krsnaSlava)
    {
        return view('sifarnici.editKrsnaSlava', compact('krsnaSlava'));
    }

    public function update(Request $request, KrsnaSlava $krsnaSlava)
    {
        $krsnaSlava->naziv = $request->naziv;
        $krsnaSlava->datumSlave = $request->datumSlave;
        if($krsnaSlava->indikatorAktivan == 'on') {
            $krsnaSlava->indikatorAktivan = 1;
        }
        else{
            $krsnaSlava->indikatorAktivan = 0;
        }

        $krsnaSlava->update();

        return Redirect::to('/krsnaSlava');
    }

    public function delete(KrsnaSlava $krsnaSlava)
    {
        $krsnaSlava->delete();

        return back();
    }
}
