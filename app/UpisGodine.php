<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UpisGodine extends Model
{
    protected $table = 'upis_godine';

    public static function registrujKandidata($id, $uplata)
    {
        //provera da li je kandidat vec upisan, da bi se izbeglo dupliranje zapisa
        $vecUpisan = UpisGodine::where(['kandidat_id' => $id])->get();
        $kandidat = Kandidat::find($id);
        if(count($vecUpisan) > 0){
            return;
        }

        if($kandidat->tipStudija_id == 1)
        {
            $upis = new UpisGodine();
            $upis->kandidat_id = $id;
            $upis->godina = 1;
            $upis->pokusaj = 1;
            $upis->skolarina = $kandidat->godinaStudija_id == 1 ? $uplata : 0;
            $upis->upisan = 0;
            $upis->save();

            $upis = new UpisGodine();
            $upis->kandidat_id = $id;
            $upis->godina = 2;
            $upis->pokusaj = 1;
            $upis->skolarina = $kandidat->godinaStudija_id == 2 ? $uplata : 0;
            $upis->upisan = 0;
            $upis->save();

            $upis = new UpisGodine();
            $upis->kandidat_id = $id;
            $upis->godina = 3;
            $upis->pokusaj = 1;
            $upis->skolarina = $kandidat->godinaStudija_id == 3 ? $uplata : 0;
            $upis->upisan = 0;
            $upis->save();

            $upis = new UpisGodine();
            $upis->kandidat_id = $id;
            $upis->godina = 4;
            $upis->pokusaj = 1;
            $upis->skolarina = $kandidat->godinaStudija_id == 4 ? $uplata : 0;
            $upis->upisan = 0;
            $upis->save();
        }
        else if($kandidat->tipStudija_id == 2)
        {
            $upis = new UpisGodine();
            $upis->kandidat_id = $id;
            $upis->godina = 1;
            $upis->pokusaj = 1;
            $upis->skolarina = $uplata;
            $upis->upisan = 0;
            $upis->save();
        }

    }

    public static function uplatiGodinu($id, $godina)
    {
        $upis = UpisGodine::where(['kandidat_id' => $id, 'godina' => $godina])->first();
        $upis->skolarina = 1;
        $saved = $upis->save();

        if($saved){
            return true;
        }else{
            return false;
        }

    }


    public static function upisiGodinu($id, $godina)
    {
        $upis = UpisGodine::where(['kandidat_id' => $id, 'godina' => $godina])->first();
        $upis->upisan = 1;
        $saved1 = $upis->save();

        $kandidat = Kandidat::find($id);

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
        $arhivIndeksa = ArhivIndeksa::where(['tipStudija_id' => $kandidat->tipStudija_id, 'skolskaGodinaUpisa_id' => $kandidat->skolskaGodinaUpisa_id ])->first();
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

        $noviBrojIndeksa = $poslednjiBrojIndeksa + 1;

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
