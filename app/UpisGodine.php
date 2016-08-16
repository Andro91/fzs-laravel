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
        if(count($vecUpisan) > 0){
            return;
        }

        $upis = new UpisGodine();
        $upis->kandidat_id = $id;
        $upis->godina = 1;
        $upis->skolarina = $uplata;
        $upis->upisan = 0;
        $upis->save();

        $upis = new UpisGodine();
        $upis->kandidat_id = $id;
        $upis->godina = 2;
        $upis->skolarina = 0;
        $upis->upisan = 0;
        $upis->save();

        $upis = new UpisGodine();
        $upis->kandidat_id = $id;
        $upis->godina = 3;
        $upis->skolarina = 0;
        $upis->upisan = 0;
        $upis->save();

        $upis = new UpisGodine();
        $upis->kandidat_id = $id;
        $upis->godina = 4;
        $upis->skolarina = 0;
        $upis->upisan = 0;
        $upis->save();
    }

    public static function uplatiGodinu($id, $godina)
    {
        $upis = UpisGodine::where(['kandidat_id' => $id, 'godina' => $godina])->first();
        $upis->skolarina = 1;
        $upis->save();
    }

    public static function upisiGodinu($id, $godina)
    {
        $upis = UpisGodine::where(['kandidat_id' => $id, 'godina' => $godina])->first();
        $upis->upisan = 1;
        $upis->save();
    }
}
