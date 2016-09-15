<?php

namespace App\Http\Controllers;

use App\AktivniIspitniRokovi;
use App\GodinaStudija;
use App\IspitniRok;
use App\Predmet;
use App\PredmetProgram;
use App\PrijavaIspita;
use App\Profesor;
use App\ProfesorPredmet;
use App\StudijskiProgram;
use App\TipPredmeta;
use App\TipPrijave;
use App\TipStudija;
use App\UpisGodine;
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

    public function upisStudenta($id)
    {
        $kandidat = Kandidat::find($id);
        $upisaneGodine = UpisGodine::where(['kandidat_id' => $id])->orderBy('godina', 'ASC')->get();

        return view('upis.index')
            ->with('upisaneGodine', $upisaneGodine)
            ->with('kandidat', $kandidat);
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

        $upisaneGodine = UpisGodine::where(['kandidat_id' => $id, 'godina' => $request->godina, 'pokusaj' => $request->pokusaj])->first();
        $upisaneGodine->upisan = 1;
        $upisaneGodine->save();

        $kandidat = Kandidat::find($id);

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

        $poslednjiPokusaj = UpisGodine::where(['kandidat_id' => $id, 'godina' => $request->godina])->max('pokusaj');

        $upis = new UpisGodine();
        $upis->kandidat_id = $id;
        $upis->godina = $request->godina;
        $upis->pokusaj = $poslednjiPokusaj + 1;
        $upis->skolarina = 0;
        $upis->upisan = 0;
        $upis->save();

        $kandidat = Kandidat::find($id);

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
        $upis->upisan = 0;
        $upis->save();

        return redirect("student/{$id}/upis");
    }

    public function promeniStatus($id, $statusId)
    {
        $kandidat = Kandidat::find($id);
        $kandidat->statusUpisa_id = $statusId;
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

            UpisGodine::upisiGodinu($kandidatId, $godina);
        }
        return redirect('/student/index/1');
    }

    public function svePrijaveIspitaZaStudenta($id)
    {
        $kandidat = Kandidat::find($id);
        $prijave = $kandidat->prijaveIspita()->get();
        return view('prijava.index', compact('kandidat','prijave'));
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
            'godinaStudija_id' =>  $kandidat->godinaStudija_id,
        ])->get();

        $studijskiProgram = StudijskiProgram::where(['id' => $kandidat->studijskiProgram_id])->get();
        $godinaStudija = GodinaStudija::all();
        $tipPredmeta = TipPredmeta::all();
        $tipStudija = TipStudija::all();
        $ispitniRok = AktivniIspitniRokovi::where(['indikatorAktivan' => 1])->get();
        $profesor = Profesor::all();
        $tipPrijave = TipPrijave::all();

        return view('prijava.create', compact('kandidat', 'brojeviIndeksa', 'predmeti', 'studijskiProgram', 'godinaStudija',
            'tipPredmeta', 'tipStudija', 'ispitniRok', 'profesor', 'tipPrijave'));

    }

    public function createPrijavaIspitaPredmet($id, Request $request)
    {
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
        $studijskiProgrami = StudijskiProgram::where(['tipStudija_id' => $request->tipStudijaId, 'indikatorAktivan' => 1])->get();
//        $predmetProgram = PredmetProgram::where(['studijskiProgram_id' => $request->studijskiProgramId])->select('predmet_id')->get();
        $predmetProgram = PredmetProgram::where(['studijskiProgram_id' => $request->studijskiProgramId])->get();
//        $ids = array_map(function(PredmetProgram $o) { return $o->predmet_id; }, $predmetProgram->all());
        //dd($ids);
//        $predmeti = Predmet::find($ids);
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
        $profesorPredmet = ProfesorPredmet::where(['predmet_id' => $request->id])->select('profesor_id')->first();
        if($profesorPredmet == null){
            $profesori = Profesor::all();
        }else{
            $profesori = Profesor::where(['id' => $profesorPredmet->profesor_id])->get();
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

}
