<?php

namespace App\Http\Controllers;

use App\PrilozenaDokumenta;
use App\GodinaStudija;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use PDF;

class PrilozenaDokumentaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        try {
            $dokument = PrilozenaDokumenta::all();
            $godinaStudija = GodinaStudija::all();
        } catch (\Illuminate\Database\QueryException $e) {
            dd('Дошло је до непредвиђене грешке.' . $e->getMessage());
        }

        return view('sifarnici.prilozenaDokumenta', compact('dokument', 'godinaStudija'));
    }

    public function unos(Request $request)
    {
        $dokument = new PrilozenaDokumenta();

        $dokument->redniBrojDokumenta = $request->redniBrojDokumenta;
        $dokument->naziv = $request->naziv;
        $dokument->skolskaGodina_id = $request->skolskaGodina_id;

        try {
            $dokument->save();
        } catch (\Illuminate\Database\QueryException $e) {
            dd('Дошло је до непредвиђене грешке.' . $e->getMessage());
        }

        return back();
    }

    public function edit(PrilozenaDokumenta $dokument)
    {
        $godinaStudija = GodinaStudija::all();

        return view('sifarnici.editPrilozenaDokumenta', compact('dokument', 'godinaStudija'));
    }

    public function update(Request $request, PrilozenaDokumenta $dokument)
    {
        $dokument->redniBrojDokumenta = $request->redniBrojDokumenta;
        $dokument->naziv = $request->naziv;
        $dokument->skolskaGodina_id = $request->skolskaGodina_id;

        try {
            $dokument->update();
        } catch (\Illuminate\Database\QueryException $e) {
            dd('Дошло је до непредвиђене грешке.' . $e->getMessage());
        }

        return Redirect::to('/prilozenaDokumenta');
    }

    public function delete(PrilozenaDokumenta $dokument)
    {
        try {
            $dokument->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            dd('Дошло је до непредвиђене грешке.' . $e->getMessage());
        }

        return back();
    }
}
