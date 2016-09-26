<?php

namespace App\Http\Controllers;

use App\Diploma;
use App\DiplomskiRad;
use App\GodinaStudija;
use App\Kandidat;
use App\PolozeniIspiti;
use App\Predmet;
use App\Profesor;
use App\SkolskaGodUpisa;
use App\StudijskiProgram;
use Illuminate\Http\Request;
use App\Region;
use Illuminate\Support\Facades\Redirect;
use View;
use PDF;
use Carbon\Carbon;
use App\AktivniIspitniRokovi;
use App\PrijavaIspita;
use App\StatusIspita;
use App\ZapisnikOPolaganju_Student;
use App\PredmetProgram;
use App\ZapisnikOPolaganjuIspita;

use DateTime;

use App\Http\Requests;

class IzvestajiController extends Controller
{
    public function spisakPoSmerovima()
    {
        //$region->delete();
        try {
            $kandidat = Kandidat::where(['statusUpisa_id' => 3])->get();
            $picks = Kandidat::where(['statusUpisa_id' => 3])->distinct('studijskiProgram_id', 'godinaStudija_id')->select('studijskiProgram_id')->groupBy('studijskiProgram_id', 'godinaStudija_id')->get();
            $picks2 = Kandidat::where(['statusUpisa_id' => 3])->distinct('godinaStudija_id')->select('godinaStudija_id')->groupBy('godinaStudija_id')->get();
            $picks3 = Kandidat::where(['statusUpisa_id' => 3])->distinct('studijskiProgram_id', 'godinaStudija_id')->select('studijskiProgram_id', 'godinaStudija_id')->groupBy('studijskiProgram_id', 'godinaStudija_id')->get();
            //return $picks3;
            $uslov = array();
            $uslov2 = array();
            foreach($picks as $item)
            {
                $uslov[] = $item->studijskiProgram_id;
            }
            foreach($picks2 as $item)
            {
                $uslov2[] = $item->godinaStudija_id;
            }
            //return $uslov;
            $program = StudijskiProgram::whereIn('id', $uslov)->get();
            //return $program;
            $godina = GodinaStudija::whereIn('id', $uslov2)->get();
        } catch (\Illuminate\Database\QueryException $e) {
            dd('Дошло је до непредвиђене грешке.' . $e->getMessage());
        }

        //$kandidat = Kandidat::where('studijskiProgram_id', 1)->get();

        //$brojPrograma = StudijskiProgram::all()->count();
        //var $i=0;
        //$spisak = new \Illuminate\Database\Eloquent\Collection;
        /*foreach($program as $item)
        {
            $kandidat = Kandidat::where('studijskiProgram_id', $item->id)->get();
            $spisak->add($kandidat);
        }*/
        /*for($i=0;i<$brojPrograma;$i++)
        {

        }*/
        $view = View::make('izvestaji.test')->with('studijskiProgram', $program)->with('kandidat', $kandidat)->with('godina', $godina)->with('uslov', $picks3);
        //$ime = $region->naziv;
        //$view = View::make('sifarnici.test', ['ime' => $region->naziv]);
//return $view;
        $contents = $view->render();
        PDF::SetTitle('Списак кандидата по модулима');
        PDF::AddPage();
        PDF::SetFont('freeserif', '', 12);
        PDF::WriteHtml($contents);
        PDF::Output('Spisak.pdf');

        //return back();
    }

    public function spisakPoSmerovimaAktivni()
    {
        //$region->delete();
        try {
            $kandidat = Kandidat::where(['statusUpisa_id' => 1])->get();
            $program = StudijskiProgram::all();
        } catch (\Illuminate\Database\QueryException $e) {
            dd('Дошло је до непредвиђене грешке.' . $e->getMessage());
        }

        $view = View::make('izvestaji.spisakSvihStudenata')->with('studijskiProgram', $program)->with('kandidat', $kandidat);

        $contents = $view->render();
        PDF::SetTitle('Списак студената по модулима');
        PDF::AddPage();
        PDF::SetFont('freeserif', '', 12);
        PDF::WriteHtml($contents);
        PDF::Output('Spisak.pdf');
    }

    public function spisakZaSmer(Request $request)
    {
        try {
            //$kandidat = Kandidat::all();
            //$program = StudijskiProgram::all();
            $studenti = Kandidat::where(['statusUpisa_id' => 1, 'godinaStudija_id' => $request->godina, 'studijskiProgram_id' => $request->program])->get();
            if ($studenti->first()) {
                $program = $studenti->first()->program->naziv;
            } else {
                $program = '';
            }
        } catch (\Illuminate\Database\QueryException $e) {
            dd('Дошло је до непредвиђене грешке.' . $e->getMessage());
        }

        //return $studenti;

        $view = View::make('izvestaji.spisakSmer')->with('studenti', $studenti)->with('program', $program);

        $contents = $view->render();
        PDF::SetTitle('Списак кандидата');
        PDF::AddPage();
        PDF::SetFont('freeserif', '', 12);
        PDF::WriteHtml($contents);
        PDF::Output('Spisak.pdf');
    }

    public function spiskoviStudenti()
    {
        try {
            $program = StudijskiProgram::all();
            $godina = GodinaStudija::all();
            $predmeti = Predmet::all();
            $programPlan = $program;
            $godinaPlan = $godina;
            $skolskaGodina = SkolskaGodUpisa::all();
        } catch (\Illuminate\Database\QueryException $e) {
            dd('Дошло је до непредвиђене грешке.' . $e->getMessage());
        }

        return view('izvestaji.spiskoviStudenti', compact('program', 'godina', 'predmeti', 'programPlan', 'godinaPlan', 'skolskaGodina'));
    }

    public function potvrdeStudent(Kandidat $student)
    {
        try {
            $program = StudijskiProgram::all();
            $godina = GodinaStudija::all();
            $predmeti = Predmet::all();
        } catch (\Illuminate\Database\QueryException $e) {
            dd('Дошло је до непредвиђене грешке.' . $e->getMessage());
        }

        return view('izvestaji.potvrdeStudent', compact('program', 'godina', 'predmeti', 'student'));
    }

    public function diplomaUnos(Kandidat $student)
    {
        $diplome = Diploma::where(['kandidat_id' => $student->id])->get();
        $diploma = $diplome->first();
        $profesori = Profesor::all();

        //return $diploma;

        try {
        } catch (\Illuminate\Database\QueryException $e) {
            dd('Дошло је до непредвиђене грешке.' . $e->getMessage());
        }

        return view('izvestaji.diplomaUnos', compact('student', 'diploma', 'profesori'));
    }

    public function diplomaAdd(Request $request)
    {
        $diplome = Diploma::where(['kandidat_id' => $request->id])->get();

        if($diplome != '[]')
        {
            $diploma = $diplome->first();
        }
        else {
            $diploma = new Diploma();
        }

        //return $request->id;

        $diploma->kandidat_id = $request->id;
        $diploma->broj = $request->broj;

        //return $request->datumOdbrane;
        $datum = new DateTime($request->datumOdbrane);
        //$datum = $request->datumOdbrane;
        $diploma->datumOdbrane = $datum;

        $diploma->lice = $request->lice;
        $diploma->funkcija = $request->funkcija;

        if($request->lice) {
            $diploma->lice = $request->lice;
        }
        else
        {
            $diploma->lice = $request->liceIdHidden;
        }

        try {
            $diploma->save();
        } catch (\Illuminate\Database\QueryException $e) {
            dd('Дошло је до непредвиђене грешке.' . $e->getMessage());
        }

        return Redirect::to('/izvestaji/' . 'diplomaUnos/' . $request->id);
    }

    public function spisakPoPredmetima(Request $request)
    {
        //$region->delete();
        try {
            $programi = PredmetProgram::where(['predmet_id' => $request->predmet])->get();
            $studenti = Kandidat::where(['statusUpisa_id' => 1])->get();

            //return $programi;

        } catch (\Illuminate\Database\QueryException $e) {
            dd('Дошло је до непредвиђене грешке.' . $e->getMessage());
        }



        $view = View::make('izvestaji.spisakPoPredmetima')->with('studenti', $studenti)->with('programi', $programi)->with('predmet', $programi->first()->predmet->naziv);

        $contents = $view->render();
        PDF::SetTitle('Списак студената по предмету');
        PDF::AddPage();
        PDF::SetFont('freeserif', '', 12);
        PDF::WriteHtml($contents);
        PDF::Output('Spisak.pdf');
    }

    public function diplomaStampa(Kandidat $student)
    {
        try {
            $studenti = Kandidat::where(['id' => $student->id])->get();
            $diplome = Diploma::where(['kandidat_id' => $student->id])->get();
            $diplomski_radovi = DiplomskiRad::where(['kandidat_id' => $student->id])->get();
            $ispiti = PolozeniIspiti::where(['kandidat_id' => $student->id])->get();

            $zbir = 0;
            $i = 0;
            foreach($ispiti as $ispit)
            {
                $zbir = $zbir + $ispit->konacnaOcena;
                $i++;
            }

            if($i != 0){
            $prosek = $zbir/$i;
            }
            else{
                $prosek = 0;
            }

        } catch (\Illuminate\Database\QueryException $e) {
            dd('Дошло је до непредвиђене грешке.' . $e->getMessage());
        }

        $view = View::make('izvestaji.diplomaStampa')->with('student', $studenti->first())->with('diploma', $diplome->first())->with('diplomski', $diplomski_radovi->first())->with('prosek', $prosek);

        $contents = $view->render();
        PDF::SetTitle('Уверење');
        PDF::SetMargins(12,2,12,true);
        PDF::AddPage();
        PDF::SetFont('freeserif', '', 12);
        PDF::WriteHtml($contents);
        PDF::Output('Uverenje.pdf');
    }

    public function diplomskiUnos(Kandidat $student)
    {
        try {
            $profesori = Profesor::all();
            $clan = $profesori;
            $predsednik = $profesori;
            $programi = StudijskiProgram::where(['id' => $student->studijskiProgram_id])->get();
            $program = $programi->first();
            $predmeti = PredmetProgram::where(['studijskiProgram_id' => $student->studijskiProgram_id])->get();
            //return $predmeti;
            $diplomski_radovi = DiplomskiRad::where(['kandidat_id' => $student->id])->get();
            $diplomski = $diplomski_radovi->first();
            //return $diplomski->mentor_id;
        } catch (\Illuminate\Database\QueryException $e) {
            dd('Дошло је до непредвиђене грешке.' . $e->getMessage());
        }

        return view('izvestaji.diplomskiUnos', compact('profesori', 'predmeti', 'student', 'program', 'clan', 'predsednik', 'diplomski'));
    }

    public function diplomskiAdd(Request $request)
    {
        $diplomski_radovi = DiplomskiRad::where(['kandidat_id' => $request->id])->get();
        if($diplomski_radovi != '[]')
        {$diplomski = $diplomski_radovi->first();}
        else {
            $diplomski = new DiplomskiRad();
        }
        $diplomski->kandidat_id = $request->id;
        $diplomski->ocenaOpis = $request->ocenaOpis;
        $diplomski->ocenaBroj = $request->ocenaBroj;
        $diplomski->naziv = $request->naziv;

        if($request->predmet) {
            $diplomski->predmet_id = $request->predmet;
        }
        else
        {
            $diplomski->clan_id = $request->predmetIdHidden;
        }

        if($request->clan_id) {
            $diplomski->clan_id = $request->clan_id;
        }
        else
        {
            $diplomski->clan_id = $request->clanIdHidden;
        }

        if($request->predsednik_id) {
            $diplomski->predsednik_id = $request->predsednik_id;
        }
        else
        {
            $diplomski->predsednik_id = $request->predsednikIdHidden;
        }

        if($request->mentor_id) {
            $diplomski->mentor_id = $request->mentor_id;
        }
        else
        {
            $diplomski->mentor_id = $request->mentorIdHidden;
        }
        $datum1 = new DateTime($request->datumPrijave);
        $datum2 = new DateTime($request->datumOdbrane);
        $diplomski->datumPrijave = $datum1;
        $diplomski->datumOdbrane = $datum2;

        try {
            $diplomski->save();
        } catch (\Illuminate\Database\QueryException $e) {
            dd('Дошло је до непредвиђене грешке.' . $e->getMessage());
        }

        return Redirect::to('/izvestaji/' . 'diplomskiUnos/' . $request->id);
    }

    public function komisijaStampa(Kandidat $student)
    {
        try {
            //$studenti = Kandidat::where(['id' => $student->id])->get();
            $diplome = Diploma::where(['kandidat_id' => $student->id])->get();
            $diplomski_radovi = DiplomskiRad::where(['kandidat_id' => $student->id])->get();
            //$diplomski = $diplomski_radovi->first();
            //return $studenti->first();

        } catch (\Illuminate\Database\QueryException $e) {
            dd('Дошло је до непредвиђене грешке.' . $e->getMessage());
        }

        $view = View::make('izvestaji.komisijaStampa')->with('student', $student)->with('diplomski', $diplomski_radovi->first())->with('diploma', $diplome->first());

        $contents = $view->render();
        PDF::SetTitle('Одлука о формирању комисије');
        PDF::SetMargins(12,2,12,true);
        PDF::AddPage();
        PDF::SetFont('freeserif', '', 12);
        PDF::WriteHtml($contents);
        PDF::Output('Komisija.pdf');
    }

    public function polozeniStampa(Kandidat $student)
    {
        try {
            $ispiti = PolozeniIspiti::where(['kandidat_id' => $student->id])->where(['indikatorAktivan' => 1])->where(['statusIspita' => 1])->get();

            $zbir = 0;
            $i = 0;
            foreach($ispiti as $ispit)
            {
                $zbir = $zbir + $ispit->konacnaOcena;
                $i++;
            }

            if($i != 0){
                $prosek = $zbir/$i;
            }
            else{
                $prosek = 0;
            }
            $datum = Carbon::now();

            //return $ispiti;

        } catch (\Illuminate\Database\QueryException $e) {
            dd('Дошло је до непредвиђене грешке.' . $e->getMessage());
        }

        $view = View::make('izvestaji.polozeniStampa')->with('student', $student)->with('ispiti', $ispiti)->with('datum', date("d.m.Y", strtotime($datum)))->with('prosek', $prosek);

        $contents = $view->render();
        PDF::SetTitle('Уверење о положеним испитима');
        PDF::SetMargins(12,2,12,true);
        PDF::AddPage();
        PDF::SetFont('freeserif', '', 12);
        PDF::WriteHtml($contents);
        PDF::Output('Ispiti.pdf');
    }

    public function nastavniPlan(Request $request)
    {
        try {
            //$predmeti = Predmet::where(['godinaStudija_id' => $request->godina, 'studijskiProgram_id' => $request->program])->get();
            $predmeti = PredmetProgram::where(['studijskiProgram_id' => $request->program])->where(['skolskaGodina_id' => $request->skolskaGodina_id])->where(['godinaStudija_id' => $request->godinaStudija_id])->get();
            //skolskaGodina_id

            if ($predmeti->first()) {
                $program = $predmeti->first()->program->naziv;
            } else {
                $program = '';
            }

        } catch (\Illuminate\Database\QueryException $e) {
            dd('Дошло је до непредвиђене грешке.' . $e->getMessage());
        }

        $view = View::make('izvestaji.nastavniPlan')->with('program', $program)->with('predmeti', $predmeti);

        $contents = $view->render();
        PDF::SetTitle('Наставни план');
        PDF::AddPage();
        PDF::SetFont('freeserif', '', 12);
        PDF::WriteHtml($contents);
        PDF::Output('Nastavni plan.pdf');
    }

    public function spisakDiplomiranih(Request $request)
    {

        try {
            $from = new DateTime($request->from);
            $to = new DateTime($request->to);

            $diplomirani = DiplomskiRad::whereBetween('datumOdbrane', array($from, $to))->get();

        } catch (\Illuminate\Database\QueryException $e) {
            dd('Дошло је до непредвиђене грешке.' . $e->getMessage());
        }

        $view = View::make('izvestaji.diplomirani')->with('diplomirani', $diplomirani);

        $contents = $view->render();
        PDF::SetTitle('Дипломирани студенти');
        PDF::AddPage();
        PDF::SetFont('freeserif', '', 12);
        PDF::WriteHtml($contents);
        PDF::Output('Diplomirani.pdf');
    }

    public function zapisnikStampa(Request $request)
    {
        //return $request->id;

        try {
            $zapisnik = ZapisnikOPolaganjuIspita::find($request->id);
            $zapisnikStudent = ZapisnikOPolaganju_Student::where(['zapisnik_id' => $request->id])->get();
            $ids = array_map(function(ZapisnikOPolaganju_Student $o) { return $o->kandidat_id; }, $zapisnikStudent->all());
            $studenti = Kandidat::whereIn('id', $ids)->get();

            $prijavaIds = array();
            foreach ($ids as $id) {
                $pom = PrijavaIspita::where(['predmet_id' => $zapisnik->predmet_id, 'rok_id' => $zapisnik->rok_id, 'kandidat_id' => $id])->first();
                if($pom != null){
                    $prijavaIds[$id] = $pom->id;
                }
            }

            $polozeniIspitIds = array();
            foreach ($ids as $id) {
                $pom = PolozeniIspiti::where(['zapisnik_id' => $zapisnik->id, 'predmet_id' => $zapisnik->predmet_id, 'kandidat_id' => $id])->first();
                if($pom != null){
                    $polozeniIspitIds[$id] = $pom->id;
                }
            }

            //$studijskiProgrami = ZapisnikOPolaganju_StudijskiProgram::where(['zapisnik_id' => $request->id])->get();
            //$statusIspita = StatusIspita::all();
            $polozeniIspiti = PolozeniIspiti::where(['zapisnik_id' => $request->id])->get();
            //return $studijskiProgrami;
            //return $polozeniIspiti;

            $ispit = Predmet::where(['id' => $zapisnik->predmet_id])->first();
            //return $ispit->naziv;


        } catch (\Illuminate\Database\QueryException $e) {
            dd('Дошло је до непредвиђене грешке.' . $e->getMessage());
        }
        //compact('zapisnik','studenti','studijskiProgrami','statusIspita', 'polozeniIspiti', 'polozeniIspitIds', 'prijavaIds'));
        $view = View::make('izvestaji.zapisnik')->with('zapisnik', $zapisnik)->with('studenti', $studenti)->with('ispit', $ispit->naziv)->with('polozeniIspiti', $polozeniIspiti);

        $contents = $view->render();
        PDF::SetTitle('Записник о полагању испита');
        PDF::AddPage();
        PDF::SetFont('freeserif', '', 12);
        PDF::WriteHtml($contents);
        PDF::Output('Zapisnik.pdf');
    }

}
