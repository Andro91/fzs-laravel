<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AktivniIspitniRokovi extends AndroModel
{
    protected $table = 'aktivni_ispitni_rokovi';

    protected $dates = ['pocetak', 'kraj'];

    protected $fillable = ['rok_id','naziv','pocetak', 'kraj', 'komentar', 'tipRoka_id', 'indikatorAktivan'];

    public function nadredjeniRok()
    {
        return $this->belongsTo(IspitniRok::class,'rok_id');
    }

    public static function tipRoka($id)
    {
        switch($id){
            case 1: return 'Редовни';
            case 2: return 'Ванредни';
        }
        return '';
    }
}
