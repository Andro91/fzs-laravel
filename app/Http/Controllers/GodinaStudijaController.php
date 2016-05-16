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
}
