<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AktivniIspitniRokovi extends Model
{
    protected $table = 'aktivni_ispitni_rokovi';

    protected $fillable = ['rok_id','pocetak', 'kraj', 'komentar', 'tipRoka_id', 'indikatorAktivan'];
}
