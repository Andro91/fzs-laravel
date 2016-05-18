<?php

namespace App\Http\Controllers;

use App\SportskoAngazovanje;
use Illuminate\Http\Request;

use App\Http\Requests;

class SportskoAngazovanjeController extends Controller
{
    public function index()
    {
        $sportskoAngazovanje = SportskoAngazovanje::all();

        return view('sifarnici.sportskoAngazovanje ', compact('sportskoAngazovanje'));
    }
}
