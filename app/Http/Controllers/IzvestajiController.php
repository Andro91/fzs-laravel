<?php

namespace App\Http\Controllers;

use App\GodinaStudija;
use App\Kandidat;
use App\Predmet;
use App\StudijskiProgram;
use Illuminate\Http\Request;
use App\Region;
use Illuminate\Support\Facades\Redirect;
use View;
use PDF;

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

    public function uverenjeOstecenomObrazovanju(Request $request)
    {
        try {
            //$kandidat = Kandidat::all();
            //$program = StudijskiProgram::all();
            $student = Kandidat::where(['id' => $request->id])->get();
            $program = $student->program->naziv;

        } catch (\Illuminate\Database\QueryException $e) {
            dd('Дошло је до непредвиђене грешке.' . $e->getMessage());
        }

        //return $studenti;

        $view = View::make('izvestaji.spisakSmer')->with('student', $student)->with('program', $program);

        $contents = $view->render();
        PDF::SetTitle('Списак кандидата');
        PDF::AddPage();
        PDF::SetFont('freeserif', '', 12);
        PDF::WriteHtml($contents);
        PDF::Output('Spisak.pdf');
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


}
