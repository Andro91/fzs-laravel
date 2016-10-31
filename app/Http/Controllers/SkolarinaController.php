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
use Illuminate\Support\Facades\Redirect;

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
        $preostaliIznos = 0;

        if($trenutnaSkolarina != null){
            $trenutneUplate = UplataSkolarine::where([
                'skolarina_id' => $trenutnaSkolarina->id,
            ])->get();
            $uplacenIznos = $trenutneUplate->sum('iznos');
            $preostaliIznos = $trenutnaSkolarina->iznos - $uplacenIznos;
        }else{
            $trenutneUplate = null;
        }

        return view('skolarina.index', compact('kandidat', 'trenutnaSkolarina', 'trenutneUplate', 'uplacenIznos', 'preostaliIznos'));
    }

    public function create($id)
    {
        $kandidat = Kandidat::find($id);

        $tipStudija = TipStudija::all();
        $godinaStudija = GodinaStudija::all();

        return view('skolarina.dodavanje', compact('kandidat', 'tipStudija', 'godinaStudija'));
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
        if(empty($request->id)){
//            Validacija unosa - provera da li vec postoji par kandidat-godina-tipStudija
//            Provera uklonjena ybog mogucnosti obnavljanja godine
//            $messages = [
//                'kandidat_id.unique_with' => 'Дошло је до грешке. Проверите да ли већ постоји школарина за тражену годину студија.',
//            ];
//
//            $this->validate($request, [
//                'kandidat_id' => 'unique_with:skolarina,tipStudija_id,godinaStudija_id',
//            ], $messages);

            $skolarina = Skolarina::create($request->all());
            $saved = $skolarina->save();

            if(!$saved){
                \Session::flash('flash-error', 'update');
            }else{
                \Session::flash('flash-success', 'update');
            }

            $kandidatId = $request->kandidat_id;
        }else{
            $skolarina = Skolarina::find($request->id);
            $skolarina->iznos = $request->iznos;
            $skolarina->komentar = $request->komentar;
            $skolarina->tipStudija_id = $request->tipStudija_id;
            $skolarina->godinaStudija_id = $request->godinaStudija_id;
            $saved = $skolarina->save();

            if(!$saved){
                \Session::flash('flash-error', 'update');
            }else{
                \Session::flash('flash-success', 'update');
            }

            $kandidatId = $skolarina->kandidat_id;
        }

        return redirect("/skolarina/arhiva/{$kandidatId}");
    }

    public function createUplata($id)
    {
        $skolarina = Skolarina::find($id);

        $kandidat = Kandidat::find($skolarina->kandidat_id);

        return view('skolarina.createUplata', compact('kandidat', 'skolarina'));
    }

    public function editUplata($id)
    {
        $uplata = UplataSkolarine::find($id);

        $skolarina = Skolarina::find($uplata->skolarina_id);

        $kandidat = Kandidat::find($skolarina->kandidat_id);

        return view('skolarina.editUplata', compact('uplata', 'kandidat', 'skolarina'));
    }

    public function storeUplata(Request $request)
    {
        if(empty($request->id)) {
            //create new
            $uplata = new UplataSkolarine($request->all());
            $saved = $uplata->save();
        }else{
            //update existing
            $uplata = UplataSkolarine::find($request->id);
            $uplata->iznos = $request->iznos;
            $uplata->naziv = $request->naziv;
            $uplata->datum = $request->datum;
            $saved = $uplata->save();
        }

        if (!$saved) {
            \Session::flash('error', 'Грешка!');
        }
        return redirect("/skolarina/{$request->kandidat_id}");
    }

    public function deleteUplata($id)
    {
        $kandidatId = UplataSkolarine::find($id)->kandidat_id;
        UplataSkolarine::destroy($id);
        return redirect("/skolarina/{$kandidatId}");
    }

    public function arhiva($id)
    {
        $kandidat = Kandidat::find($id);
        $sveSkolarine = Skolarina::where(['kandidat_id' => $id])->get();

        return view('skolarina.arhiva', compact('kandidat', 'sveSkolarine'));
    }

    public function view($id)
    {
        $trenutnaSkolarina = Skolarina::find($id);
        $kandidat = Kandidat::find($trenutnaSkolarina->kandidat_id);

        $uplacenIznos = 0;
        $preostaliIznos = 0;

        if($trenutnaSkolarina != null){
            $trenutneUplate = UplataSkolarine::where([
                'skolarina_id' => $trenutnaSkolarina->id,
            ])->get();
            $uplacenIznos = $trenutneUplate->sum('iznos');
            $preostaliIznos = $trenutnaSkolarina->iznos - $uplacenIznos;
        }else{
            $trenutneUplate = null;
        }

        return view('skolarina.index', compact('kandidat', 'trenutnaSkolarina', 'trenutneUplate', 'uplacenIznos', 'preostaliIznos'));
    }

    public function delete($id)
    {
        $skolarina = Skolarina::find($id);
        $kandidatId = $skolarina->kandidat_id;
        $deleted = $skolarina->delete();

        if(!$deleted){
            \Session::flash('flash-error', 'delete');
        }else{
            \Session::flash('flash-success', 'delete');
        }

        return redirect("/skolarina/arhiva/{$kandidatId}");
    }
}
