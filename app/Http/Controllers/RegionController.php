<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Region;

use App\Http\Requests;

class RegionController extends Controller
{
    public function index()
    {
        $region = Region::all();

        return view('sifarnici.region', compact('region'));
    }
}
