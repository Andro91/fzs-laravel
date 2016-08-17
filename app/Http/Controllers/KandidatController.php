<?php

namespace App\Http\Controllers;

use App\GodinaStudija;
use App\Kandidat;
use App\KandidatPrilozenaDokumenta;
use App\KrsnaSlava;
use App\Mesto;
use App\OpstiUspeh;
use App\Opstina;
use App\PrilozenaDokumenta;
use App\SkolskaGodUpisa;
use App\Sport;
use App\SportskoAngazovanje;
use App\SrednjeSkoleFakulteti;
use App\StatusStudiranja;
use App\StudijskiProgram;
use App\TipStudija;
use App\UpisGodine;
use App\UspehSrednjaSkola;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\SportskoAngazovanjeContoller;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Mockery\CountValidator\Exception;

class KandidatController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $studijskiProgramId = StudijskiProgram::where(['tipStudija_id' => 1])->first()->id;
        if( !empty($request->studijskiProgramId )){
            $studijskiProgramId = $request->studijskiProgramId;
        }

        $studijskiProgrami = StudijskiProgram::where(['tipStudija_id' => 1])->get();

        $kandidati = Kandidat::where(['tipStudija_id' => 1, 'upisan' => 0, 'studijskiProgram_id' => $studijskiProgramId])->get();

        return view("kandidat.indeks")
            ->with('kandidati', $kandidati)
            ->with('studijskiProgrami', $studijskiProgrami);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mestoRodjenja = Opstina::all();
        $krsnaSlava = KrsnaSlava::all();
        // $nazivSkoleFakulteta = SrednjeSkoleFakulteti::all();
        $mestoZavrseneSkoleFakulteta = Opstina::all();
        $opstiUspehSrednjaSkola = OpstiUspeh::all();
        $uspehSrednjaSkola = UspehSrednjaSkola::all();
        $sportskoAngazovanje = SportskoAngazovanje::all();
        $prilozeniDokumentPrvaGodina = PrilozenaDokumenta::all();
        $statusaUpisaKandidata = StatusStudiranja::all();
        $studijskiProgram = StudijskiProgram::where('tipStudija_id','1')->get();
        $tipStudija = TipStudija::all();
        $godinaStudija = GodinaStudija::all();
        $skolskeGodineUpisa = SkolskaGodUpisa::all();

        return view("kandidat.create_part_1")
            ->with('mestoRodjenja', $mestoRodjenja)
            ->with('krsnaSlava', $krsnaSlava)
            // ->with('nazivSkoleFakulteta', $nazivSkoleFakulteta)
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute је обавезно поље.',
            'JMBG.unique' => 'ЈМБГ мора бити уникатан. Већ постоји такав запис у бази.',
            'JMBG.max' => 'ЈМБГ не може имати више од 13 цифара.'
        ];

        $this->validate($request, [
            'JMBG' => 'unique:kandidat|max:13|required',
        ], $messages);

        if ($request->page == 1) {

            $kandidat = new Kandidat();
            $kandidat->imeKandidata = $request->ImeKandidata;
            $kandidat->prezimeKandidata = $request->PrezimeKandidata;
            $kandidat->jmbg = $request->JMBG;

            if(isset($request->uplata)){
                $kandidat->uplata = 1;
            }else{
                $kandidat->uplata = 0;
            }

            $kandidat->upisan = 0;

            //$dateArray = explode('.', ); date()
            if (date_create_from_format('d.m.Y.', $request->DatumRodjenja)) {
                $kandidat->datumRodjenja = date_create_from_format('d.m.Y.', $request->DatumRodjenja);
            } else {

            }

            $kandidat->mestoRodjenja_id = $request->MestoRodjenja;
            $kandidat->krsnaSlava_id = $request->KrsnaSlava;
            $kandidat->kontaktTelefon = $request->KontaktTelefon;
            $kandidat->adresaStanovanja = $request->AdresaStanovanja;
            $kandidat->email = $request->Email;
            $kandidat->imePrezimeJednogRoditelja = $request->ImePrezimeJednogRoditelja;
            $kandidat->kontaktTelefonRoditelja = $request->KontaktTelefonRoditelja;
            $kandidat->srednjeSkoleFakulteti = $request->NazivSkoleFakulteta;
            $kandidat->mestoZavrseneSkoleFakulteta_id = $request->MestoZavrseneSkoleFakulteta;
            $kandidat->smerZavrseneSkoleFakulteta = $request->SmerZavrseneSkoleFakulteta;

            $kandidat->tipStudija_id = 1;
            $kandidat->studijskiProgram_id = $request->StudijskiProgram;
            $kandidat->skolskaGodinaUpisa_id = $request->SkolskeGodineUpisa;
            $kandidat->godinaStudija_id = $request->GodinaStudija;

            $kandidat->save();

            $insertedId = $kandidat->id;

            UpisGodine::registrujKandidata($insertedId, $kandidat->uplata);

            $mestoZavrseneSkoleFakulteta = Opstina::all();
            $opstiUspehSrednjaSkola = OpstiUspeh::all();
            $uspehSrednjaSkola = UspehSrednjaSkola::all();
            $prilozeniDokumentPrvaGodina = PrilozenaDokumenta::all();
            $statusaUpisaKandidata = StatusStudiranja::all();
            $studijskiProgram = StudijskiProgram::all();
            $tipStudija = TipStudija::all();
            $godinaStudija = GodinaStudija::all();
            $skolskeGodineUpisa = SkolskaGodUpisa::all();
            $sport = Sport::all();
            $dokumentiPrvaGodina = PrilozenaDokumenta::where('skolskaGodina_id', '1')->get();
            $dokumentiOstaleGodine = PrilozenaDokumenta::where('skolskaGodina_id', '2')->get();

            return view("kandidat.create_part_2")
                ->with('mestoZavrseneSkoleFakulteta', $mestoZavrseneSkoleFakulteta)
                ->with('opstiUspehSrednjaSkola', $opstiUspehSrednjaSkola)
                ->with('uspehSrednjaSkola', $uspehSrednjaSkola)
                ->with('prilozeniDokumentPrvaGodina', $prilozeniDokumentPrvaGodina)
                ->with('statusaUpisaKandidata', $statusaUpisaKandidata)
                ->with('studijskiProgram', $studijskiProgram)
                ->with('tipStudija', $tipStudija)
                ->with('godinaStudija', $godinaStudija)
                ->with('skolskeGodineUpisa', $skolskeGodineUpisa)
                ->with('insertedId', $insertedId)
                ->with('sport', $sport)
                ->with('dokumentiPrvaGodina', $dokumentiPrvaGodina)
                ->with('dokumentiOstaleGodine', $dokumentiOstaleGodine);

        } else if ($request->page == 2) {

            $kandidat = Kandidat::find($request->insertedId);

            //$skola_id = $kandidat->srednjeSkoleFakulteti_id;


            $prviRazred = new UspehSrednjaSkola();
            $prviRazred->kandidat_id = $request->insertedId;
            // $prviRazred->SrednjeSkoleFakulteti_id = $skola_id;
            $prviRazred->opstiUspeh_id = $request->prviRazred;
            $prviRazred->srednja_ocena = $request->SrednjaOcena1;
            $prviRazred->RedniBrojRazreda = 1;
            $prviRazred->save();

            $drugiRazred = new UspehSrednjaSkola();
            $drugiRazred->kandidat_id = $request->insertedId;
            // $drugiRazred->SrednjeSkoleFakulteti_id = $skola_id;
            $drugiRazred->opstiUspeh_id = $request->drugiRazred;
            $drugiRazred->srednja_ocena = $request->SrednjaOcena2;
            $drugiRazred->RedniBrojRazreda = 2;
            $drugiRazred->save();

            $treciRazred = new UspehSrednjaSkola();
            $treciRazred->kandidat_id = $request->insertedId;
            // $treciRazred->SrednjeSkoleFakulteti_id = $skola_id;
            $treciRazred->opstiUspeh_id = $request->treciRazred;
            $treciRazred->srednja_ocena = $request->SrednjaOcena3;
            $treciRazred->RedniBrojRazreda = 3;
            $treciRazred->save();

            $cetvrtiRazred = new UspehSrednjaSkola();
            $cetvrtiRazred->kandidat_id = $request->insertedId;
            // $cetvrtiRazred->SrednjeSkoleFakulteti_id = $skola_id;
            $cetvrtiRazred->opstiUspeh_id = $request->cetvrtiRazred;
            $cetvrtiRazred->srednja_ocena = $request->SrednjaOcena4;


            $cetvrtiRazred->RedniBrojRazreda = 4;
            $cetvrtiRazred->save();

            $kandidat->opstiUspehSrednjaSkola_id = $request->OpstiUspehSrednjaSkola;
            $kandidat->srednjaOcenaSrednjaSkola = $request->SrednjaOcenaSrednjaSkola;

            if ($request->sport1 != 0) {
                $sport1 = new SportskoAngazovanje();
                $sport1->sport_id = $request->sport1;
                $sport1->kandidat_id = $request->insertedId;
                $sport1->nazivKluba = $request->klub1;
                $sport1->odDoGodina = $request->uzrast1;
                $sport1->ukupnoGodina = $request->godine1;
                $sport1->save();
            }

            if ($request->sport2 != 0) {
                $sport2 = new SportskoAngazovanje();
                $sport2->sport_id = $request->sport2;
                $sport2->kandidat_id = $request->insertedId;
                $sport2->nazivKluba = $request->klub2;
                $sport2->odDoGodina = $request->uzrast2;
                $sport2->ukupnoGodina = $request->godine2;
                $sport2->save();
            }

            if ($request->sport3 != 0) {
                $sport3 = new SportskoAngazovanje();
                $sport3->sport_id = $request->sport3;
                $sport3->kandidat_id = $request->insertedId;
                $sport3->nazivKluba = $request->klub3;
                $sport3->odDoGodina = $request->uzrast3;
                $sport3->ukupnoGodina = $request->godine3;
                $sport3->save();
            }

            $kandidat->visina = str_replace(",", ".", $request->VisinaKandidata);
            $kandidat->telesnaTezina = str_replace(",", ".", $request->TelesnaTezinaKandidata);


            if($request->has('dokumentiPrva')) {
                foreach ($request->dokumentiPrva as $dokument) {
                    $prilozenDokument = new KandidatPrilozenaDokumenta();
                    $prilozenDokument->prilozenaDokumenta_id = $dokument;
                    $prilozenDokument->kandidat_id = $request->insertedId;
                    $prilozenDokument->indikatorAktivan = 1;
                    $prilozenDokument->save();
                }
            }

            if($request->has('dokumentiDruga')) {
                foreach ($request->dokumentiDruga as $dokument) {
                    $prilozenDokument = new KandidatPrilozenaDokumenta();
                    $prilozenDokument->prilozenaDokumenta_id = $dokument;
                    $prilozenDokument->kandidat_id = $request->insertedId;
                    $prilozenDokument->indikatorAktivan = 1;
                    $prilozenDokument->save();
                }
            }

//            foreach ($dokumenta as $dokument) {
//                if ($request->has(str_replace(' ', '_', $dokument->naziv))) {
//                    $prilozenDokument = new KandidatPrilozenaDokumenta();
//                    $prilozenDokument->prilozenaDokumenta_id = $dokument->id;
//                    $prilozenDokument->kandidat_id = $request->insertedId;
//                    $prilozenDokument->indikatorAktivan = 1;
//                    $prilozenDokument->save();
//                }
//            }

            //$kandidat->statusUpisa_id = $request->StatusaUpisaKandidata;
            $kandidat->brojBodovaTest = $request->BrojBodovaTest;
            $kandidat->brojBodovaSkola = $request->BrojBodovaSkola;
            $kandidat->upisniRok = $request->UpisniRok;
            //$kandidat->indikatorAktivan = $request->IndikatorAktivan;

//            if($kandidat->uplata == 1){
//                $upisGodine = new UpisGodine();
//                $upisGodine->kandidat_id = $request->insertedId;
//                $upisGodine->godina = 1;
//                $upisGodine->skolarina = 1;
//                $upisGodine->upisan = 0;
//                $upisGodine->save();
//
//                UpisGodine::upisiGodinu($request->insertedId, $kandidat->uplata);
//            }


            $kandidat->save();

            return redirect('/kandidat/');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kandidat = Kandidat::find($id)->toArray();

        return view('kandidat.details')->with('kandidat', $kandidat);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kandidat = Kandidat::find($id);


        $mestoRodjenja = Opstina::all();
        $krsnaSlava = KrsnaSlava::all();
        // $nazivSkoleFakulteta = SrednjeSkoleFakulteti::all();
        $mestoZavrseneSkoleFakulteta = Opstina::all();
        $opstiUspehSrednjaSkola = OpstiUspeh::all();
        $uspehSrednjaSkola = UspehSrednjaSkola::all();
        $prilozeniDokumentPrvaGodina = PrilozenaDokumenta::all();
        $statusaUpisaKandidata = StatusStudiranja::all();
        $studijskiProgram = StudijskiProgram::all();
        $tipStudija = TipStudija::all();
        $godinaStudija = GodinaStudija::all();
        $skolskeGodineUpisa = SkolskaGodUpisa::all();
        $sport = Sport::all();
        $dokumentiPrvaGodina = PrilozenaDokumenta::where('skolskaGodina_id', '1')->get();
        $dokumentiOstaleGodine = PrilozenaDokumenta::where('skolskaGodina_id', '2')->get();

        $prilozenaDokumenta = KandidatPrilozenaDokumenta::where('kandidat_id', $id)->lists('prilozenaDokumenta_id')->toArray();


        try {
            $prviRazred = UspehSrednjaSkola::where(['kandidat_id' => $id, 'RedniBrojRazreda' => 1])->firstOrFail();
        }catch (ModelNotFoundException $e){
            $prviRazred = new UspehSrednjaSkola();
            $prviRazred->kandidat_id = 0;
            // $prviRazred->SrednjeSkoleFakulteti_id = 1;
            $prviRazred->opstiUspeh_id = 1;
            $prviRazred->srednja_ocena = 0;
            $prviRazred->RedniBrojRazreda = 1;
        }

        try {
            $drugiRazred = UspehSrednjaSkola::where(['kandidat_id' => $id, 'RedniBrojRazreda' => 2])->firstOrFail();
        }catch (ModelNotFoundException $e){
            $drugiRazred = new UspehSrednjaSkola();
            $drugiRazred->kandidat_id = 0;
            // $drugiRazred->SrednjeSkoleFakulteti_id = 1;
            $drugiRazred->opstiUspeh_id = 1;
            $drugiRazred->srednja_ocena = 0;
            $drugiRazred->RedniBrojRazreda = 1;
        }

        try {
            $treciRazred = UspehSrednjaSkola::where(['kandidat_id' => $id, 'RedniBrojRazreda' => 3])->firstOrFail();
        }catch (ModelNotFoundException $e){
            $treciRazred = new UspehSrednjaSkola();
            $treciRazred->kandidat_id = 0;
            // $treciRazred->SrednjeSkoleFakulteti_id = 1;
            $treciRazred->opstiUspeh_id = 1;
            $treciRazred->srednja_ocena = 0;
            $treciRazred->RedniBrojRazreda = 1;
        }

        try {
            $cetvrtiRazred = UspehSrednjaSkola::where(['kandidat_id' => $id, 'RedniBrojRazreda' => 4])->firstOrFail();
        }catch (ModelNotFoundException $e){
            $cetvrtiRazred = new UspehSrednjaSkola();
            $cetvrtiRazred->kandidat_id = 0;
            // $cetvrtiRazred->SrednjeSkoleFakulteti_id = 1;
            $cetvrtiRazred->opstiUspeh_id = 1;
            $cetvrtiRazred->srednja_ocena = 0;
            $cetvrtiRazred->RedniBrojRazreda = 1;
        }

        $sportskoAngazovanjeKandidata = SportskoAngazovanje::where('kandidat_id', $id)->get();


        return view('kandidat.update')->with('kandidat', $kandidat)
            ->with('mestoRodjenja', $mestoRodjenja)
            ->with('krsnaSlava', $krsnaSlava)
            ->with('mestoZavrseneSkoleFakulteta', $mestoZavrseneSkoleFakulteta)
            ->with('opstiUspehSrednjaSkola', $opstiUspehSrednjaSkola)
            ->with('uspehSrednjaSkola', $uspehSrednjaSkola)
            ->with('prilozeniDokumentPrvaGodina', $prilozeniDokumentPrvaGodina)
            ->with('statusaUpisaKandidata', $statusaUpisaKandidata)
            ->with('studijskiProgram', $studijskiProgram)
            ->with('tipStudija', $tipStudija)
            ->with('godinaStudija', $godinaStudija)
            ->with('skolskeGodineUpisa', $skolskeGodineUpisa)
            ->with('sport', $sport)
            ->with('dokumentiPrvaGodina', $dokumentiPrvaGodina)
            ->with('dokumentiOstaleGodine', $dokumentiOstaleGodine)
            ->with('prilozenaDokumenta', $prilozenaDokumenta)
            ->with('prviRazred', $prviRazred)
            ->with('drugiRazred', $drugiRazred)
            ->with('treciRazred', $treciRazred)
            ->with('cetvrtiRazred', $cetvrtiRazred)
            ->with('sportskoAngazovanjeKandidata', $sportskoAngazovanjeKandidata);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kandidat = Kandidat::find($id);


        $kandidat->imeKandidata = $request->ImeKandidata;
        $kandidat->prezimeKandidata = $request->PrezimeKandidata;
        $kandidat->jmbg = $request->JMBG;

        if(isset($request->uplata)){
            $kandidat->uplata = 1;
        }

        $kandidat->datumRodjenja = date_create_from_format('d.m.Y.', $request->DatumRodjenja);

        $kandidat->mestoRodjenja_id = $request->MestoRodjenja;
        $kandidat->krsnaSlava_id = $request->KrsnaSlava;
        $kandidat->kontaktTelefon = $request->KontaktTelefon;
        $kandidat->adresaStanovanja = $request->AdresaStanovanja;
        $kandidat->email = $request->Email;
        $kandidat->imePrezimeJednogRoditelja = $request->ImePrezimeJednogRoditelja;
        $kandidat->kontaktTelefonRoditelja = $request->KontaktTelefonRoditelja;

        $kandidat->srednjeSkoleFakulteti = $request->NazivSkoleFakulteta;
        $kandidat->mestoZavrseneSkoleFakulteta_id = $request->MestoZavrseneSkoleFakulteta;
        $kandidat->smerZavrseneSkoleFakulteta = $request->SmerZavrseneSkoleFakulteta;

        $kandidat->tipStudija_id = $request->TipStudija;
        $kandidat->studijskiProgram_id = $request->StudijskiProgram;
        $kandidat->skolskaGodinaUpisa_id = $request->SkolskeGodineUpisa;
        $kandidat->godinaStudija_id = $request->GodinaStudija;

        // $skola_id = $kandidat->srednjeSkoleFakulteti_id;

        try {
            $prviRazred = UspehSrednjaSkola::where(['kandidat_id' => $id, 'RedniBrojRazreda' => 1])->firstOrFail();
        }catch (ModelNotFoundException $e){
            $prviRazred = new UspehSrednjaSkola();
            $prviRazred->kandidat_id = $id;
            // $prviRazred->SrednjeSkoleFakulteti_id = 1;
            $prviRazred->opstiUspeh_id = 1;
            $prviRazred->srednja_ocena = 0;
            $prviRazred->RedniBrojRazreda = 1;
        }
        try {
            $drugiRazred = UspehSrednjaSkola::where(['kandidat_id' => $id, 'RedniBrojRazreda' => 2])->firstOrFail();
        }catch (ModelNotFoundException $e){
            $drugiRazred = new UspehSrednjaSkola();
            $drugiRazred->kandidat_id = $id;
            // $prviRazred->SrednjeSkoleFakulteti_id = 1;
            $drugiRazred->opstiUspeh_id = 1;
            $drugiRazred->srednja_ocena = 0;
            $drugiRazred->RedniBrojRazreda = 2;
        }
        try {
            $treciRazred = UspehSrednjaSkola::where(['kandidat_id' => $id, 'RedniBrojRazreda' => 3])->firstOrFail();
        }catch (ModelNotFoundException $e){
            $treciRazred = new UspehSrednjaSkola();
            $treciRazred->kandidat_id = $id;
            // $prviRazred->SrednjeSkoleFakulteti_id = 1;
            $treciRazred->opstiUspeh_id = 1;
            $treciRazred->srednja_ocena = 0;
            $treciRazred->RedniBrojRazreda = 3;
        }
        try {
            $cetvrtiRazred = UspehSrednjaSkola::where(['kandidat_id' => $id, 'RedniBrojRazreda' => 4])->firstOrFail();
        }catch (ModelNotFoundException $e){
            $cetvrtiRazred = new UspehSrednjaSkola();
            $cetvrtiRazred->kandidat_id = $id;
            // $prviRazred->SrednjeSkoleFakulteti_id = 1;
            $cetvrtiRazred->opstiUspeh_id = 1;
            $cetvrtiRazred->srednja_ocena = 0;
            $cetvrtiRazred->RedniBrojRazreda = 4;
        }

        $kandidat->opstiUspehSrednjaSkola_id = $request->OpstiUspehSrednjaSkola;
        $kandidat->srednjaOcenaSrednjaSkola = $request->SrednjaOcenaSrednjaSkola;

        $kandidat->visina = str_replace(",", ".", $request->VisinaKandidata);
        $kandidat->telesnaTezina = str_replace(",", ".", $request->TelesnaTezinaKandidata);

        //Brisanje svih dokumenata za datog kandidata
        KandidatPrilozenaDokumenta::where('kandidat_id',$id)->delete();

        //Dodavanje dokumenata iz prve godine
        if($request->has('dokumentiPrva')) {
            foreach ($request->dokumentiPrva as $dokument) {
                $prilozenDokument = new KandidatPrilozenaDokumenta();
                $prilozenDokument->prilozenaDokumenta_id = $dokument;
                $prilozenDokument->kandidat_id = $id;
                $prilozenDokument->indikatorAktivan = 1;
                $prilozenDokument->save();
            }
        }

        //Dodavanje dokumenata za ostale godine
        if($request->has('dokumentiDruga')){
            foreach ($request->dokumentiDruga as $dokument) {
                $prilozenDokument = new KandidatPrilozenaDokumenta();
                $prilozenDokument->prilozenaDokumenta_id = $dokument;
                $prilozenDokument->kandidat_id = $id;
                $prilozenDokument->indikatorAktivan = 1;
                $prilozenDokument->save();
            }
        }

        $kandidat->statusUpisa_id = $request->StatusaUpisaKandidata;
        $kandidat->brojBodovaTest = $request->BrojBodovaTest;
        $kandidat->brojBodovaSkola = $request->BrojBodovaSkola;
        $kandidat->upisniRok = $request->UpisniRok;
        $kandidat->indikatorAktivan = $request->IndikatorAktivan;

        $saved = $kandidat->save();

        if($saved){
            Session::flash('flash-success', 'update');
            return redirect('/kandidat/');
        }else{
            Session::flash('flash-error', 'update');
            return redirect('/kandidat/');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = Kandidat::destroy($id);

        if($deleted){
            Session::flash('flash-success', 'delete');
            return redirect('/kandidat/');
        }else{
            Session::flash('flash-error', 'delete');
            return redirect('/kandidat/');
        }

//        return redirect('/kandidat/');
    }

    public function sport($id)
    {
        $kandidat = Kandidat::find($id);
        $sportskoAngazovanje = SportskoAngazovanje::where('kandidat_id',$id)->get();
        //$sportskoAngazovanje = $kandidat->angazovanja();
        $sport = Sport::all();

        return view('kandidat.sportsko_angazovanje')
            ->with('sport',$sport)
            ->with('kandidat',$kandidat)
            ->with('sportskoAngazovanje',$sportskoAngazovanje)
            ->with('id',$id);
    }

    public function sportStore(Request $request,$id)
    {
        $kandidat = Kandidat::find($id);
        $sportskoAngazovanje = SportskoAngazovanje::where('kandidat_id',$id)->get();
        $sportovi = Sport::all();

        $sport = new SportskoAngazovanje();
        $sport->sport_id = $request->sport;
        $sport->kandidat_id = $id;
        $sport->nazivKluba = $request->klub;
        $sport->odDoGodina = $request->uzrast;
        $sport->ukupnoGodina = $request->godine;
        $sport->save();


        return redirect("/kandidat/{$id}/sportskoangazovanje")
            ->with('sport',$sportovi)
            ->with('kandidat',$kandidat)
            ->with('sportskoAngazovanje',$sportskoAngazovanje)
            ->with('id',$id);
    }

    public function testPost(Request $request)
    {
        return $request->all();
    }

    // DEO ZA MASTER STUDIJE
    public function createMaster(Request $request)
    {
        $mestoRodjenja = Opstina::all();
        $krsnaSlava = KrsnaSlava::all();
        // $nazivSkoleFakulteta = SrednjeSkoleFakulteti::all();
        $mestoZavrseneSkoleFakulteta = Opstina::all();
        $opstiUspehSrednjaSkola = OpstiUspeh::all();
        $uspehSrednjaSkola = UspehSrednjaSkola::all();
        $sportskoAngazovanje = SportskoAngazovanje::all();
        $prilozeniDokumentPrvaGodina = PrilozenaDokumenta::all();
        $statusaUpisaKandidata = StatusStudiranja::all();
        $studijskiProgram = StudijskiProgram::where('tipStudija_id','2')->get();
        $tipStudija = TipStudija::all();
        $godinaStudija = GodinaStudija::all();
        $skolskeGodineUpisa = SkolskaGodUpisa::all();

        $dokumentaMaster = PrilozenaDokumenta::where('skolskaGodina_id', '3')->get();

        return view('kandidat.create_master')
            ->with('mestoRodjenja', $mestoRodjenja)
            ->with('krsnaSlava', $krsnaSlava)
            // ->with('nazivSkoleFakulteta', $nazivSkoleFakulteta)
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
            ->with('dokumentaMaster', $dokumentaMaster);

    }

    public function storeMaster(Request $request)
    {
        $messages = [
            'required' => ':attribute је обавезно поље.',
            'JMBG.unique' => 'ЈМБГ мора бити уникатан. Већ постоји такав запис у бази.',
            'JMBG.max' => 'ЈМБГ не може имати више од 13 цифара.'
        ];

        $this->validate($request, [
            'JMBG' => 'unique:kandidat|max:13|required',
        ], $messages);

        $kandidat = new Kandidat();
        $kandidat->imeKandidata = $request->ImeKandidata;
        $kandidat->prezimeKandidata = $request->PrezimeKandidata;
        $kandidat->jmbg = $request->JMBG;

        $kandidat->upisan = 0;

        if(isset($request->uplata)){
            $kandidat->uplata = 1;
        }

        $kandidat->mestoRodjenja_id = $request->MestoRodjenja;
        $kandidat->kontaktTelefon = $request->KontaktTelefon;
        $kandidat->adresaStanovanja = $request->AdresaStanovanja;
        $kandidat->email = $request->Email;

        $kandidat->srednjeSkoleFakulteti = $request->NazivSkoleFakulteta;
        $kandidat->mestoZavrseneSkoleFakulteta_id = $request->MestoZavrseneSkoleFakulteta;
        $kandidat->smerZavrseneSkoleFakulteta = $request->SmerZavrseneSkoleFakulteta;

        $kandidat->tipStudija_id = 2;
        $kandidat->studijskiProgram_id = $request->StudijskiProgram;
        $kandidat->skolskaGodinaUpisa_id = $request->SkolskeGodineUpisa;

        $kandidat->prosecnaOcena = str_replace(",", ".", $request->ProsecnaOcena);
        $kandidat->upisniRok = $request->UpisniRok;

        $kandidat->save();

        $insertedId = $kandidat->id;

        //Brisanje svih dokumenata za datog kandidata
        KandidatPrilozenaDokumenta::where('kandidat_id',$insertedId)->delete();

        //Dodavanje dokumenata za master
        if($request->has('dokumentaMaster')) {
            foreach ($request->dokumentaMaster as $dokument) {
                $prilozenDokument = new KandidatPrilozenaDokumenta();
                $prilozenDokument->prilozenaDokumenta_id = $dokument;
                $prilozenDokument->kandidat_id = $insertedId;
                $prilozenDokument->indikatorAktivan = 1;
                $prilozenDokument->save();
            }
        }

        return redirect('/master/');
    }


    public function editMaster($id)
    {
        $mestoRodjenja = Opstina::all();
        $krsnaSlava = KrsnaSlava::all();
        // $nazivSkoleFakulteta = SrednjeSkoleFakulteti::all();
        $mestoZavrseneSkoleFakulteta = Opstina::all();
        $opstiUspehSrednjaSkola = OpstiUspeh::all();
        $uspehSrednjaSkola = UspehSrednjaSkola::all();
        $sportskoAngazovanje = SportskoAngazovanje::all();
        $prilozeniDokumentPrvaGodina = PrilozenaDokumenta::all();
        $statusaUpisaKandidata = StatusStudiranja::all();
        $studijskiProgram = StudijskiProgram::all();
        $tipStudija = TipStudija::all();
        $godinaStudija = GodinaStudija::all();
        $skolskeGodineUpisa = SkolskaGodUpisa::all();

        $dokumentaMaster = PrilozenaDokumenta::where('skolskaGodina_id', '3')->get();

        $prilozenaDokumenta = KandidatPrilozenaDokumenta::where('kandidat_id', $id)->lists('prilozenaDokumenta_id')->toArray();

        $kandidat = Kandidat::find($id);

        return view('kandidat.update_master')
            ->with('mestoRodjenja', $mestoRodjenja)
            ->with('krsnaSlava', $krsnaSlava)
            // ->with('nazivSkoleFakulteta', $nazivSkoleFakulteta)
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
            ->with('dokumentaMaster', $dokumentaMaster)
            ->with('prilozenaDokumenta',$prilozenaDokumenta)
            ->with('kandidat',$kandidat);
    }


    public function updateMaster(Request $request, $id)
    {
        $kandidat = Kandidat::find($id);
        $kandidat->imeKandidata = $request->ImeKandidata;
        $kandidat->prezimeKandidata = $request->PrezimeKandidata;
        $kandidat->jmbg = $request->JMBG;

        if(isset($request->uplata)){
            $kandidat->uplata = 1;
        }

        $kandidat->mestoRodjenja_id = $request->MestoRodjenja;
        $kandidat->kontaktTelefon = $request->KontaktTelefon;
        $kandidat->adresaStanovanja = $request->AdresaStanovanja;
        $kandidat->email = $request->Email;

        $kandidat->srednjeSkoleFakulteti = $request->NazivSkoleFakulteta;
        $kandidat->mestoZavrseneSkoleFakulteta_id = $request->MestoZavrseneSkoleFakulteta;
        $kandidat->smerZavrseneSkoleFakulteta = $request->SmerZavrseneSkoleFakulteta;

        $kandidat->tipStudija_id = $request->TipStudija;
        $kandidat->studijskiProgram_id = $request->StudijskiProgram;
        $kandidat->skolskaGodinaUpisa_id = $request->SkolskeGodineUpisa;

        $kandidat->prosecnaOcena = str_replace(",", ".", $request->ProsecnaOcena);
        $kandidat->upisniRok = $request->UpisniRok;

        $insertedId = $kandidat->save();

        //Brisanje svih dokumenata za datog kandidata
        KandidatPrilozenaDokumenta::where('kandidat_id',$id)->delete();

        //Dodavanje dokumenata za master
        if($request->has('dokumentaMaster')) {
            foreach ($request->dokumentaMaster as $dokument) {
                $prilozenDokument = new KandidatPrilozenaDokumenta();
                $prilozenDokument->prilozenaDokumenta_id = $dokument;
                $prilozenDokument->kandidat_id = $id;
                $prilozenDokument->indikatorAktivan = 1;
                $prilozenDokument->save();
            }
        }

        if($insertedId){
            Session::flash('flash-success', 'update');
            return redirect('/master/');
        }else{
            Session::flash('flash-error', 'update');
            return redirect('/master/');
        }

        //return redirect('/master/');
    }

    public function indexMaster(Request $request)
    {
        $studijskiProgramId = StudijskiProgram::where(['tipStudija_id' => 2])->first()->id;
        if( !empty($request->studijskiProgramId )){
            $studijskiProgramId = $request->studijskiProgramId;
        }

        $studijskiProgrami = StudijskiProgram::where(['tipStudija_id' => 2])->get();

        $kandidati = Kandidat::where(['tipStudija_id' => 2, 'upisan' => 0, 'studijskiProgram_id' => $studijskiProgramId])->get();

        return view("kandidat.index_master")
            ->with('kandidati', $kandidati)
            ->with('studijskiProgrami', $studijskiProgrami);
    }


    public function destroyMaster($id)
    {
        $deleted = Kandidat::destroy($id);

        if($deleted){
            Session::flash('flash-success', 'delete');
            return redirect('/master/');
        }else{
            Session::flash('flash-error', 'delete');
            return redirect('/master/');
        }
    }

    public function upisKandidata($id)
    {
        $kandidat = Kandidat::find($id);

        if($kandidat->uplata == 0){
            Session::flash('flash-error', 'upis');
            if($kandidat->tipStudija_id == 1){
                return redirect('/kandidat/');
            }else if($kandidat->tipStudija_id == 2){
                return redirect('/master/');
            }
        }else{
            $kandidat->upisan = 1;

            UpisGodine::uplatiGodinu($id, 1);
            UpisGodine::upisiGodinu($id, 1);

            $saved = $kandidat->save();
            if($saved){
                Session::flash('flash-success', 'upis');
            }else{
                Session::flash('flash-error', 'upis');
            }
            if($kandidat->tipStudija_id == 1){
                return redirect('/kandidat/');
            }else if($kandidat->tipStudija_id == 2){
                return redirect('/master/');
            }
        }
    }

    public function masovnaUplata(Request $request)
    {
        foreach ($request->odabir as $kandidatId) {

            $kandidat = Kandidat::find($kandidatId);
            $kandidat->uplata = 1;
            $kandidat->save();

            UpisGodine::uplatiGodinu($kandidatId, 1);
        }
        return redirect('/kandidat/');
    }

    public function masovniUpis(Request $request)
    {
        foreach ($request->odabir as $kandidatId) {

            $kandidat = Kandidat::find($kandidatId);
            $kandidat->upisan = 1;
            $kandidat->save();

            UpisGodine::upisiGodinu($kandidatId, 1);
        }
        return redirect('/kandidat/');
    }

    public function masovnaUplataMaster(Request $request)
    {
        foreach ($request->odabir as $kandidatId) {

            $kandidat = Kandidat::find($kandidatId);
            $kandidat->uplata = 1;
            $kandidat->save();

        }
        return redirect('/master/');
    }

    public function masovniUpisMaster(Request $request)
    {
        foreach ($request->odabir as $kandidatId) {

            $kandidat = Kandidat::find($kandidatId);
            $kandidat->upisan = 1;
            $kandidat->save();

        }
        return redirect('/master/');
    }
}
