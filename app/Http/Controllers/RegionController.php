<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Region;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;

class RegionController extends Controller
{
    public function index()
    {
        $region = Region::all();

        return view('sifarnici.region', compact('region'));
    }

    public function unos(Request $request)
    {
        $region = new Region();
        $region->naziv = $request->naziv;

        $region->save();

        return back();
    }

    public function edit(Region $region)
    {
        return view('sifarnici.editRegion', compact('region'));
    }

    public function update(Request $request, Region $region)
    {
        $region->naziv = $request->naziv;

        $region->update();

        return Redirect::to('/region');
    }

    public function delete(Region $region)
    {
        $region->delete();

        return back();
    }

}
