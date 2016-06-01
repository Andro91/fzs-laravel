<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KrsnaSlava;

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
}
