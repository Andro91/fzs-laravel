<?php

namespace App\Http\Controllers;

use App\Kandidat;
use App\Sport;
use App\SportskoAngazovanje;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class SportskoAngazovanjeController extends Controller
{
    public function index(Kandidat $kandidat)
    {
        //PrilozenaDokumenta::where('indGodina','2')->get()
        //$sportskoAngazovanje = SportskoAngazovanje::where(['kandidat_id', 1]);
        //$kandidat = Kandidat::all();

        $sport = Sport::all();

        return view('sifarnici.sportskoAngazovanje ', compact('kandidat', 'sport'));
    }

    public function unos(Request $request)
    {
        $angazovanje = new SportskoAngazovanje();

        $angazovanje->nazivKluba = $request->nazivKluba;
        $angazovanje->odDoGodina = $request->odDoGodina;
        $angazovanje->ukupnoGodina = $request->ukupnoGodina;
        $angazovanje->sport_id = $request->sport_id;
        $angazovanje->kandidat_id = Session::get('id');

        $angazovanje->save();

        return back();
    }

    public function edit(SportskoAngazovanje $angazovanje)
    {
        $sport = Sport::all();

        return view('sifarnici.editSportskoAngazovanje', compact('angazovanje', 'sport'));
    }

    public function update(Request $request, SportskoAngazovanje $angazovanje)
    {
        $angazovanje->nazivKluba = $request->nazivKluba;
        $angazovanje->odDoGodina = $request->odDoGodina;
        $angazovanje->ukupnoGodina = $request->ukupnoGodina;
        $angazovanje->sport_id = $request->sport_id;
        $angazovanje->kandidat_id = Session::get('id');
        $id = Session::get('id');

        $angazovanje->update();

        return Redirect::to('/sportskoAngazovanje/' . $id);
    }

    public function delete(SportskoAngazovanje $angazovanje)
    {
        $id = $angazovanje->kandidat_id;
        $kandidat = Kandidat::find($id);
        $sportskoAngazovanje = SportskoAngazovanje::where('kandidat_id',$id)->get();
        $sportovi = Sport::all();

        $angazovanje->delete();

        return redirect("/kandidat/{$id}/sportskoangazovanje")
            ->with('sport',$sportovi)
            ->with('kandidat',$kandidat)
            ->with('sportskoAngazovanje',$sportskoAngazovanje);
    }

    public function vrati()
    {
        return redirect()->back()->withInput();
    }

}
