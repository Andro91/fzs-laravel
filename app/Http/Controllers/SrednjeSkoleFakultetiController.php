<?php

namespace App\Http\Controllers;

use App\SrednjeSkoleFakulteti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;

class SrednjeSkoleFakultetiController extends Controller
{
    public function index()
    {
        $srednjeSkoleFakulteti = SrednjeSkoleFakulteti::all();

        return view('sifarnici.srednjeSkoleFakulteti', compact('srednjeSkoleFakulteti'));
    }

    public function unos(Request $request)
    {
        $srednjeSkoleFakulteti = new SrednjeSkoleFakulteti();

        $srednjeSkoleFakulteti->naziv = $request->naziv;
        $srednjeSkoleFakulteti->indSkoleFakulteta = $request->indSkoleFakulteta;

        $srednjeSkoleFakulteti->save();

        return back();
    }

    public function edit(SrednjeSkoleFakulteti $srednjeSkoleFakulteti)
    {
        return view('sifarnici.editSrednjeSkoleFakulteti', compact('srednjeSkoleFakulteti'));
    }

    public function update(Request $request, SrednjeSkoleFakulteti $srednjeSkoleFakulteti)
    {
        $srednjeSkoleFakulteti->naziv = $request->naziv;
        $srednjeSkoleFakulteti->indSkoleFakulteta = $request->indSkoleFakulteta;

        $srednjeSkoleFakulteti->update();

        return Redirect::to('/srednjeSkoleFakulteti');
    }

    public function delete(SrednjeSkoleFakulteti $srednjeSkoleFakulteti)
    {
        $srednjeSkoleFakulteti->delete();

        return back();
    }

}
