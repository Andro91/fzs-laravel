<?php

namespace App\Http\Controllers;

use App\PrilozenaDokumenta;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use PDF;

class PrilozenaDokumentaController extends Controller
{
    public function index()
    {
        $dokument = PrilozenaDokumenta::all();

        return view('sifarnici.prilozenaDokumenta', compact('dokument'));
    }

    public function unos(Request $request)
    {
        $dokument = new PrilozenaDokumenta();

        $dokument->redniBrojDokumenta = $request->redniBrojDokumenta;
        $dokument->naziv = $request->naziv;
        $dokument->indGodina = $request->indGodina;

        $dokument->save();

        return back();
    }

    public function edit(PrilozenaDokumenta $dokument)
    {
        return view('sifarnici.editPrilozenaDokumenta', compact('dokument'));
    }

    public function update(Request $request, PrilozenaDokumenta $dokument)
    {
        $dokument->redniBrojDokumenta = $request->redniBrojDokumenta;
        $dokument->naziv = $request->naziv;
        $dokument->indGodina = $request->indGodina;

        $dokument->update();

        return Redirect::to('/prilozenaDokumenta');
    }

    public function delete(PrilozenaDokumenta $dokument)
    {
        $dokument->delete();

        return back();
    }
}
