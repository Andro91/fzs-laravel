<?php

namespace App\Http\Controllers;

use App\Kandidat;
use App\UpisGodine;
use Illuminate\Http\Request;

use App\Http\Requests;

class UpisController extends Controller
{
    public function index($kandidatId){
        $kandidat = Kandidat::find($kandidatId);
        $upisaneGodine = UpisGodine::where(['studentId' => $kandidatId])->get();

        return view('upis.index')
            ->with('upisaneGodine', $upisaneGodine)
            ->with('kandidat', $kandidat);
    }
}
