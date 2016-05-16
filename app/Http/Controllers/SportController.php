<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sport;
use App\Http\Requests;

class SportController extends Controller
{
    public function index()
    {
        $sport = Sport::all();

        return view('sifarnici.sport', compact('sport'));
    }
}
