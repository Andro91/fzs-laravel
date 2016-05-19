<?php

namespace App\Http\Controllers;

use App\GodinaStudija;
use App\Kandidat;
use App\KrsnaSlava;
use App\Mesto;
use App\OpstiUspeh;
use App\PrilozenaDokumenta;
use App\SkolskaGodUpisa;
use App\Sport;
use App\SportskoAngazovanje;
use App\SrednjeSkoleFakulteti;
use App\StatusStudiranja;
use App\StudijskiProgram;
use App\TipStudija;
use App\UspehSrednjaSkola;
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
            $krsnaSlava = KrsnaSlava::all();
            $nazivSkoleFakulteta = SrednjeSkoleFakulteti::all();
            $mestoZavrseneSkoleFakulteta = Mesto::all();
            $opstiUspehSrednjaSkola = OpstiUspeh::all();
            $uspehSrednjaSkola = UspehSrednjaSkola::all();
            $sportskoAngazovanje = SportskoAngazovanje::all();
            $prilozeniDokumentPrvaGodina = PrilozenaDokumenta::all();
            $statusaUpisaKandidata = StatusStudiranja::all();
            $studijskiProgram = StudijskiProgram::all();
            $tipStudija = TipStudija::all();
            $godinaStudija = GodinaStudija::all();
            $skolskeGodineUpisa = SkolskaGodUpisa::all();

            return view("kandidat.create_part_1")
                ->with('mestoRodjenja', $mestoRodjenja)
                ->with('krsnaSlava', $krsnaSlava)
                ->with('nazivSkoleFakulteta', $nazivSkoleFakulteta)
                ->with('mestoZavrseneSkoleFakulteta', $mestoZavrseneSkoleFakulteta)
                ->with('opstiUspehSrednjaSkola', $opstiUspehSrednjaSkola)
                ->with('uspehSrednjaSkola', $uspehSrednjaSkola)
                ->with('sportskoAngazovanje', $sportskoAngazovanje)
                ->with('prilozeniDokumentPrvaGodina', $prilozeniDokumentPrvaGodina)
                ->with('statusaUpisaKandidata', $statusaUpisaKandidata)
                ->with('studijskiProgram', $studijskiProgram)
                ->with('tipStudija', $tipStudija)
                ->with('godinaStudija', $godinaStudija)
                ->with('skolskeGodineUpisa', $skolskeGodineUpisa);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->page == 1) {

            $kandidat = new Kandidat();
            $kandidat->imeKandidata = $request->ImeKandidata;
            $kandidat->prezimeKandidata = $request->PrezimeKandidata;
            $kandidat->jmbg = $request->JMBG;
            $kandidat->datumRodjenja = $request->DatumRodjenja;
            $kandidat->mestoRodjenja_id = $request->MestoRodjenja;
            $kandidat->krsnaSlava_id = $request->KrsnaSlava;
            $kandidat->kontaktTelefon = $request->KontaktTelefon;
            $kandidat->adresaStanovanja = $request->AdresaStanovanja;
            $kandidat->email = $request->Email;
            $kandidat->imePrezimeJednogRoditelja = $request->ImePrezimeJednogRoditelja;
            $kandidat->kontaktTelefonRoditelja = $request->KontaktTelefonRoditelja;
            $kandidat->srednjeSkoleFakulteti_id = $request->NazivSkoleFakulteta;
            $kandidat->mestoZavrseneSkoleFakulteta_id = $request->MestoZavrseneSkoleFakulteta;
            $kandidat->smerZavrseneSkoleFakulteta = $request->SmerZavrseneSkoleFakulteta;

            $kandidat->studijskiProgram_id = $request->StudijskiProgram;
            $kandidat->skolskaGodinaUpisa_id = $request->SkolskeGodineUpisa;
            $kandidat->godinaStudija_id = $request->GodinaStudija;

            $kandidat->save();

            $insertedId = $kandidat->id;

            $mestoRodjenja = Mesto::all();
            //$krsnaSlava = KrsnaSlava::all();
            $nazivSkoleFakulteta = SrednjeSkoleFakulteti::all();
            $mestoZavrseneSkoleFakulteta = Mesto::all();
            $opstiUspehSrednjaSkola = OpstiUspeh::all();
            $uspehSrednjaSkola = UspehSrednjaSkola::all();
            $sportskoAngazovanje = SportskoAngazovanje::all();
            $prilozeniDokumentPrvaGodina = PrilozenaDokumenta::all();
            $statusaUpisaKandidata = StatusStudiranja::all();
            $studijskiProgram = StudijskiProgram::all();
            $tipStudija = TipStudija::all();
            $godinaStudija = GodinaStudija::all();
            $skolskeGodineUpisa = SkolskaGodUpisa::all();
            $sport = Sport::all();
            $dokumentiPrvaGodina = PrilozenaDokumenta::where('indGodina','1')->get();
            $dokumentiOstaleGodine = PrilozenaDokumenta::where('indGodina','2')->get();

            return view("kandidat.create_part_2")
                ->with('mestoRodjenja', $mestoRodjenja)
                //->with('krsnaSlava', $krsnaSlava)
                ->with('nazivSkoleFakulteta', $nazivSkoleFakulteta)
                ->with('mestoZavrseneSkoleFakulteta', $mestoZavrseneSkoleFakulteta)
                ->with('opstiUspehSrednjaSkola', $opstiUspehSrednjaSkola)
                ->with('uspehSrednjaSkola', $uspehSrednjaSkola)
                ->with('sportskoAngazovanje', $sportskoAngazovanje)
                ->with('prilozeniDokumentPrvaGodina', $prilozeniDokumentPrvaGodina)
                ->with('statusaUpisaKandidata', $statusaUpisaKandidata)
                ->with('studijskiProgram', $studijskiProgram)
                ->with('tipStudija', $tipStudija)
                ->with('godinaStudija', $godinaStudija)
                ->with('skolskeGodineUpisa', $skolskeGodineUpisa)
                ->with('insertedId',$insertedId)
                ->with('sport',$sport)
                ->with('dokumentiPrvaGodina',$dokumentiPrvaGodina)
                ->with('dokumentiOstaleGodine',$dokumentiOstaleGodine);

        }else if($request->page == 2){

            $kandidat = Kandidat::find($request->insertedId);

            return $request->all();

        }
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

    public function test1()
    {
        $mestoRodjenja = Mesto::all();
        $krsnaSlava = KrsnaSlava::all();
        $nazivSkoleFakulteta = SrednjeSkoleFakulteti::all();
        $mestoZavrseneSkoleFakulteta = Mesto::all();
        $opstiUspehSrednjaSkola = OpstiUspeh::all();
        $uspehSrednjaSkola = UspehSrednjaSkola::all();
        $sportskoAngazovanje = SportskoAngazovanje::all();
        $prilozeniDokumentPrvaGodina = PrilozenaDokumenta::all();
        $statusaUpisaKandidata = StatusStudiranja::all();
        $studijskiProgram = StudijskiProgram::all();
        $tipStudija = TipStudija::all();
        $godinaStudija = GodinaStudija::all();
        $skolskeGodineUpisa = SkolskaGodUpisa::all();

        return view("kandidat.create_part_1")
            ->with('mestoRodjenja', $mestoRodjenja)
            ->with('krsnaSlava', $krsnaSlava)
            ->with('nazivSkoleFakulteta', $nazivSkoleFakulteta)
            ->with('mestoZavrseneSkoleFakulteta',$mestoZavrseneSkoleFakulteta)
            ->with('opstiUspehSrednjaSkola',$opstiUspehSrednjaSkola)
            ->with('uspehSrednjaSkola',$uspehSrednjaSkola)
            ->with('sportskoAngazovanje',$sportskoAngazovanje)
            ->with('prilozeniDokumentPrvaGodina',$prilozeniDokumentPrvaGodina)
            ->with('statusaUpisaKandidata',$statusaUpisaKandidata)
            ->with('studijskiProgram',$studijskiProgram)
            ->with('tipStudija',$tipStudija)
            ->with('godinaStudija',$godinaStudija)
            ->with('skolskeGodineUpisa',$skolskeGodineUpisa);
    }

    public function test2()
    {
        $mestoRodjenja = Mesto::all();
        $krsnaSlava = KrsnaSlava::all();
        $nazivSkoleFakulteta = SrednjeSkoleFakulteti::all();
        $mestoZavrseneSkoleFakulteta = Mesto::all();
        $opstiUspehSrednjaSkola = OpstiUspeh::all();
        $uspehSrednjaSkola = UspehSrednjaSkola::all();
        $sportskoAngazovanje = SportskoAngazovanje::all();
        $prilozeniDokumentPrvaGodina = PrilozenaDokumenta::all();
        $statusaUpisaKandidata = StatusStudiranja::all();
        $studijskiProgram = StudijskiProgram::all();
        $tipStudija = TipStudija::all();
        $godinaStudija = GodinaStudija::all();
        $skolskeGodineUpisa = SkolskaGodUpisa::all();

        return view("kandidat.create_part_2")
            ->with('mestoRodjenja', $mestoRodjenja)
            ->with('krsnaSlava', $krsnaSlava)
            ->with('nazivSkoleFakulteta', $nazivSkoleFakulteta)
            ->with('mestoZavrseneSkoleFakulteta',$mestoZavrseneSkoleFakulteta)
            ->with('opstiUspehSrednjaSkola',$opstiUspehSrednjaSkola)
            ->with('uspehSrednjaSkola',$uspehSrednjaSkola)
            ->with('sportskoAngazovanje',$sportskoAngazovanje)
            ->with('prilozeniDokumentPrvaGodina',$prilozeniDokumentPrvaGodina)
            ->with('statusaUpisaKandidata',$statusaUpisaKandidata)
            ->with('studijskiProgram',$studijskiProgram)
            ->with('tipStudija',$tipStudija)
            ->with('godinaStudija',$godinaStudija)
            ->with('skolskeGodineUpisa',$skolskeGodineUpisa);
    }

    public function testPost(Request $request)
    {
        return $request->all();
    }
}
