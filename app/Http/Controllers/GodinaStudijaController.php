<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\GodinaStudija;

class GodinaStudijaController extends Controller
{
    public function index()
    {
        $godinaStudija = GodinaStudija::all();

        return view('sifarnici.godinaStudija', compact('godinaStudija'));
    }

    public function unos(Request $request)
    {
        $godinaStudija = new GodinaStudija();

        $godinaStudija->naziv = $request->naziv;
        $godinaStudija->nazivRimski = $request->nazivRimski;
        $godinaStudija->nazivSlovimaUPadezu = $request->nazivSlovimaUPadezu;
        $godinaStudija->redosledPrikazivanja = $request->redosledPrikazivanja;
        if($godinaStudija->indikatorAktivan == 'on') {
            $godinaStudija->indikatorAktivan = 1;
        }
        else{
            $godinaStudija->indikatorAktivan = 0;
        }

        $godinaStudija->save();

        return back();
    }
}
