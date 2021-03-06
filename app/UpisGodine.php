<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;

class UpisGodine extends AndroModel
{
    protected $table = 'upis_godine';

    protected $dates = ['datumUpisa','datumPromene'];

    public function status()
    {
        return $this->belongsTo(StatusGodine::class, 'statusGodine_id');
    }

    public static function registrujKandidata($id)
    {
        $kandidat = Kandidat::find($id);

        //provera da li je kandidat vec upisan, da bi se izbeglo dupliranje zapisa
        $vecUpisan = UpisGodine::where([
            'kandidat_id' => $id,
            'tipStudija_id' => $kandidat->tipStudija_id])
            ->get();

        if(count($vecUpisan) > 0){
            return;
        }

        if($kandidat->tipStudija_id == 1)
        {
                $upis = new UpisGodine();
                $upis->kandidat_id = $id;
                $upis->godina = 1;
                $upis->pokusaj = 1;
                $upis->tipStudija_id = $kandidat->tipStudija_id;
                $upis->studijskiProgram_id = $kandidat->studijskiProgram_id;
                if($kandidat->godinaStudija_id == 1){
                    $upis->statusGodine_id = 1;
                    $upis->skolskaGodina_id = $kandidat->skolskaGodinaUpisa_id;
                    $upis->datumUpisa = Carbon::now();
                }else{
                    $upis->statusGodine_id = 3;
                    $upis->skolskaGodina_id = null;
                    $upis->datumUpisa = null;
                }
                $upis->save();

                $upis = new UpisGodine();
                $upis->kandidat_id = $id;
                $upis->godina = 2;
                $upis->pokusaj = 1;
                $upis->tipStudija_id = $kandidat->tipStudija_id;
                $upis->studijskiProgram_id = $kandidat->studijskiProgram_id;
                if($kandidat->godinaStudija_id == 2){
                    $upis->statusGodine_id = 1;
                    $upis->skolskaGodina_id = $kandidat->skolskaGodinaUpisa_id;
                    $upis->datumUpisa = Carbon::now();
                }else{
                    $upis->statusGodine_id = 3;
                    $upis->skolskaGodina_id = null;
                    $upis->datumUpisa = null;
                }
                $upis->save();

                $upis = new UpisGodine();
                $upis->kandidat_id = $id;
                $upis->godina = 3;
                $upis->pokusaj = 1;
                $upis->tipStudija_id = $kandidat->tipStudija_id;
                $upis->studijskiProgram_id = $kandidat->studijskiProgram_id;
                if($kandidat->godinaStudija_id == 3){
                    $upis->statusGodine_id = 1;
                    $upis->skolskaGodina_id = $kandidat->skolskaGodinaUpisa_id;
                    $upis->datumUpisa = Carbon::now();
                }else{
                    $upis->statusGodine_id = 3;
                    $upis->skolskaGodina_id = null;
                    $upis->datumUpisa = null;
                }
                $upis->save();

                $upis = new UpisGodine();
                $upis->kandidat_id = $id;
                $upis->godina = 4;
                $upis->pokusaj = 1;
                $upis->tipStudija_id = $kandidat->tipStudija_id;
                $upis->studijskiProgram_id = $kandidat->studijskiProgram_id;
                if($kandidat->godinaStudija_id == 4){
                    $upis->statusGodine_id = 1;
                    $upis->skolskaGodina_id = $kandidat->skolskaGodinaUpisa_id;
                    $upis->datumUpisa = Carbon::now();
                }else{
                    $upis->statusGodine_id = 3;
                    $upis->skolskaGodina_id = null;
                    $upis->datumUpisa = null;
                }
                $upis->save();
        }
        else if($kandidat->tipStudija_id == 2)
        {
            $upis = new UpisGodine();
            $upis->kandidat_id = $id;
            $upis->godina = 1;
            $upis->pokusaj = 1;
            $upis->tipStudija_id = $kandidat->tipStudija_id;
            $upis->studijskiProgram_id = $kandidat->studijskiProgram_id;
            $upis->statusGodine_id = 1;
            $upis->skolskaGodina_id = $kandidat->skolskaGodinaUpisa_id;
            $upis->datumUpisa = Carbon::now();
            $upis->datumPromene = Carbon::now();
            $upis->save();
        }else if($kandidat->tipStudija_id == 3)
        {
            $upis = new UpisGodine();
            $upis->kandidat_id = $id;
            $upis->godina = 1;
            $upis->pokusaj = 1;
            $upis->tipStudija_id = $kandidat->tipStudija_id;
            $upis->studijskiProgram_id = $kandidat->studijskiProgram_id;
            $upis->statusGodine_id = 1;
            $upis->skolskaGodina_id = $kandidat->skolskaGodinaUpisa_id;
            $upis->datumUpisa = Carbon::now();
            $upis->datumPromene = Carbon::now();
            $upis->save();
        }

    }

    //Upis master studija za postojećeg kandidata
    public static function upisMasterPostojeciKandidat($kandidatId,$studijskiProgramId,$skolskaGodinaUpisaId)
    {
        $kandidat = Kandidat::find($kandidatId)->replicate();
        if(!empty($kandidat)){
            if($kandidat->tipStudija_id == 1){
                $kandidat->tipStudija_id = 2;
                $kandidat->studijskiProgram_id = $studijskiProgramId;
                $kandidat->skolskaGodinaUpisa_id = $skolskaGodinaUpisaId;
                $kandidat->statusUpisa_id = \Config::get('constants.statusi.upisan');
                $kandidat->brojIndeksa = null;
                $kandidat->godinaStudija_id = 1;
                $kandidat->save();
                UpisGodine::generisiBrojIndeksa($kandidat->id);
                UpisGodine::registrujKandidata($kandidat->id);
                return $kandidat->id;
            }
            return false;
        }
        return false;
    }

    public static function upisiGodinu($id, $godina, $skolskaGodinaUpisaId)
    {
        $kandidat = Kandidat::find($id);
        $upis = UpisGodine::where([
            'kandidat_id' => $id,
            'godina' => $godina,
            'tipStudija_id' => $kandidat->tipStudija_id
        ])->first();

        //Ako nije prva godina, staramo se da prethodnu godinu obelezimo kao zavrsenu
//        if($godina > 1 && !empty($kandidat->brojIndeksa)){
//            $max = UpisGodine::where(['kandidat_id' => $id, 'godina' => $godina])->max('pokusaj');
//            $prethodnaGodina = UpisGodine::where([
//                'kandidat_id' => $id,
//                'godina' => $godina-1,
//                'pokusaj' => $max,
//                'tipStudija_id' => $kandidat->tipStudija_id])->first();
//            $prethodnaGodina->statusGodine_id = 5;
//            $ads = $prethodnaGodina->save();
//        }

        $upis->statusGodine_id = 1;
        $upis->skolskaGodina_id = $skolskaGodinaUpisaId;
        $upis->datumUpisa = Carbon::now();
        $saved1 = $upis->save();

        if($saved1){
            $kandidat->godinaStudija_id = $godina;
            $saved2 = $kandidat->save();
        }else{
            return false;
        }

        if(empty($kandidat->brojIndeksa)){
            UpisGodine::generisiBrojIndeksa($kandidat->id);
        }

        if($saved1 && $saved2){
            return true;
        }else{
            return false;
        }
    }

    public static function generisiBrojIndeksa($kandidatId)
    {
        $kandidat = Kandidat::find($kandidatId);

        $arhivIndeksa = ArhivIndeksa::where([
            'tipStudija_id' => $kandidat->tipStudija_id,
            'skolskaGodinaUpisa_id' => $kandidat->skolskaGodinaUpisa_id
        ])->first();

        if($arhivIndeksa == null){
            $prviZapis = new ArhivIndeksa();
            $prviZapis->tipStudija_id = $kandidat->tipStudija_id;
            $prviZapis->skolskaGodinaUpisa_id = $kandidat->skolskaGodinaUpisa_id;
            $prviZapis->indeks = 1;
            $prviZapis->save();
            $poslednjiBrojIndeksa = 0;
        }else{
            $poslednjiBrojIndeksa = $arhivIndeksa->indeks;
            $arhivIndeksa->indeks++;
            $arhivIndeksa->save();
        }

        $kandidati = Kandidat::where([
            'tipStudija_id' => $kandidat->tipStudija_id,
            'skolskaGodinaUpisa_id' => $kandidat->skolskaGodinaUpisa_id
        ])->pluck('brojIndeksa')->all();

        $postojeciIndeksi = array_map(function($item){ return (int)substr($item,1,3); }, $kandidati);

        $noviBrojIndeksa = $poslednjiBrojIndeksa + 1;

        while(in_array($noviBrojIndeksa, $postojeciIndeksi)){
            $noviBrojIndeksa++;
        }

        switch(strlen($noviBrojIndeksa)){
            case 1 : $noviBrojIndeksa = '00' . $noviBrojIndeksa; break;
            case 2 : $noviBrojIndeksa = '0' .  $noviBrojIndeksa; break;
            case 3 : break;
        }

        $skolskaGodina = SkolskaGodUpisa::find($kandidat->skolskaGodinaUpisa_id)->naziv;
        $brojIndeksa = $kandidat->tipStudija_id . $noviBrojIndeksa . '/' . substr($skolskaGodina,0,4);
        $kandidat->brojIndeksa = $brojIndeksa;
        $kandidat->save();
    }
}
