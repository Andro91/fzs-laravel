<?php

namespace App\Http\Controllers;

use App\Mesto;
use Illuminate\Http\Request;

use App\Http\Requests;

class MestoController extends Controller
{
    public function index()
    {
        $mesto = Mesto::all();

        return view('sifarnici.mesto', compact('mesto'));
    }
}
