<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\StudijskiProgram;

class StudijskiProgramController extends Controller
{
    public function index()
    {
        $studijskiProgram = StudijskiProgram::all();

        return view('sifarnici.studijskiProgram ', compact('studijskiProgram'));
    }
}
