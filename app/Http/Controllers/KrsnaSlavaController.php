<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KrsnaSlava;

use App\Http\Requests;

class KrsnaSlavaController extends Controller
{
    public function index()
    {
        $krsnaSlava = KrsnaSlava::all();

        return view('sifarnici.krsnaSlava', compact('krsnaSlava'));
    }
}
