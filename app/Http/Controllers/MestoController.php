<?php

namespace App\Http\Controllers;

use App\Mesto;
use App\Opstina;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
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

    public function edit(Mesto $mesto)
    {
        $opstina = Opstina::all();

        return view('sifarnici.editMesto', compact('opstina', 'mesto'));
    }

    public function update(Request $request, Mesto $mesto)
    {
        $mesto->naziv = $request->naziv;
        $mesto->opstina_id = $request->opstina_id;

        $mesto->update();

        return Redirect::to('/mesto');
    }

    public function delete(Mesto $mesto)
    {
        $mesto->delete();

        return back();
    }
}
