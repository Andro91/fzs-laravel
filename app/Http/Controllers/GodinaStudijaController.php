<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\GodinaStudija;
use Illuminate\Support\Facades\Redirect;

class GodinaStudijaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        try {
            $godinaStudija = GodinaStudija::all();
        } catch (\Illuminate\Database\QueryException $e) {
            dd('Дошло је до непредвиђене грешке.' . $e->getMessage());
        }

        return view('sifarnici.godinaStudija', compact('godinaStudija'));
    }

    public function unos(Request $request)
    {
        $godinaStudija = new GodinaStudija();

        $godinaStudija->naziv = $request->naziv;
        $godinaStudija->nazivRimski = $request->nazivRimski;
        $godinaStudija->nazivSlovimaUPadezu = $request->nazivSlovimaUPadezu;
        $godinaStudija->redosledPrikazivanja = $request->redosledPrikazivanja;
        $godinaStudija->indikatorAktivan = 1;


        try {
            $godinaStudija->save();
        } catch (\Illuminate\Database\QueryException $e) {
            dd('Дошло је до непредвиђене грешке.' . $e->getMessage());
        }

        return Redirect::to('/godinaStudija');
    }

    public function edit(GodinaStudija $godinaStudija)
    {
        return view('sifarnici.editGodinaStudija', compact('godinaStudija'));
    }

    public function add()
    {
        return view('sifarnici.addGodinaStudija');
    }

    public function update(Request $request, GodinaStudija $godinaStudija)
    {
        $godinaStudija->naziv = $request->naziv;
        $godinaStudija->nazivRimski = $request->nazivRimski;
        $godinaStudija->nazivSlovimaUPadezu = $request->nazivSlovimaUPadezu;
        $godinaStudija->redosledPrikazivanja = $request->redosledPrikazivanja;
        if ($request->indikatorAktivan == 'on' || $request->indikatorAktivan == 1) {
            $godinaStudija->indikatorAktivan = 1;
        } else {
            $godinaStudija->indikatorAktivan = 0;
        }

        try {
            $godinaStudija->update();
        } catch (\Illuminate\Database\QueryException $e) {
            dd('Дошло је до непредвиђене грешке.' . $e->getMessage());
        }

        return Redirect::to('/godinaStudija');
    }

    public function delete(GodinaStudija $godinaStudija)
    {

        try {
            $godinaStudija->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            dd('Дошло је до непредвиђене грешке.' . $e->getMessage());
        }


        return back();
    }
}
