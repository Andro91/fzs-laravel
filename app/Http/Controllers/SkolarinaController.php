<?php

namespace App\Http\Controllers;

use App\GodinaStudija;
use App\Kandidat;
use App\Skolarina;
use App\StudijskiProgram;
use App\TipStudija;
use App\UplataSkolarine;
use Illuminate\Http\Request;

use App\Http\Requests;

class SkolarinaController extends Controller
{
    public function index($id)
    {
        $kandidat = Kandidat::find($id);
        $trenutnaSkolarina = Skolarina::where([
            'kandidat_id' => $id,
            'tipStudija_id' => $kandidat->tipStudija_id,
            'godinaStudija_id' => $kandidat->godinaStudija_id
        ])->first();

        $uplacenIznos = 0;
        $preostaliIznos = $trenutnaSkolarina->iznos;

        if($trenutnaSkolarina != null){
            $trenutneUplate = UplataSkolarine::where([
                'skolarina_id' => $trenutnaSkolarina->id,
            ])->get();
            $uplacenIznos = $trenutneUplate->sum('iznos');
            $preostaliIznos = $preostaliIznos - $uplacenIznos;
        }else{
            $trenutneUplate = null;
        }

        return view('skolarina.index', compact('kandidat', 'trenutnaSkolarina', 'trenutneUplate', 'uplacenIznos', 'preostaliIznos'));
    }

    public function edit($id)
    {
        $skolarina = Skolarina::find($id);

        $kandidat = Kandidat::find($skolarina->kandidat_id);

        $tipStudija = TipStudija::all();
        $godinaStudija = GodinaStudija::all();

        return view('skolarina.izmena', compact('kandidat', 'skolarina', 'tipStudija', 'godinaStudija'));
    }

    public function store(Request $request)
    {
        $skolarina = Skolarina::find($request->id);
        $skolarina->iznos = $request->iznos;
        $skolarina->komentar = $request->komentar;
        $skolarina->tipStudija_id = $request->tipStudija_id;
        $skolarina->godinaStudija_id = $request->godinaStudija_id;
        $saved = $skolarina->save();

        if(!$saved){
            \Session::flash('error', 'save');
        }

        return redirect("/skolarina/{$skolarina->kandidat_id}");
    }

    public function createUplata()
    {

    }

    public function arhiva($id)
    {
        $kandidat = Kandidat::find($id);
        $skolarinaOS = Skolarina::where(['kandidat_id' => $id, 'tipStudija_id' => 1])->get();
        $skolarinaMS = Skolarina::where(['kandidat_id' => $id, 'tipStudija_id' => 2])->get();
        $skolarinaDS = Skolarina::where(['kandidat_id' => $id, 'tipStudija_id' => 3])->get();

        return view('skolarina.index', compact('kandidat'));
    }
}
