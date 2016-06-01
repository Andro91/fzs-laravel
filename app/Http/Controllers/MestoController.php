<?php

namespace App\Http\Controllers;

use App\Mesto;
use App\Opstina;
use Illuminate\Http\Request;

use App\Http\Requests;

class MestoController extends Controller
{
    public function index()
    {
        $mesto = Mesto::all();
        $opstina = Opstina::all();

        return view('sifarnici.mesto', compact('mesto', 'opstina'));
    }

    public function unos(Request $request)
    {
        $mesto = new Mesto();

        $mesto->naziv = $request->naziv;
        $mesto->opstina_id = $request->opstina_id;

        $mesto->save();

        return back();
    }
}
