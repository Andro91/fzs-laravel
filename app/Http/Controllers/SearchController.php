<?php

namespace App\Http\Controllers;

use App\Kandidat;
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
        //$query = \Nqxcode\LuceneSearch\Facade::query($request->pretraga, '*')->get();
        $query = Kandidat::where('imeKandidata', 'LIKE', '%' . $request->pretraga . '%')
            ->orWhere('prezimeKandidata', 'LIKE', '%' . $request->pretraga . '%')
            ->orWhere('jmbg', 'LIKE', '%' . $request->pretraga . '%')
            ->orWhere('mestoRodjenja', 'LIKE', '%' . $request->pretraga . '%')
            ->orWhere('kontaktTelefon', 'LIKE', '%' . $request->pretraga . '%')
            ->orWhere('adresaStanovanja', 'LIKE', '%' . $request->pretraga . '%')
            ->orWhere('email', 'LIKE', '%' . $request->pretraga . '%')
            ->orWhere('imePrezimeJednogRoditelja', 'LIKE', '%' . $request->pretraga . '%')
            ->orWhere('kontaktTelefonRoditelja', 'LIKE', '%' . $request->pretraga . '%')
            ->orWhere('srednjeSkoleFakulteti', 'LIKE', '%' . $request->pretraga . '%')
            ->orWhere('mestoZavrseneSkoleFakulteta', 'LIKE', '%' . $request->pretraga . '%')
            ->orWhere('smerZavrseneSkoleFakulteta', 'LIKE', '%' . $request->pretraga . '%')
            ->orWhere('upisniRok', 'LIKE', '%' . $request->pretraga . '%')
            ->orWhere('brojIndeksa', 'LIKE', '%' . $request->pretraga . '%')
            ->orWhere('drzavaZavrseneSkole', 'LIKE', '%' . $request->pretraga . '%')
            ->orWhere('drzavaRodjenja', 'LIKE', '%' . $request->pretraga . '%')
            ->orWhere('godinaZavrsetkaSkole', 'LIKE', '%' . $request->pretraga . '%')
            ->get();
        return view('search.index', compact('query'));
    }
}
