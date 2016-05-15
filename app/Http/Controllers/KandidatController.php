<?php

namespace App\Http\Controllers;

use App\Godina_Studija;
use App\Krsna_Slava;
use App\Mesto;
use App\Opsti_Uspeh;
use App\Prilozena_Dokumenta;
use App\Sportsko_Angazovanje;
use App\Srednje_Skole_Fakulteti;
use App\Status_Studiranja;
use App\Studijski_Program;
use App\Tip_Studija;
use App\Uspeh_Srednja_Skola;
use Illuminate\Http\Request;

use App\Http\Requests;

class KandidatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view("kandidat.indeks");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mestoRodjenja = Mesto::all();
        $krsnaSlava = Krsna_Slava::all();
        $nazivSkoleFakulteta = Srednje_Skole_Fakulteti::all();
        $mestoZavrseneSkoleFakulteta = Mesto::all();
        $opstiUspehSrednjaSkola = Opsti_Uspeh::all();
        $uspehSrednjaSkola = Uspeh_Srednja_Skola::all();
        $sportskoAngazovanje = Sportsko_Angazovanje::all();
        $prilozeniDokumentPrvaGodina = Prilozena_Dokumenta::all();
        $statusaUpisaKandidata = Status_Studiranja::all();
        $studijskiProgram = Studijski_Program::all();
        $tipStudija = Tip_Studija::all();
        $godinaStudija = Godina_Studija::all();

        return view("kandidat.create")
            ->with('mestoRodjenja', $mestoRodjenja)
            ->with('krsnaSlava', $krsnaSlava)
            ->with('nazivSkoleFakulteta', $nazivSkoleFakulteta)
            ->with('mestoZavrseneSkoleFakulteta',$mestoZavrseneSkoleFakulteta)
            ->with('opstiUspehSrednjaSkola',$opstiUspehSrednjaSkola)
            ->with('uspehSrednjaSkola',$uspehSrednjaSkola)
            ->with('sportskoAngazovanje',$sportskoAngazovanje)
            ->with('prilozeniDokumentPrvaGodina',$prilozeniDokumentPrvaGodina)
            ->with('statusaUpisaKandidata',$statusaUpisaKandidata)
            ->with('tipStudija',$tipStudija)
            ->with('godinaStudija',$godinaStudija);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
