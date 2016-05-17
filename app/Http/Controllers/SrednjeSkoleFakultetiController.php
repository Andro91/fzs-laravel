<?php

namespace App\Http\Controllers;

use App\SrednjeSkoleFakulteti;
use Illuminate\Http\Request;

use App\Http\Requests;

class SrednjeSkoleFakultetiController extends Controller
{
    public function index()
    {
        $srednjeSkoleFakulteti = SrednjeSkoleFakulteti::all();

        return view('sifarnici.srednjeSkoleFakulteti', compact('srednjeSkoleFakulteti'));
    }
}
