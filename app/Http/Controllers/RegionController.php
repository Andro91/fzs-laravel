<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Region;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use View;
use PDF;

class RegionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        try {
            $region = Region::all();
        } catch (\Illuminate\Database\QueryException $e) {
            dd('Дошло је до непредвиђене грешке.' . $e->getMessage());
        }

        return view('sifarnici.region', compact('region'));
    }

    public function unos(Request $request)
    {
        $region = new Region();
        $region->naziv = $request->naziv;

        try {
            $region->save();
        } catch (\Illuminate\Database\QueryException $e) {
            dd('Дошло је до непредвиђене грешке.' . $e->getMessage());
        }

        return Redirect::to('/region');
    }

    public function edit(Region $region)
    {
        return view('sifarnici.editRegion', compact('region'));
    }

    public function add()
    {
        return view('sifarnici.addRegion');
    }

    public function update(Request $request, Region $region)
    {
        $region->naziv = $request->naziv;

        try {
            $region->update();
        } catch (\Illuminate\Database\QueryException $e) {
            dd('Дошло је до непредвиђене грешке.' . $e->getMessage());
        }

        return Redirect::to('/region');
    }

    public function delete(Region $region)
    {
        try {
            $region->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            dd('Дошло је до непредвиђене грешке.' . $e->getMessage());
        }

        return back();
    }

}
