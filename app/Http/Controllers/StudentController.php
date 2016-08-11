<?php

namespace App\Http\Controllers;

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
}
