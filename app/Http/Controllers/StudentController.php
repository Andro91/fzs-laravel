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
use Illuminate\Validation\Validator;

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
        if($statusId == 4){
            $aktivnaGodina = UpisGodine::where([
                'kandidat_id' => $id,
                'statusGodine_id' => 1
            ])->first();
            $aktivnaGodina->statusGodine_id = 6;
            $aktivnaGodina->datumPromene = Carbon::now();
            $aktivnaGodina->save();
        }else if($statusId == 1){
            $aktivnaGodina = UpisGodine::where([
                'kandidat_id' => $id,
                'statusGodine_id' => 6
            ])->first();
            $aktivnaGodina->datumPromene = Carbon::now();
            $aktivnaGodina->statusGodine_id = 1;
            $aktivnaGodina->save();
        }
        $kandidat->save();
        return redirect("student/index/{$kandidat->tipStudija_id}?godina={$kandidat->godinaStudija_id}&studijskiProgramId={$kandidat->studijskiProgram_id}");
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
        $statusZamrzao = \Config::get('constants.statusi.zamrzao');
        $studenti = Kandidat::where(['statusUpisa_id' => $statusZamrzao])->get();

        return view('student.index_zamrznuti', compact('studenti'));
    }

    public function diplomiraniStudenti(Request $request)
    {
        $statusDiplomirao = \Config::get('constants.statusi.diplomirao');
        $tipStudija = TipStudija::all();
        $studijskiProgrami = StudijskiProgram::where([
            'tipStudija_id' => $request->tipStudijaId,
            'indikatorAktivan' => 1])->get();

        $studenti = Kandidat::where([
            'tipStudija_id' => $request->tipStudijaId,
            'studijskiProgram_id' => $request->studijskiProgramId,
            'statusUpisa_id' => $statusDiplomirao
        ])->get();

        return view('student.index_diplomirani', compact('studenti','tipStudija','studijskiProgrami'));
    }

}