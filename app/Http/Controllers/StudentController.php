<?php

namespace App\Http\Controllers;

use App\UpisGodine;
use Illuminate\Http\Request;
use App\Kandidat;

use App\Http\Requests;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request, $tipStudijaId)
    {
        $godinaStudija = $request->godina;
        if($godinaStudija == null || $godinaStudija > 4 || $godinaStudija < 1){
            $godinaStudija = 1;
        }

        if($tipStudijaId == 1){
            $studenti = Kandidat::where(['tipStudija_id' => 1, 'upisan' => 1, 'godinaStudija_id' =>  $godinaStudija])->get();
            return view("student.indeks")->with('studenti', $studenti)->with('tipStudija', 1);
        }else if($tipStudijaId == 2){
            $studenti = Kandidat::where(['tipStudija_id' => 2, 'upisan' => 1, 'godinaStudija_id' =>  $godinaStudija])->get();
            return view("student.indeks")->with('studenti', $studenti)->with('tipStudija', 2);
        }
        return null;
    }

    public function upisStudenta($id)
    {
        $kandidat = Kandidat::find($id);
        $upisaneGodine = UpisGodine::where(['kandidat_id' => $id])->orderBy('godina', 'ASC')->get();

        return view('upis.index')
            ->with('upisaneGodine', $upisaneGodine)
            ->with('kandidat', $kandidat);
    }

    public function uplataSkolarine($id, Request $request)
    {
        $upisaneGodine = UpisGodine::where(['kandidat_id' => $id, 'godina' => $request->godina])->first();
        $upisaneGodine->skolarina = 1;
        $upisaneGodine->save();

        return redirect("/student/{$id}/upis");
    }

    public function upisiStudenta($id, Request $request)
    {
        if(empty($id) || empty($request->godina)){
            Session::flash('flash-error', 'upis');
            return redirect("student/{$id}/upis");
        }

        $upisaneGodine = UpisGodine::where(['kandidat_id' => $id, 'godina' => $request->godina])->first();
        $upisaneGodine->upisan = 1;
        $upisaneGodine->save();

        $kandidat = Kandidat::find($id);

        $kandidat->godinaStudija_id = $request->godina;

        $kandidat->save();

        return redirect("student/{$id}/upis");
    }
}
