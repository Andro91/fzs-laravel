<?php

namespace App\Http\Controllers;

use App\AktivniIspitniRokovi;
use App\GodinaStudija;
use App\IspitniRok;
use App\PolozeniIspiti;
use App\Predmet;
use App\PredmetProgram;
use App\PrijavaIspita;
use App\Profesor;
use App\ProfesorPredmet;
use App\SkolskaGodUpisa;
use App\StatusGodine;
use App\StudijskiProgram;
use App\TipPredmeta;
use App\TipPrijave;
use App\TipStudija;
use App\UpisGodine;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Kandidat;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request, $tipStudijaId)
    {
        $godinaStudija = $request->godina;
        if($godinaStudija == null || $godinaStudija > 4 || $godinaStudija < 1){
            $godinaStudija = 1;
        }

        $studijskiProgramId = 1;
        if( !empty($request->studijskiProgramId )){
            $studijskiProgramId = $request->studijskiProgramId;
        }

        if($tipStudijaId == 1){

            $studenti = Kandidat::where(['tipStudija_id' => 1, 'statusUpisa_id' => 1, 'godinaStudija_id' =>  $godinaStudija, 'studijskiProgram_id' => $studijskiProgramId])->get();
            $studijskiProgrami = StudijskiProgram::where(['tipStudija_id' => 1])->get();

            return view("student.indeks")
                ->with('studenti', $studenti)->with('tipStudija', 1)
                ->with('studijskiProgrami',$studijskiProgrami);

        }else if($tipStudijaId == 2){

            $studenti = Kandidat::where(['tipStudija_id' => 2, 'statusUpisa_id' => 1, 'studijskiProgram_id' => $studijskiProgramId])->get();
            $studijskiProgrami = StudijskiProgram::where(['tipStudija_id' => 2])->get();

            return view("student.index_master")->with('studenti', $studenti)
                ->with('tipStudija', 2)
                ->with('studijskiProgrami',$studijskiProgrami);
        }

        return "Дошло је до неочекиване грешке.";
    }

    //Status studenta
    public function upisStudenta($id)
    {
        $kandidat = Kandidat::find($id);
        $studijskiProgram = StudijskiProgram::where(['tipStudija_id' => 2])->get();
        $osnovneStudije = UpisGodine::where(['kandidat_id' => $id, 'tipStudija_id' => 1])
            ->orderBy('godina','ASC')
            ->orderBy('pokusaj', 'ASC')
            ->get();
        $masterStudije = UpisGodine::where(['kandidat_id' => $id, 'tipStudija_id' => 2])->get();

        $doktorskeStudije = UpisGodine::where(['kandidat_id' => $id, 'tipStudija_id' => 3])->get();

        return view('upis.index', compact('kandidat', 'osnovneStudije', 'masterStudije', 'doktorskeStudije', 'studijskiProgram'));
    }

    public function uplataSkolarine($id, Request $request)
    {
        $upisaneGodine = UpisGodine::where(['kandidat_id' => $id, 'godina' => $request->godina, 'pokusaj' => $request->pokusaj])->first();
        $upisaneGodine->skolarina = 1;
        $upisaneGodine->save();

        return redirect("/student/{$id}/upis");
    }

    public function upisiStudenta($id, Request $request)
    {
        if(empty($id) || empty($request->godina)){
            Session::flash('flash-error', 'upis');
            return redirect("student/{$id}/upis");
        }
        $kandidat = Kandidat::find($id);

        $godina = $request->godina;
        if($godina > 1){
            $max = UpisGodine::where(['kandidat_id' => $id, 'godina' => $godina-1])->max('pokusaj');
            $prethodnaGodina = UpisGodine::where([
                'kandidat_id' => $id,
                'godina' => $godina-1,
                'pokusaj' => $max,
                'tipStudija_id' => $kandidat->tipStudija_id])->first();
            $prethodnaGodina->statusGodine_id = 5;
            $prethodnaGodina->save();
        }

        $upisaneGodine = UpisGodine::where([
            'kandidat_id' => $id,
            'godina' => $request->godina,
            'pokusaj' => $request->pokusaj,
            'tipStudija_id' => $kandidat->tipStudija_id])->first();
        $upisaneGodine->statusGodine_id = 1;
        $upisaneGodine->datumUpisa = Carbon::now();
        $upisaneGodine->save();

        $kandidat->godinaStudija_id = $request->godina;

        $kandidat->save();

        return redirect("student/{$id}/upis");
    }

    public function obnoviGodinu($id, Request $request)
    {
        if(empty($id) || empty($request->godina)){
            Session::flash('flash-error', 'upis');
            return redirect("student/{$id}/upis");
        }

        $kandidat = Kandidat::find($id);

        $poslednjiPokusaj = UpisGodine::where([
            'kandidat_id' => $id,
            'godina' => $request->godina,
            'tipStudija_id' => $kandidat->tipStudija_id])->max('pokusaj');

        $prethodnaGodina = UpisGodine::where([
            'kandidat_id' => $id,
            'godina' => $request->godina,
            'pokusaj' => $poslednjiPokusaj,
            'tipStudija_id' => $kandidat->tipStudija_id])->first();
        $prethodnaGodina->statusGodine_id = 4;
        $prethodnaGodina->datumPromene = Carbon::now();
        $prethodnaGodina->save();

        $obnovaGodine = new UpisGodine();
        $obnovaGodine->kandidat_id = $id;
        $obnovaGodine->godina = $request->godina;
        $obnovaGodine->tipStudija_id = $request->tipStudijaId;
        $obnovaGodine->pokusaj = $poslednjiPokusaj + 1;
        $obnovaGodine->statusGodine_id = 1;
        $obnovaGodine->datumUpisa = Carbon::now();
        $obnovaGodine->save();

        $kandidat->godinaStudija_id = $request->godina;

        $kandidat->save();

        return redirect("student/{$id}/upis");
    }

    public function obrisiObnovuGodine($id, Request $request)
    {
        if(empty($id) || empty($request->upisId)){
            Session::flash('flash-error', 'upis');
            return redirect("student/{$id}/upis");
        }

        UpisGodine::destroy($request->upisId);

        return redirect("student/{$id}/upis");
    }

    public function ponistiUplatu($id, Request $request)
    {
        if(empty($id) || empty($request->upisId)){
            Session::flash('flash-error', 'upis');
            return redirect("student/{$id}/upis");
        }

        $upis = UpisGodine::find($request->upisId);
        $upis->skolarina = 0;
        $upis->save();

        if($upis->godina == 1){
            $kandidat = Kandidat::find($id);
            $kandidat->uplata = 0;
            $kandidat->save();
        }

        return redirect("student/{$id}/upis");
    }

    public function ponistiUpis($id, Request $request)
    {
        if(empty($id) || empty($request->upisId)){
            Session::flash('flash-error', 'upis');
            return redirect("student/{$id}/upis");
        }

        $upis = UpisGodine::find($request->upisId);
        $upis->statusGodine_id = 3;
        $upis->save();

        return redirect("student/{$id}/upis");
    }

    public function promeniStatus($id, $statusId)
    {
        $kandidat = Kandidat::find($id);
        $kandidat->statusUpisa_id = $statusId;
        $kandidat->datumStatusa = Carbon::now();
        $kandidat->save();
        return redirect("kandidat?studijskiProgramId={$kandidat->studijskiProgram_id}");
    }

    public function masovnaUplata(Request $request)
    {
        foreach ($request->odabir as $kandidatId) {
            $kandidat = Kandidat::find($kandidatId);
            $godina = $kandidat->godinaStudija_id + 1;
            UpisGodine::uplatiGodinu($kandidatId, $godina);
        }
        return redirect('/student/index/1');
    }

    public function masovniUpis(Request $request)
    {
        foreach ($request->odabir as $kandidatId) {

            $kandidat = Kandidat::find($kandidatId);
            $godina = $kandidat->godinaStudija_id + 1;

            UpisGodine::upisiGodinu($kandidatId, $godina, $kandidat->skolskaGodinaUpisa_id);
        }
        return redirect('/student/index/1');
    }

    public function svePrijaveIspitaZaStudenta($id)
    {
        $kandidat = Kandidat::find($id);
        $prijave = $kandidat->prijaveIspita()->get();

        $polozeniIspitiPrvaGodina = \DB::table('polozeni_ispiti')
            ->join('predmet_program', 'polozeni_ispiti.predmet_id', '=', 'predmet_program.id')
            ->join('predmet', 'predmet.id', '=', 'predmet_program.predmet_id')
            ->join('prijava_ispita', 'prijava_ispita.id', '=', 'polozeni_ispiti.prijava_id')
            ->join('zapisnik_o_polaganju_ispita', 'zapisnik_o_polaganju_ispita.id', '=', 'polozeni_ispiti.zapisnik_id')
            ->select(\DB::raw("polozeni_ispiti.*,
                predmet.naziv as naziv,
                prijava_ispita.rok_id as rok,
                prijava_ispita.brojPolaganja as broj,
                DATE_FORMAT(zapisnik_o_polaganju_ispita.datum , '%d.%m.%Y') as datum"))
            ->where(['predmet_program.godinaStudija_id' => 1, 'predmet_program.tipStudija_id' => 1, 'polozeni_ispiti.kandidat_id' => $id])
            ->get();

        $polozeniIspitiDrugaGodina = \DB::table('polozeni_ispiti')
            ->join('predmet_program', 'polozeni_ispiti.predmet_id', '=', 'predmet_program.id')
            ->join('predmet', 'predmet.id', '=', 'predmet_program.predmet_id')
            ->join('prijava_ispita', 'prijava_ispita.id', '=', 'polozeni_ispiti.prijava_id')
            ->join('zapisnik_o_polaganju_ispita', 'zapisnik_o_polaganju_ispita.id', '=', 'polozeni_ispiti.zapisnik_id')
            ->select(\DB::raw("polozeni_ispiti.*,
                predmet.naziv as naziv,
                prijava_ispita.rok_id as rok,
                prijava_ispita.brojPolaganja as broj,
                DATE_FORMAT(zapisnik_o_polaganju_ispita.datum , '%d.%m.%Y') as datum"))
            ->where(['predmet_program.godinaStudija_id' => 2, 'predmet_program.tipStudija_id' => 1, 'polozeni_ispiti.kandidat_id' => $id])
            ->get();

        $polozeniIspitiTrecaGodina = \DB::table('polozeni_ispiti')
            ->join('predmet_program', 'polozeni_ispiti.predmet_id', '=', 'predmet_program.id')
            ->join('predmet', 'predmet.id', '=', 'predmet_program.predmet_id')
            ->join('prijava_ispita', 'prijava_ispita.id', '=', 'polozeni_ispiti.prijava_id')
            ->join('zapisnik_o_polaganju_ispita', 'zapisnik_o_polaganju_ispita.id', '=', 'polozeni_ispiti.zapisnik_id')
            ->select(\DB::raw("polozeni_ispiti.*,
                predmet.naziv as naziv,
                prijava_ispita.rok_id as rok,
                prijava_ispita.brojPolaganja as broj,
                DATE_FORMAT(zapisnik_o_polaganju_ispita.datum , '%d.%m.%Y') as datum"))
            ->where(['predmet_program.godinaStudija_id' => 3, 'predmet_program.tipStudija_id' => 1, 'polozeni_ispiti.kandidat_id' => $id])
            ->get();

        $polozeniIspitiCetvrtaGodina = \DB::table('polozeni_ispiti')
            ->join('predmet_program', 'polozeni_ispiti.predmet_id', '=', 'predmet_program.id')
            ->join('predmet', 'predmet.id', '=', 'predmet_program.predmet_id')
            ->join('prijava_ispita', 'prijava_ispita.id', '=', 'polozeni_ispiti.prijava_id')
            ->join('zapisnik_o_polaganju_ispita', 'zapisnik_o_polaganju_ispita.id', '=', 'polozeni_ispiti.zapisnik_id')
            ->select(\DB::raw("polozeni_ispiti.*,
                predmet.naziv as naziv,
                prijava_ispita.rok_id as rok,
                prijava_ispita.brojPolaganja as broj,
                DATE_FORMAT(zapisnik_o_polaganju_ispita.datum , '%d.%m.%Y') as datum"))
            ->where(['predmet_program.godinaStudija_id' => 4, 'predmet_program.tipStudija_id' => 1, 'polozeni_ispiti.kandidat_id' => $id])
            ->get();

        $polozeniIspitiMaster = \DB::table('polozeni_ispiti')
            ->join('predmet_program', 'polozeni_ispiti.predmet_id', '=', 'predmet_program.id')
            ->join('predmet', 'predmet.id', '=', 'predmet_program.predmet_id')
            ->join('prijava_ispita', 'prijava_ispita.id', '=', 'polozeni_ispiti.prijava_id')
            ->join('zapisnik_o_polaganju_ispita', 'zapisnik_o_polaganju_ispita.id', '=', 'polozeni_ispiti.zapisnik_id')
            ->select(\DB::raw("polozeni_ispiti.*,
                predmet.naziv as naziv,
                prijava_ispita.rok_id as rok,
                prijava_ispita.brojPolaganja as broj,
                DATE_FORMAT(zapisnik_o_polaganju_ispita.datum , '%d.%m.%Y') as datum"))
            ->where(['predmet_program.godinaStudija_id' => 4, 'predmet_program.tipStudija_id' => 2, 'polozeni_ispiti.kandidat_id' => $id])
            ->get();

        return view('prijava.index', compact(
            'kandidat',
            'prijave',
            'polozeniIspitiPrvaGodina',
            'polozeniIspitiDrugaGodina',
            'polozeniIspitiTrecaGodina',
            'polozeniIspitiCetvrtaGodina',
            'polozeniIspitiMaster'));
    }

    public function svePrijaveIspitaZaPredmet($id)
    {
        $predmet = Predmet::find($id);
        $prijave = $predmet->prijaveIspita()->get();
        return view('prijava.indexPredmet', compact('predmet','prijave'));
    }

    public function createPrijavaIspitaStudent($id)
    {
        $kandidat = Kandidat::find($id);
        $brojeviIndeksa = Kandidat::where([
            'statusUpisa_id' => 1,
            'studijskiProgram_id' => $kandidat->studijskiProgram_id,
            'tipStudija_id' => $kandidat->tipStudija_id,
            'godinaStudija_id' =>  $kandidat->godinaStudija_id,
        ])->select('id','BrojIndeksa as naziv')->get();

//        $predmeti = Predmet::where([
//            'tipStudija_id' => $kandidat->tipStudija_id,
//            'studijskiProgram_id' =>  $kandidat->studijskiProgram_id,
//            'godinaStudija_id' =>  $kandidat->godinaStudija_id,
//        ])->get();

        $predmeti = PredmetProgram::where([
            'studijskiProgram_id' => $kandidat->studijskiProgram_id,
            'tipStudija_id' => $kandidat->tipStudija_id,
            //Godina je uklonjena, da bi mogao da se prijavi ispit iz bilo koje godine
            //'godinaStudija_id' =>  $kandidat->godinaStudija_id,
        ])->orderBy('semestar')->get();

        $studijskiProgram = StudijskiProgram::where(['id' => $kandidat->studijskiProgram_id])->get();
        $godinaStudija = GodinaStudija::all();
        $tipPredmeta = TipPredmeta::all();
        $tipStudija = TipStudija::all();
        $ispitniRok = AktivniIspitniRokovi::where(['indikatorAktivan' => 1])->get();
        $profesor = Profesor::all();
        //TODO check
        $profesorPredmet = ProfesorPredmet::where(['predmet_id' => $predmeti->first()->id])->select('profesor_id')->get();

        if($profesorPredmet->isEmpty()){
            $profesori = Profesor::all();
        }else{
            $ids = array_map(function(ProfesorPredmet $o) { return $o->profesor_id; }, $profesorPredmet->all());
            $profesori = Profesor::whereIn('id', $ids)->get();
        }

        $tipPrijave = TipPrijave::all();

        return view('prijava.create', compact('kandidat', 'brojeviIndeksa', 'predmeti', 'studijskiProgram', 'godinaStudija',
            'tipPredmeta', 'tipStudija', 'ispitniRok', 'profesor', 'tipPrijave'));

    }

    public function createPrijavaIspitaPredmet($id, Request $request)
    {;
        //$predmet = Predmet::find($id);
        $predmet = PredmetProgram::where([
            'predmet_id' => $id,
            'studijskiProgram_id' => $request->studijskiProgramId,
            'tipStudija_id' => $request->tipStudijaId])
            ->first();
        $kandidat = null;
        $brojeviIndeksa = Kandidat::
        where([
            'tipStudija_id' => $request->tipStudijaId,
            'studijskiProgram_id' => $request->studijskiProgramId,
            'statusUpisa_id' => 1])->
        select('id','BrojIndeksa as naziv')->get();
        $studijskiProgram = StudijskiProgram::where(['id' => $predmet->studijskiProgram_id])->get();
        $godinaStudija = GodinaStudija::all();
        $tipPredmeta = TipPredmeta::all();
        $tipStudija = TipStudija::all();
        $ispitniRok = AktivniIspitniRokovi::where(['indikatorAktivan' => 1])->get();
        $profesorPredmet = ProfesorPredmet::where(['predmet_id' => $predmet->id])->select('profesor_id')->first();
        if($profesorPredmet == null){
            $profesor = Profesor::all();
        }else{
            $profesor = Profesor::where(['id' => $profesorPredmet->profesor_id])->get();
        }
        $tipPrijave = TipPrijave::all();

        return view('prijava.create', compact('kandidat', 'brojeviIndeksa', 'predmet', 'studijskiProgram', 'godinaStudija',
            'tipPredmeta', 'tipStudija', 'ispitniRok', 'profesor', 'tipPrijave'));
    }

    public function storePrijavaIspita(Request $request)
    {
        $messages = [
            'kandidat_id.unique_with' => 'Дошло је до грешке. Проверите да ли је студент већ пријавио тражени испит у траженом року.',
        ];

        $this->validate($request, [
            'kandidat_id' => 'unique_with:prijava_ispita,predmet_id,rok_id',
        ], $messages);

        $prijava = new PrijavaIspita($request->all());
        $saved = $prijava->save();

        if($saved){
            if(!empty($request->prijava_za_predmet)){
                return redirect("/prijava/zapredmet/{$request->predmet_id}?tipStudijaId=" . $request->tipStudija_id . "&studijskiProgramId=" . $request->studijskiProgram_id);
            }else{
                return redirect("/prijava/zastudenta/{$request->kandidat_id}?tipStudijaId=" . $request->tipStudija_id . "&studijskiProgramId=" . $request->studijskiProgram_id);
            }
        }else{
            Session::flash('flash-error', 'create');
            return Redirect::back();
        }

    }

    public function deletePrijavaIspita($id, Request $request)
    {
        $prijava = PrijavaIspita::find($id);
        $kandidat = $prijava->kandidat_id;
        $predmet = $prijava->predmet_id;
        PrijavaIspita::destroy($id);

        if($request->prijava == 'predmet'){
            return redirect("/prijava/zapredmet/{$predmet}");
        }else{
            return redirect("/prijava/zastudenta/{$kandidat}");
        }
    }

    public function spisakPredmeta(Request $request)
    {
        $tipStudija = TipStudija::all();
        $studijskiProgrami = StudijskiProgram::where([
            'tipStudija_id' => $request->tipStudijaId,
            'indikatorAktivan' => 1])->get();

        $predmetProgram = PredmetProgram::where(['studijskiProgram_id' => $request->studijskiProgramId])->get();

        $predmeti = $predmetProgram;

        return view('prijava.predmeti', compact('tipStudija','studijskiProgrami','predmeti'));
    }

    public function vratiKandidataPrijava(Request $request)
    {
        $kandidat = Kandidat::find($request->id);
        $predmetProgram = PredmetProgram::where(['tipStudija_id' => $kandidat->tipStudija_id, 'studijskiProgram_id' => $kandidat->studijskiProgram_id])->get();
        $ids = array_map(function(PredmetProgram $o) { return $o->predmet_id; }, $predmetProgram->all());
        $predmeti = Predmet::find($ids);

        $stringPredmeti = "";
        foreach ($predmeti as $item) {
            $stringPredmeti .= "<option value='{$item->id}'>{$item->naziv}</option>";
        }

        return ['student' => $kandidat, 'predmeti' => $stringPredmeti];
    }

    public function vratiPredmetPrijava(Request $request)
    {
        $kandidat = Kandidat::find($request->kandidat);
        $predmetProgram = PredmetProgram::where([
            'tipStudija_id' => $kandidat->tipStudija_id,
            'studijskiProgram_id' => $kandidat->studijskiProgram_id,
            'predmet_id' => $request->id
        ])->first();
        $profesorPredmet = ProfesorPredmet::where(['predmet_id' => $request->id])->select('profesor_id')->get();

        if($profesorPredmet->isEmpty()){
            $profesori = Profesor::all();
        }else{
            $ids = array_map(function(ProfesorPredmet $o) { return $o->profesor_id; }, $profesorPredmet->all());
            $profesori = Profesor::whereIn('id', $ids)->get();
        }
        $stringProfesori = "";
        foreach ($profesori as $item) {
            $stringProfesori .= "<option value='{$item->id}'>" . $item->zvanje . " " .$item->ime . " " . $item->prezime . "</option>";
        }

        return ['tipPredmeta' => $predmetProgram->tipPredmeta_id,
            'godinaStudija' => $predmetProgram->godinaStudija_id,
            'tipStudija' => $predmetProgram->tipStudija_id,
            'profesori' => $stringProfesori];
    }

    public function upisMasterStudija(Request $request)
    {
        $result = UpisGodine::upisMasterPostojeciKandidat($request->kandidat_id,$request->StudijskiProgram);
        if($result){
            Session::flash('flash-success', 'upis');
            return redirect("/student/{$request->kandidat_id}/upis");
        }else{
            Session::flash('flash-error', 'upis');
            return Redirect::back();
        }

    }

    public function izmenaGodine($id)
    {
        $upisGodine = UpisGodine::find($id);
        $statusGodine = StatusGodine::all();
        $skolskaGodina = SkolskaGodUpisa::all();

        return view('upis.edit', compact('upisGodine', 'statusGodine', 'skolskaGodina'));
    }

    public function storeIzmenaGodine(Request $request)
    {
        $upisGodine = UpisGodine::find($request->id);
        $upisGodine->statusGodine_id = $request->statusGodine_id;
        $upisGodine->skolskaGodina_id = $request->skolskaGodina_id;

        $upisGodine->datumUpisa = (empty($request->datumUpisa) || empty($request->datumUpisa_format)) ?
            null : $request->datumUpisa;

        $upisGodine->datumPromene = (empty($request->datumPromene) || empty($request->datumPromene_format)) ?
            null : $request->datumPromene;

        $saved = $upisGodine->save();
        if(!$saved){
            Session::flash('error', 'Дошло је до грешке при чувању!');
        }
        return redirect("/student/{$upisGodine->kandidat_id}/upis");
    }

    public function zamrznutiStudenti()
    {
        $studenti = Kandidat::where(['statusUpisa_id' => 4])->get();

        return view('student.index_zamrznuti', compact('studenti'));
    }

}