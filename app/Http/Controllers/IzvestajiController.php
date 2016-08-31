<?php

namespace App\Http\Controllers;

use App\Diploma;
use App\DiplomskiRad;
use App\GodinaStudija;
use App\Kandidat;
use App\PolozeniIspiti;
use App\Predmet;
use App\Profesor;
use App\StudijskiProgram;
use Illuminate\Http\Request;
use App\Region;
use Illuminate\Support\Facades\Redirect;
use View;
use PDF;
use Carbon\Carbon;

use DateTime;

use App\Http\Requests;

class IzvestajiController extends Controller
{
    public function spisakPoSmerovima()
    {
        //$region->delete();
        try {
            $kandidat = Kandidat::all();
            $program = StudijskiProgram::all();
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
        $view = View::make('izvestaji.test')->with('studijskiProgram', $program)->with('kandidat', $kandidat);
        //$ime = $region->naziv;
        //$view = View::make('sifarnici.test', ['ime' => $region->naziv]);

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
            $kandidat = Kandidat::where(['upisan' => 1])->get();
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
            $studenti = Kandidat::where(['upisan' => 1, 'godinaStudija_id' => $request->godina, 'studijskiProgram_id' => $request->program])->get();
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
        } catch (\Illuminate\Database\QueryException $e) {
            dd('Дошло је до непредвиђене грешке.' . $e->getMessage());
        }

        return view('izvestaji.spiskoviStudenti', compact('program', 'godina', 'predmeti'));
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
            $predmet = Predmet::where(['id' => $request->predmet])->get();

            //return $predmet->id;

            $studenti = Kandidat::where(['upisan' => 1, 'studijskiProgram_id' => $predmet->first()->studijskiProgram_id])->get();

        } catch (\Illuminate\Database\QueryException $e) {
            dd('Дошло је до непредвиђене грешке.' . $e->getMessage());
        }



        $view = View::make('izvestaji.spisakPoPredmetima')->with('studenti', $studenti)->with('predmet', $predmet->first()->naziv);

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

            $prosek = $zbir/$i;

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
            $predmeti = Predmet::where(['studijskiProgram_id' => $program->id])->get();
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
            $ispiti = PolozeniIspiti::where(['kandidat_id' => $student->id])->get();

            $zbir = 0;
            $i = 0;
            foreach($ispiti as $ispit)
            {
                $zbir = $zbir + $ispit->konacnaOcena;
                $i++;
            }

            $prosek = $zbir/$i;
            $datum = Carbon::now();


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

}
