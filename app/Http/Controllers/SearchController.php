<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class SearchController extends Controller
{
    public function search()
    {
        return view('search.index');
    }

    public function searchResult(Request $request)
    {
        $query = \Nqxcode\LuceneSearch\Facade::query($request->pretraga)->get();
        return view('search.index', compact('query'));
    }
}
