<?php

namespace App\Http\Controllers;

use App\Predmet;
use Illuminate\Http\Request;

use App\Http\Requests;

class PredmetController extends Controller
{
    public function index()
    {
        $predmet = Predmet::all();

        return view('sifarnici.predmet', compact('predmet'));
    }
}
