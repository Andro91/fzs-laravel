<?php

namespace App\Http\Controllers;

use App\AktivniIspitniRokovi;
use App\GodinaStudija;
use App\Kandidat;
use App\PredmetProgram;
use App\PrijavaIspita;
use App\Profesor;
use App\ProfesorPredmet;
use App\StudijskiProgram;
use App\TipPredmeta;
use App\TipPrijave;
use App\TipStudija;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

use App\Http\Requests;

class PrijavaController extends Controller
{

/// ====================================================================================================================
//
//  Deo za prijavu ispita sa strane predmeta
//
/// ====================================================================================================================

    //Spisak svih predmeta
    public function spisakPredmeta(Request $request)
    {
        $tipStudija = TipStudija::all();
        $studijskiProgrami = StudijskiProgram::where([
            'tipStudija_id' => $request->tipStudijaId,
            'indikatorAktivan' => 1])->get();

        $predmetProgram = PredmetProgram::where(['studijskiProgram_id' => $request->studijskiProgramId])->get();

        $predmeti = $predmetProgram;

        return view('prijava.spisakPredmeta', compact('tipStudija','studijskiProgrami','predmeti'));
    }

    //Sve prijave ispita za odabrani predmet
    //Predmet se bira iznad
    public function indexPrijavaIspitaPredmet($id)
    {
        $predmet = PredmetProgram::find($id);
        $prijave = $predmet->prijaveIspita()->get();
        return view('prijava.indexPredmet', compact('predmet','prijave'));
    }

    //
    public function createPrijavaIspitaPredmet($id)
    {
        $predmet = PredmetProgram::find($id);
        $kandidat = null;
        $brojeviIndeksa = Kandidat::where([
            'tipStudija_id' => $predmet->tipStudija_id,
            'studijskiProgram_id' => $predmet->studijskiProgram_id,
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

    public function createPrijavaIspitaPredmetMany($id)
    {
        $predmet = PredmetProgram::find($id);
        $kandidati = Kandidat::where([
            'tipStudija_id' => $predmet->tipStudija_id,
            'studijskiProgram_id' => $predmet->studijskiProgram_id,
            'statusUpisa_id' => 1])->get();
        $studijskiProgram = StudijskiProgram::where(['id' => $predmet->studijskiProgram_id])->get();
        $godinaStudija = GodinaStudija::all();
        $tipPredmeta = TipPredmeta::all();
        $tipStudija = TipStudija::all();
        $ispitniRok = AktivniIspitniRokovi::where(['indikatorAktivan' => 1])->get();

        $profesorPredmet = ProfesorPredmet::where(['predmet_id' => $predmet->id])->select('profesor_id')->get();

        if($profesorPredmet->isEmpty()){
            $profesor = Profesor::all();
        }else{
            $ids = array_map(function(ProfesorPredmet $o) { return $o->profesor_id; }, $profesorPredmet->all());
            $profesor = Profesor::whereIn('id', $ids)->get();
        }

        return view('prijava.createManyPredmet', compact('kandidati', 'predmet', 'studijskiProgram', 'godinaStudija',
            'tipPredmeta', 'tipStudija', 'ispitniRok', 'profesor', 'tipPrijave'));
    }

    public function storePrijavaIspitaPredmetMany(Request $request)
    {
        $errorArray = array();
        $duplicateArray = array();
        foreach ($request->odabir as $kandidatId) {

            $validator = PrijavaIspita::where([
                'kandidat_id' => $kandidatId,
                'predmet_id' => $request->predmet_id,
                'rok_id' => $request->rok_id,
            ])->get();

            if (!$validator->isEmpty()) {
                $duplicateArray[] = Kandidat::find($kandidatId);
                continue;
            }

            $prijava = new PrijavaIspita($request->all());
            $prijava->kandidat_id = $kandidatId;
            $saved = $prijava->save();

            if(!$saved){
                $errorArray[] = Kandidat::find($kandidatId);
            }
        }

        return view('prijava.rezultat', compact('errorArray', 'duplicateArray'))->with('predmetId', $request->predmet_id);
    }


/// ====================================================================================================================
//
//  Deo za prijavu ispita sa strane studenta
//
/// ====================================================================================================================

    //Stranica Status studenta
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

    public function createPrijavaIspitaStudent($id)
    {
        $kandidat = Kandidat::find($id);
        $brojeviIndeksa = Kandidat::where([
            'statusUpisa_id' => 1,
            'studijskiProgram_id' => $kandidat->studijskiProgram_id,
            'tipStudija_id' => $kandidat->tipStudija_id,
            'godinaStudija_id' => $kandidat->godinaStudija_id,
        ])->select('id','BrojIndeksa as naziv')->get();

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
        if($predmeti->isEmpty()){
            $profesori = Profesor::all();
        }else{
            $profesorPredmet = ProfesorPredmet::where(['predmet_id' => $predmeti->first()->id])->select('profesor_id')->get();
            $ids = array_map(function(ProfesorPredmet $o) { return $o->profesor_id; }, $profesorPredmet->all());
            $profesori = Profesor::whereIn('id', $ids)->get();
        }

        $tipPrijave = TipPrijave::all();

        return view('prijava.create', compact('kandidat', 'brojeviIndeksa', 'predmeti', 'studijskiProgram', 'godinaStudija',
            'tipPredmeta', 'tipStudija', 'ispitniRok', 'profesor', 'tipPrijave', 'profesori'));

    }

/// ====================================================================================================================
//
//  Deo za čuvanje i brisanje prijave ispita (Univerzalno)
//
/// ====================================================================================================================

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

    //AJAX call
    public function vratiKandidataPrijava(Request $request)
    {
        $kandidat = Kandidat::find($request->id);
        $predmetProgram = PredmetProgram::where(['tipStudija_id' => $kandidat->tipStudija_id, 'studijskiProgram_id' => $kandidat->studijskiProgram_id])->get();

//        $ids = array_map(function(PredmetProgram $o) { return $o->predmet_id; }, $predmetProgram->all());
//        $predmeti = Predmet::find($ids);

        $stringPredmeti = "";
        foreach ($predmetProgram as $item) {
            $stringPredmeti .= "<option value='{$item->id}'>{$item->predmet->naziv}</option>";
        }

        return ['student' => $kandidat, 'predmeti' => $stringPredmeti];
    }

    //AJAX call
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
}
