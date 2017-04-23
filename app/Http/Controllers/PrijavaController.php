<?php

namespace App\Http\Controllers;

use App\AktivniIspitniRokovi;
use App\DiplomskiPolaganje;
use App\DiplomskiPrijavaOdbrane;
use App\DiplomskiPrijavaTeme;
use App\GodinaStudija;
use App\Kandidat;
use App\PolozeniIspiti;
use App\Predmet;
use App\PredmetProgram;
use App\PrijavaIspita;
use App\Profesor;
use App\ProfesorPredmet;
use App\StudijskiProgram;
use App\TipPredmeta;
use App\TipPrijave;
use App\TipStudija;
use App\ZapisnikOPolaganju_Student;
use App\ZapisnikOPolaganju_StudijskiProgram;
use App\ZapisnikOPolaganjuIspita;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\QueryException;
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

        $predmeti = Predmet::all();

        return view('prijava.spisakPredmeta', compact('tipStudija','studijskiProgrami','predmeti'));
    }

    //Sve prijave ispita za odabrani predmet
    //Predmet se bira iznad
    public function indexPrijavaIspitaPredmet($id)
    {
        $predmetProgram = PredmetProgram::where(['predmet_id' => $id])->get();

        $prijave = new Collection();

        foreach ($predmetProgram as $predmet) {
            $prijave = $prijave->merge($predmet->prijaveIspita);
        }

        $predmet = Predmet::find($id);

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
        $predmet = Predmet::find($id);

        $studijskiProgrami = PredmetProgram::where(['predmet_id' => $id])->pluck('studijskiProgram_id')->all();

        $kandidati = Kandidat::where([
            'statusUpisa_id' => 1
        ])->whereIn('studijskiProgram_id', $studijskiProgrami)->get();

        $ispitniRok = AktivniIspitniRokovi::where(['indikatorAktivan' => 1])->get();

        $profesor = Profesor::all();

        return view('prijava.createManyPredmet', compact('kandidati', 'predmet', 'studijskiProgram', 'godinaStudija',
            'tipPredmeta', 'tipStudija', 'ispitniRok', 'profesor', 'tipPrijave'));
    }

    public function storePrijavaIspitaPredmetMany(Request $request)
    {
        $errorArray = array();
        $duplicateArray = array();

        $messages = [
            'odabir.required' => 'Нисте одабрали ни једног студента за пријаву испита!',
        ];

        $this->validate($request, [
            'odabir' => 'required',
        ], $messages);

        if(isset($request->Submit2)){
            $zapisnik = new ZapisnikOPolaganjuIspita($request->all());
            $zapisnik->datum2 = $request->datum2;
            $zapisnik->save();

            $smerovi = array();
        }

        foreach ($request->odabir as $kandidatId) {

            $kandidat = Kandidat::find($kandidatId);

            $validator = PrijavaIspita::where([
                'kandidat_id' => $kandidatId,
                'rok_id' => $request->rok_id,
                'predmet_id' => $request->predmet_id
            ])->get();

            if (!$validator->isEmpty()) {
                $duplicateArray[] = $kandidat;
                continue;
            }

            $prijava = new PrijavaIspita($request->all());

            $predmetProgramZaPrijavu = PredmetProgram::where([
                'studijskiProgram_id' => $kandidat->studijskiProgram_id,
                'tipStudija_id' => $kandidat->tipStudija_id,
                'predmet_id' => $request->predmet_id
            ])->first();

            if($predmetProgramZaPrijavu != null){
                $prijava->predmet_id = $predmetProgramZaPrijavu->id;
                if(isset($request->Submit2)){
                    $zapisnik->predmet_id = $request->predmet_id;
                    $zapisnik->save();
                }
            }else{
                continue;
            }

            $prijava->brojPolaganja = 1;
            $prijava->kandidat_id = $kandidatId;
            $saved = $prijava->save();

            if(isset($request->Submit2)){
                $zapisStudent = new ZapisnikOPolaganju_Student();
                $zapisStudent->zapisnik_id = $zapisnik->id;
                $zapisStudent->prijavaIspita_id = $prijava->id;

                $zapisStudent->kandidat_id = $kandidatId;
                $zapisStudent->save();

                $kandidat = Kandidat::find($kandidatId);
                $smerovi[] = $kandidat->studijskiProgram_id;

                $programId = PredmetProgram::where([
                    'predmet_id' => $request->predmet_id,
                    'studijskiProgram_id' => $kandidat->studijskiProgram_id
                ])->first()->id;

                $polozenIspit = new PolozeniIspiti();
                $polozenIspit->indikatorAktivan = 0;
                $polozenIspit->kandidat_id = $kandidatId;
                $polozenIspit->predmet_id = $programId;
                $polozenIspit->zapisnik_id = $zapisnik->id;
                $polozenIspit->prijava_id = $prijava->id;
                $polozenIspit->save();
            }

            if(!$saved){
                $errorArray[] = Kandidat::find($kandidatId);
            }
        }

        if(isset($request->Submit2)){
            $smerovi = array_unique($smerovi);
            foreach ($smerovi as $id) {
                $zapisSmer = new ZapisnikOPolaganju_StudijskiProgram();
                $zapisSmer->zapisnik_id = $zapisnik->id;
                $zapisSmer->StudijskiProgram_id = $id;
                $zapisSmer->save();
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

        $diplomskiRadTema = DiplomskiPrijavaTeme::where([
            'kandidat_id' => $id,
            'tipStudija_id' => $kandidat->tipStudija_id
        ])->first();

        $diplomskiRadOdbrana = DiplomskiPrijavaOdbrane::where([
            'kandidat_id' => $id,
            'tipStudija_id' => $kandidat->tipStudija_id
        ])->first();

        $diplomskiRadPolaganje = DiplomskiPolaganje::where([
            'kandidat_id' => $id,
            'tipStudija_id' => $kandidat->tipStudija_id
        ])->first();

//        $priznatiIspiti = PolozeniIspiti::where(['kandidat_id' => $id])->get();
        $ispiti = PolozeniIspiti::where([
            'kandidat_id' => $id,
            'indikatorAktivan' => 1
        ])->get();

//        $polozeniIspitiPrvaGodina = \DB::table('polozeni_ispiti')
//            ->join('predmet_program', 'polozeni_ispiti.predmet_id', '=', 'predmet_program.id')
//            ->join('predmet', 'predmet.id', '=', 'predmet_program.predmet_id')
//            ->join('prijava_ispita', 'prijava_ispita.id', '=', 'polozeni_ispiti.prijava_id')
//            ->join('zapisnik_o_polaganju_ispita', 'zapisnik_o_polaganju_ispita.id', '=', 'polozeni_ispiti.zapisnik_id')
//            ->select(\DB::raw("polozeni_ispiti.*, predmet.naziv as naziv, prijava_ispita.rok_id as rok, prijava_ispita.brojPolaganja as broj, DATE_FORMAT(zapisnik_o_polaganju_ispita.datum , '%d.%m.%Y') as datum"))
//            ->where(['predmet_program.godinaStudija_id' => 1, 'predmet_program.tipStudija_id' => 1, 'polozeni_ispiti.kandidat_id' => $id])
//            ->get();

//        $polozeniIspitiPrvaGodina = PolozeniIspiti::whereHas('predmet', function ($query) {
//            $query->where([
//                'godinaStudija_id' => 1,
//                'tipStudija_id' => 1]);
//        })->where(['kandidat_id' => $id])->get();

//        $polozeniIspitiDrugaGodina = \DB::table('polozeni_ispiti')
//            ->join('predmet_program', 'polozeni_ispiti.predmet_id', '=', 'predmet_program.id')
//            ->join('predmet', 'predmet.id', '=', 'predmet_program.predmet_id')
//            ->join('prijava_ispita', 'prijava_ispita.id', '=', 'polozeni_ispiti.prijava_id')
//            ->join('zapisnik_o_polaganju_ispita', 'zapisnik_o_polaganju_ispita.id', '=', 'polozeni_ispiti.zapisnik_id')
//            ->select(\DB::raw("polozeni_ispiti.*,
//                predmet.naziv as naziv,
//                prijava_ispita.rok_id as rok,
//                prijava_ispita.brojPolaganja as broj,
//                DATE_FORMAT(zapisnik_o_polaganju_ispita.datum , '%d.%m.%Y') as datum"))
//            ->where(['predmet_program.godinaStudija_id' => 2, 'predmet_program.tipStudija_id' => 1, 'polozeni_ispiti.kandidat_id' => $id])
//            ->get();

//        $polozeniIspitiDrugaGodina = PolozeniIspiti::whereHas('predmet', function ($query) {
//            $query->where([
//                'godinaStudija_id' => 2,
//                'tipStudija_id' => 1]);
//        })->where(['kandidat_id' => $id])->get();

//        $polozeniIspitiTrecaGodina = \DB::table('polozeni_ispiti')
//            ->join('predmet_program', 'polozeni_ispiti.predmet_id', '=', 'predmet_program.id')
//            ->join('predmet', 'predmet.id', '=', 'predmet_program.predmet_id')
//            ->join('prijava_ispita', 'prijava_ispita.id', '=', 'polozeni_ispiti.prijava_id')
//            ->join('zapisnik_o_polaganju_ispita', 'zapisnik_o_polaganju_ispita.id', '=', 'polozeni_ispiti.zapisnik_id')
//            ->select(\DB::raw("polozeni_ispiti.*,
//                predmet.naziv as naziv,
//                prijava_ispita.rok_id as rok,
//                prijava_ispita.brojPolaganja as broj,
//                DATE_FORMAT(zapisnik_o_polaganju_ispita.datum , '%d.%m.%Y') as datum"))
//            ->where(['predmet_program.godinaStudija_id' => 3, 'predmet_program.tipStudija_id' => 1, 'polozeni_ispiti.kandidat_id' => $id])
//            ->get();
//
//        $polozeniIspitiCetvrtaGodina = \DB::table('polozeni_ispiti')
//            ->join('predmet_program', 'polozeni_ispiti.predmet_id', '=', 'predmet_program.id')
//            ->join('predmet', 'predmet.id', '=', 'predmet_program.predmet_id')
//            ->join('prijava_ispita', 'prijava_ispita.id', '=', 'polozeni_ispiti.prijava_id')
//            ->join('zapisnik_o_polaganju_ispita', 'zapisnik_o_polaganju_ispita.id', '=', 'polozeni_ispiti.zapisnik_id')
//            ->select(\DB::raw("polozeni_ispiti.*,
//                predmet.naziv as naziv,
//                prijava_ispita.rok_id as rok,
//                prijava_ispita.brojPolaganja as broj,
//                DATE_FORMAT(zapisnik_o_polaganju_ispita.datum , '%d.%m.%Y') as datum"))
//            ->where(['predmet_program.godinaStudija_id' => 4, 'predmet_program.tipStudija_id' => 1, 'polozeni_ispiti.kandidat_id' => $id])
//            ->get();
//
//        $polozeniIspitiMaster = \DB::table('polozeni_ispiti')
//            ->join('predmet_program', 'polozeni_ispiti.predmet_id', '=', 'predmet_program.id')
//            ->join('predmet', 'predmet.id', '=', 'predmet_program.predmet_id')
//            ->join('prijava_ispita', 'prijava_ispita.id', '=', 'polozeni_ispiti.prijava_id')
//            ->join('zapisnik_o_polaganju_ispita', 'zapisnik_o_polaganju_ispita.id', '=', 'polozeni_ispiti.zapisnik_id')
//            ->select(\DB::raw("polozeni_ispiti.*,
//                predmet.naziv as naziv,
//                prijava_ispita.rok_id as rok,
//                prijava_ispita.brojPolaganja as broj,
//                DATE_FORMAT(zapisnik_o_polaganju_ispita.datum , '%d.%m.%Y') as datum"))
//            ->where(['predmet_program.godinaStudija_id' => 4, 'predmet_program.tipStudija_id' => 2, 'polozeni_ispiti.kandidat_id' => $id])
//            ->get();

        return view('prijava.index', compact(
            'kandidat',
            'prijave',
            'diplomskiRadTema',
            'diplomskiRadOdbrana',
            'diplomskiRadPolaganje',
            'ispiti'
//            ,
//            'polozeniIspitiPrvaGodina',
//            'polozeniIspitiDrugaGodina',
//            'polozeniIspitiTrecaGodina',
//            'polozeniIspitiCetvrtaGodina',
//            'polozeniIspitiMaster',
//            'priznatiIspiti'
            ));
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
                return redirect("/prijava/zaPredmet/{$request->predmet_id}?tipStudijaId=" . $request->tipStudija_id . "&studijskiProgramId=" . $request->studijskiProgram_id);
            }else{
                return redirect("/prijava/zaStudenta/{$request->kandidat_id}?tipStudijaId=" . $request->tipStudija_id . "&studijskiProgramId=" . $request->studijskiProgram_id);
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
        $predmet = PredmetProgram::find($prijava->predmet_id)->predmet_id;

        $zapisnikStudent = ZapisnikOPolaganju_Student::where(['prijavaIspita_id' => $id])->first();
        $polozeniIspit = PolozeniIspiti::where(['prijava_id' => $id])->first();

        $zapisnikId = 0;
        if($zapisnikStudent != null){
            $zapisnikId = $zapisnikStudent->zapisnik_id;
            $zapisnikStudent->delete();
        }

        if($polozeniIspit != null){
            $polozeniIspit->delete();
        }

        PrijavaIspita::destroy($id);

        $zapisnikProvera = ZapisnikOPolaganju_Student::where([
            'zapisnik_id' => $zapisnikId
        ])->get();

        if($zapisnikId != 0 && $zapisnikProvera->count() == 0){
            ZapisnikOPolaganjuIspita::destroy($zapisnikId);
        }

        if($request->prijava == 'predmet'){
            return redirect("/prijava/zaPredmet/{$predmet}");
        }else{
            return redirect("/prijava/zaStudenta/{$kandidat}");
        }
    }

    //AJAX call
    public function vratiKandidataPrijava(Request $request)
    {
        $kandidat = Kandidat::find($request->id);
        $predmetProgram = PredmetProgram::where(['tipStudija_id' => $kandidat->tipStudija_id, 'studijskiProgram_id' => $kandidat->studijskiProgram_id])->get();

        $stringPredmeti = "";
        foreach ($predmetProgram as $item) {
            $stringPredmeti .= "<option value='{$item->id}'>{$item->predmet->naziv}</option>";
        }

        return ['student' => $kandidat, 'predmeti' => $stringPredmeti];
    }

    //AJAX call
    public function vratiPredmetPrijava(Request $request)
    {
//        $kandidat = Kandidat::find($request->kandidat);
        $predmetProgram = PredmetProgram::find($request->id);
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

    //AJAX call
    public function vratiKandidataPoBroju(Request $request)
    {
        $kandidat = Kandidat::find($request->id);
        return "<tr>" .
        "<td><input type='checkbox' name='odabir[$kandidat->id]' value='$kandidat->id' checked></td>" .
        "<td>{$kandidat->brojIndeksa}</td>" .
        "<td>" . $kandidat->imeKandidata . " " . $kandidat->prezimeKandidata . "</td>" .
        "<td>{$kandidat->godinaStudija->nazivRimski}</td></tr>";
    }

    /// ====================================================================================================================
    //
    //  DIPLOMSKI RAD
    //
    /// ====================================================================================================================

    ///
    /// TEMA
    ///
    public function diplomskiTema(Kandidat $kandidat)
    {
        $profesor = Profesor::all();
        $predmeti = PredmetProgram::where([
            'tipStudija_id' => $kandidat->tipStudija_id,
            'studijskiProgram_id' => $kandidat->studijskiProgram_id
        ])->orderBy('semestar', 'asc')->get();
        return view('prijava.diplomskiTema', compact('kandidat', 'profesor', 'predmeti'));
    }

    public function storeDiplomskiTema(Request $request)
    {
        $messages = [
            'kandidat_id.unique_with' => 'Дошло је до грешке. Проверите да ли је студент већ пријавио тему завршног рада.',
        ];

        $this->validate($request, [
            'kandidat_id' => 'unique_with:diplomski_prijava_teme,tipStudija_id',
        ], $messages);

        $prijavaTeme = new DiplomskiPrijavaTeme($request->all());
        $prijavaTeme->save();

        return redirect('/prijava/zaStudenta/' . $request->kandidat_id);
    }

    public function editdiplomskiTema(Kandidat $kandidat)
    {
        $profesor = Profesor::all();
        $predmeti = PredmetProgram::where([
            'tipStudija_id' => $kandidat->tipStudija_id,
            'studijskiProgram_id' => $kandidat->studijskiProgram_id
        ])->orderBy('semestar', 'asc')->get();
        $diplomskiRadTema = DiplomskiPrijavaTeme::where([
            'kandidat_id' => $kandidat->id,
            'tipStudija_id' => $kandidat->tipStudija_id
        ])->first();
        return view('prijava.editDiplomskiTema', compact('kandidat', 'profesor', 'predmeti', 'diplomskiRadTema'));
    }

    public function updateDiplomskiTema(Request $request)
    {
        $prijavaTeme = DiplomskiPrijavaTeme::find($request->diplomskiTema_id);
        $prijavaTeme->fill($request->all());
        if(!isset($request->indikatorOdobreno)){
            $prijavaTeme->indikatorOdobreno = 0;
        }else{
            $prijavaTeme->indikatorOdobreno = 1;
        }
        $prijavaTeme->save();

        return redirect('/prijava/zaStudenta/' . $request->kandidat_id);
    }

    public function deleteDiplomskiTema(Kandidat $kandidat)
    {
        $prijavaTeme = DiplomskiPrijavaTeme::where([
            'kandidat_id' => $kandidat->id,
            'tipStudija_id' => $kandidat->tipStudija_id
        ])->first();

        $prijavaTeme->delete();

        return redirect('/prijava/zaStudenta/' . $kandidat->id);
    }


    ///
    /// ODBRANA
    ///
    public function diplomskiOdbrana(Kandidat $kandidat)
    {
        $profesor = Profesor::all();
        $predmeti = PredmetProgram::where([
            'tipStudija_id' => $kandidat->tipStudija_id,
            'studijskiProgram_id' => $kandidat->studijskiProgram_id
        ])->orderBy('semestar', 'asc')->get();
        $diplomskiRadTema = DiplomskiPrijavaTeme::where([
            'kandidat_id' => $kandidat->id,
            'tipStudija_id' => $kandidat->tipStudija_id
        ])->first();
        if($diplomskiRadTema == null){return "Не постоји пријава теме дипломског рада!";}
        return view('prijava.odbrana.diplomskiOdbrana', compact('kandidat', 'profesor', 'predmeti', 'diplomskiRadTema'));
    }

    public function storeDiplomskiOdbrana(Request $request)
    {
        $messages = [
            'kandidat_id.unique_with' => 'Дошло је до грешке. Проверите да ли је студент већ пријавио одбрану завршног рада.',
        ];

        $this->validate($request, [
            'kandidat_id' => 'unique_with:diplomski_prijava_odbrane,tipStudija_id',
        ], $messages);

        $prijavaOdbrane = new DiplomskiPrijavaOdbrane($request->all());
        $prijavaOdbrane->save();

        return redirect('/prijava/zaStudenta/' . $request->kandidat_id);
    }

    public function editDiplomskiOdbrana(Kandidat $kandidat)
    {
        $profesor = Profesor::all();
        $predmeti = PredmetProgram::where([
            'tipStudija_id' => $kandidat->tipStudija_id,
            'studijskiProgram_id' => $kandidat->studijskiProgram_id
        ])->orderBy('semestar', 'asc')->get();
        $diplomskiRadTema = DiplomskiPrijavaTeme::where([
            'kandidat_id' => $kandidat->id,
            'tipStudija_id' => $kandidat->tipStudija_id
        ])->first();
        $diplomskiRadOdbrana = DiplomskiPrijavaOdbrane::where([
            'kandidat_id' => $kandidat->id,
            'tipStudija_id' => $kandidat->tipStudija_id
        ])->first();

        return view('prijava.odbrana.editDiplomskiOdbrana',
            compact('kandidat', 'profesor', 'predmeti', 'diplomskiRadTema', 'diplomskiRadOdbrana'));
    }

    public function updateDiplomskiOdbrana(Request $request)
    {
        $prijavaOdbrane = DiplomskiPrijavaOdbrane::find($request->diplomskiRadOdbrana_id);
        $prijavaOdbrane->fill($request->all());
        if(!isset($request->indikatorOdobreno)){
            $prijavaOdbrane->indikatorOdobreno = 0;
        }else{
            $prijavaOdbrane->indikatorOdobreno = 1;
        }
        $prijavaOdbrane->save();

        return redirect('/prijava/zaStudenta/' . $request->kandidat_id);
    }

    public function deleteDiplomskiOdbrana(Kandidat $kandidat)
    {
        $prijavaOdbrane = DiplomskiPrijavaOdbrane::where([
            'kandidat_id' => $kandidat->id,
            'tipStudija_id' => $kandidat->tipStudija_id
        ])->first();

        $prijavaOdbrane->delete();

        return redirect('/prijava/zaStudenta/' . $kandidat->id);
    }


    ///
    /// POLAGANJE
    ///
    public function diplomskiPolaganje(Kandidat $kandidat)
    {
        $profesor = Profesor::all();
        $predmeti = PredmetProgram::where([
            'tipStudija_id' => $kandidat->tipStudija_id,
            'studijskiProgram_id' => $kandidat->studijskiProgram_id
        ])->orderBy('semestar', 'asc')->get();
        $diplomskiRadTema = DiplomskiPrijavaTeme::where([
            'kandidat_id' => $kandidat->id,
            'tipStudija_id' => $kandidat->tipStudija_id
        ])->first();
        $ispitniRok = AktivniIspitniRokovi::where(['indikatorAktivan' => 1])->get();

        return view('prijava.polaganje.diplomskiPolaganje', compact('kandidat', 'profesor', 'predmeti',
            'diplomskiRadTema', 'ispitniRok'));
    }

    public function storeDiplomskiPolaganje(Request $request)
    {
        $messages = [
            'kandidat_id.unique_with' => 'Дошло је до грешке. Проверите да ли је студент већ пријавио полагање завршног рада.',
        ];

        $this->validate($request, [
            'kandidat_id' => 'unique_with:diplomski_polaganje,tipStudija_id',
        ], $messages);

        $prijavaPolaganje = new DiplomskiPolaganje($request->all());
        $prijavaPolaganje->save();

        return redirect('/prijava/zaStudenta/' . $request->kandidat_id);
    }

    public function editDiplomskiPolaganje(Kandidat $kandidat)
    {
        $profesor = Profesor::all();
        $predmeti = PredmetProgram::where([
            'tipStudija_id' => $kandidat->tipStudija_id,
            'studijskiProgram_id' => $kandidat->studijskiProgram_id
        ])->orderBy('semestar', 'asc')->get();
        $diplomskiRadTema = DiplomskiPrijavaTeme::where([
            'kandidat_id' => $kandidat->id,
            'tipStudija_id' => $kandidat->tipStudija_id
        ])->first();
        $diplomskiRadPolaganje = DiplomskiPolaganje::where([
            'kandidat_id' => $kandidat->id,
            'tipStudija_id' => $kandidat->tipStudija_id
        ])->first();
        $ispitniRok = AktivniIspitniRokovi::where(['indikatorAktivan' => 1])->get();


        return view('prijava.polaganje.editDiplomskiPolaganje',
            compact('kandidat', 'profesor', 'predmeti', 'diplomskiRadTema', 'diplomskiRadPolaganje', 'ispitniRok'));
    }

    public function updateDiplomskiPolaganje(Request $request)
    {
        $prijavaPolaganje = DiplomskiPolaganje::find($request->polaganje_id);
        $prijavaPolaganje->fill($request->all());

        $prijavaPolaganje->save();

        return redirect('/prijava/zaStudenta/' . $request->kandidat_id);
    }

    public function deleteDiplomskiPolaganje(Kandidat $kandidat)
    {
        $prijavaOdbrane = DiplomskiPolaganje::where([
            'kandidat_id' => $kandidat->id,
            'tipStudija_id' => $kandidat->tipStudija_id
        ])->first();

        $prijavaOdbrane->delete();

        return redirect('/prijava/zaStudenta/' . $kandidat->id);
    }


    /// ====================================================================================================================
    //
    //  Privremeni deo
    //
    /// ====================================================================================================================

    public function unosPrivremeni(Kandidat $kandidat)
    {
        $ispiti = PredmetProgram::all();
        $polozeniIspiti = PolozeniIspiti::where(['kandidat_id' => $kandidat->id])->get();
        return view('upis.unosPrivremeni', compact('kandidat', 'ispiti', 'polozeniIspiti'));
    }

    public function vratiIspitPoId(Request $request)
    {
        $predmet = PredmetProgram::find($request->id);

        return "<tr>" .
        "<td><input type='checkbox' name='odabir[$predmet->id]' value='$predmet->id' checked></td>" .
        "<td>{$predmet->predmet->naziv}</td>" .
        "<td><select class='form-control konacnaOcena' data-index='$predmet->id' name='konacnaOcena[$predmet->id]'>" .
        "<option value='0'></option><option value='5'>5</option><option value='6'>6</option><option value='7'>7</option><option value='8'>8</option><option value='9'>9</option><option value='10'>10</option></select></td></tr>";
    }

    public function dodajPolozeneIspite(Request $request)
    {
        //dd($request->all());
        $kandidat = $request->kandidat_id;
        $ispiti = $request->odabir;

        foreach ($ispiti as $index => $ispit) {
            $novIspit = new PolozeniIspiti();
            $novIspit->prijava_id = 0;
            $novIspit->zapisnik_id = 0;
            $novIspit->kandidat_id = $kandidat;
            $novIspit->predmet_id = $ispit;
            $novIspit->ocenaPismeni = 0;
            $novIspit->ocenaUsmeni = 0;
            $novIspit->konacnaOcena = $request->konacnaOcena[$index];
            $novIspit->brojBodova = 0;
            $novIspit->statusIspita = 1;
            $novIspit->odluka_id = 0;
            $novIspit->indikatorAktivan = 1;
            $novIspit->save();
        }

        return Redirect::back();

    }
}
