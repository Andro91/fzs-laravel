<?php

namespace App\Http\Controllers;

use App\AktivniIpsitniRokovi;
use App\GodinaStudija;
use App\IspitniRok;
use App\Predmet;
use App\PrijavaIspita;
use App\Profesor;
use App\ProfesorPredmet;
use App\StudijskiProgram;
use App\TipPredmeta;
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

            $studenti = Kandidat::where(['tipStudija_id' => 1, 'upisan' => 1, 'godinaStudija_id' =>  $godinaStudija, 'studijskiProgram_id' => $studijskiProgramId])->get();
            $studijskiProgrami = StudijskiProgram::where(['tipStudija_id' => 1])->get();

            return view("student.indeks")
                ->with('studenti', $studenti)->with('tipStudija', 1)
                ->with('studijskiProgrami',$studijskiProgrami);

        }else if($tipStudijaId == 2){

            $studenti = Kandidat::where(['tipStudija_id' => 2, 'upisan' => 1, 'studijskiProgram_id' => $studijskiProgramId])->get();
            $studijskiProgrami = StudijskiProgram::where(['tipStudija_id' => 2])->get();

            return view("student.index_master")->with('studenti', $studenti)
                ->with('tipStudija', 2)
                ->with('studijskiProgrami',$studijskiProgrami);
        }

        return "Дошло је до грешке. Молимо ва�? покушајте поново.";
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
        $upisaneGodine = UpisGodine::where(['kandidat_id' => $id, 'godina' => $request->godina])->first();
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

        $upisaneGodine = UpisGodine::where(['kandidat_id' => $id, 'godina' => $request->godina])->first();
        $upisaneGodine->upisan = 1;
        $upisaneGodine->save();

        $kandidat = Kandidat::find($id);

        $kandidat->godinaStudija_id = $request->godina;

        $kandidat->save();

        return redirect("student/{$id}/upis");
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

    public function prijavaIspita($id)
    {
        $kandidat = Kandidat::find($id);
        $prijave = $kandidat->prijaveIspita()
            ->join('predmet', 'prijava_ispitas.predmet_id', '=', 'predmet.id')
            ->join('ispitni_rok', 'prijava_ispitas.rok_id', '=', 'ispitni_rok.id')
            ->select('predmet.naziv as predmet', 'ispitni_rok.naziv as rok','brojPolaganja', 'datum')->get();
        return view('prijava.index', compact('kandidat','prijave'));
    }

    public function svePrijaveIspitaZaPredmet($id)
    {
        $predmet = Predmet::find($id);
        $prijave = $predmet->prijaveIspita()->get();
//            ->join('predmet', 'prijava_ispitas.predmet_id', '=', 'predmet.id')
//            ->join('ispitni_rok', 'prijava_ispitas.rok_id', '=', 'ispitni_rok.id')
//            ->select('predmet.naziv as predmet', 'ispitni_rok.naziv as rok','brojPolaganja', 'datum')->get();
//        dd($predmet->prijaveIspita()->get());
        return view('prijava.indexPredmet', compact('predmet','prijave'));
    }

    public function createPrijavaIspita($id)
    {
        $kandidat = Kandidat::find($id);
        $predmeti = Predmet::where([
            'tipStudija_id' => $kandidat->tipStudija_id,
            'studijskiProgram_id' =>  $kandidat->studijskiProgram_id,
            'godinaStudija_id' =>  $kandidat->godinaStudija_id,
        ])->get();
        $studijskiProgram = StudijskiProgram::where(['id' => $kandidat->studijskiProgram_id])->get();
        $godinaStudija = GodinaStudija::all();
        $tipPredmeta = TipPredmeta::all();
        $tipStudija = TipStudija::all();
        //$ispitniRok = IspitniRok::all();
        $ispitniRok = AktivniIpsitniRokovi::where(['indikatorAktivan' => 1])->get();
        $profesor = Profesor::all();

        return view('prijava.create', compact('kandidat', 'predmeti', 'studijskiProgram', 'godinaStudija', 'tipPredmeta', 'tipStudija', 'ispitniRok', 'profesor'));

    }

    public function storePrijavaIspita(Request $request)
    {
        $prijava = new PrijavaIspita($request->all());
        $saved = $prijava->save();

        if($saved){
            if(!empty($request->prijava_za_predmet)){
                return redirect("/prijava/zapredmet/{$request->predmet_id}");
            }else{
                return redirect("/prijava/{$request->kandidat_id}");
            }
        }else{
            Session::flash('flash-error', 'create');
            return Redirect::back();
        }

    }


    public function prijavaIspitaPredmet(Request $request)
    {
        $tipStudija = TipStudija::all();
        $studijskiProgrami = StudijskiProgram::where(['tipStudija_id' => $request->tipStudijaId, 'indikatorAktivan' => 1])->get();
        $predmeti = Predmet::where(['studijskiProgram_id' => $request->studijskiProgramId])->get();
        return view('prijava.predmeti', compact('tipStudija','studijskiProgrami','predmeti'));
    }

    public function prijavaIspitaZaPredmet($id)
    {
        $kandidat = null;
        $brojeviIndeksa = Kandidat::select('id','BrojIndeksa as naziv')->get();
        $predmet = Predmet::find($id);
        $studijskiProgram = StudijskiProgram::where(['id' => $predmet->studijskiProgram_id])->get();
        $godinaStudija = GodinaStudija::all();
        $tipPredmeta = TipPredmeta::find($predmet->tipPredmeta_id);
        $tipStudija = TipStudija::all();
        $ispitniRok = AktivniIpsitniRokovi::where(['indikatorAktivan' => 1])->get();
        $profesorPredmet = ProfesorPredmet::where(['predmet_id' => $predmet->id])->select('profesor_id')->first()->profesor_id;
        $profesor = Profesor::where(['id' => $profesorPredmet])->get();
        return view('prijava.create', compact('kandidat', 'predmet', 'studijskiProgram', 'godinaStudija', 'tipPredmeta', 'tipStudija', 'ispitniRok', 'profesor', 'brojeviIndeksa'));
    }

    public function vratiKandidataPrijava(Request $request)
    {
        return Kandidat::find($request->id);
    }

    public function vratiPredmetPrijava(Request $request)
    {
        return Kandidat::find($request->id);
    }

}
