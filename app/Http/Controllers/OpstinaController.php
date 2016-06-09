<?php

namespace App\Http\Controllers;

use App\Opstina;
use App\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;

class OpstinaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        try {
            $opstina = Opstina::all();
            $region = Region::all();
        } catch (\Illuminate\Database\QueryException $e) {
            dd('Дошло је до непредвиђене грешке.' . $e->getMessage());
        }

        return view('sifarnici.opstina', compact('opstina', 'region'));
    }

    public function unos(Request $request)
    {
        $opstina = new Opstina();

        $opstina->naziv = $request->naziv;
        $opstina->region_id = $request->region_id;

        try {
            $opstina->save();
        } catch (\Illuminate\Database\QueryException $e) {
            dd('Дошло је до непредвиђене грешке.' . $e->getMessage());
        }

        return back();
    }

    public function edit(Opstina $opstina)
    {
        try {
            $region = Region::all();
        } catch (\Illuminate\Database\QueryException $e) {
            dd('Дошло је до непредвиђене грешке.' . $e->getMessage());
        }

        return view('sifarnici.editOpstina', compact('opstina', 'region'));
    }

    public function update(Request $request, Opstina $opstina)
    {
        $opstina->naziv = $request->naziv;
        $opstina->region_id = $request->region_id;

        try {
            $opstina->update();
        } catch (\Illuminate\Database\QueryException $e) {
            dd('Дошло је до непредвиђене грешке.' . $e->getMessage());
        }

        return Redirect::to('/opstina');
    }

    public function delete(Opstina $opstina)
    {
        try {
            $opstina->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            dd('Дошло је до непредвиђене грешке.' . $e->getMessage());
        }

        return back();
    }

}
