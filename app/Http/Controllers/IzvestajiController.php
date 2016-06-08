<?php

namespace App\Http\Controllers;

use App\Kandidat;
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
        $view = View::make('sifarnici.test')->with('studijskiProgram', $program)->with('kandidat', $kandidat);
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
}
