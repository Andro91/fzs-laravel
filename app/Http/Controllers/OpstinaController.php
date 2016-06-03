<?php

namespace App\Http\Controllers;

use App\Opstina;
use App\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;

class OpstinaController extends Controller
{
    public function index()
    {
        $opstina = Opstina::all();
        $region = Region::all();

        return view('sifarnici.opstina', compact('opstina', 'region'));
    }

    public function unos(Request $request)
    {
        $opstina = new Opstina();

        $opstina->naziv = $request->naziv;
        $opstina->region_id = $request->region_id;

        $opstina->save();

        return back();
    }

    public function edit(Opstina $opstina)
    {
        $region = Region::all();

        return view('sifarnici.editOpstina', compact('opstina', 'region'));
    }

    public function update(Request $request, Opstina $opstina)
    {
        $opstina->naziv = $request->naziv;
        $opstina->region_id = $request->region_id;

        $opstina->update();

        return Redirect::to('/opstina');
    }

    public function delete(Opstina $opstina)
    {
        $opstina->delete();

        return back();
    }

}
