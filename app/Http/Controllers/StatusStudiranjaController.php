<?php

namespace App\Http\Controllers;

use App\StatusStudiranja;
use Illuminate\Http\Request;

use App\Http\Requests;

class StatusStudiranjaController extends Controller
{
    public function index()
    {
        $statusStudiranja = StatusStudiranja::all();

        return view('sifarnici.statusStudiranja', compact('statusStudiranja'));
    }
}
