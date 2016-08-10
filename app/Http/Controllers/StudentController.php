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

    public function index($tipStudijaId)
    {
        if($tipStudijaId == 1){
            $studenti = Kandidat::where(['tipStudija_id' => 1, 'upisan' => 1])->get();
            return view("student.indeks")->with('studenti', $studenti)->with('tipStudija', 1);
        }else if($tipStudijaId == 2){
            $studenti = Kandidat::where(['tipStudija_id' => 2, 'upisan' => 1])->get();
            return view("student.indeks")->with('studenti', $studenti)->with('tipStudija', 2);
        }
        return null;
    }
}
