<?php

namespace App\Http\Controllers;

use App\Opstina;
use Illuminate\Http\Request;

use App\Http\Requests;

class OpstinaController extends Controller
{
    public function index()
    {
        $opstina = Opstina::all();

        return view('sifarnici.opstina', compact('opstina'));
    }
}
