<?php

namespace App\Http\Controllers;

use App\Kandidat;
use App\Skolarina;
use Illuminate\Http\Request;

use App\Http\Requests;

class SkolarinaController extends Controller
{
    public function index($id)
    {
        $kandidat = Kandidat::find($id);
        $skolarinaOS = Skolarina::where(['kandidat_id' => $id, 'tipStudija_id' => 1])->get();
        $skolarinaMS = Skolarina::where(['kandidat_id' => $id, 'tipStudija_id' => 2])->get();
        $skolarinaDS = Skolarina::where(['kandidat_id' => $id, 'tipStudija_id' => 3])->get();

        return view('skolarina.index', compact('kandidat'));
    }
}
