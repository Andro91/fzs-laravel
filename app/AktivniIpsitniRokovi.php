<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AktivniIpsitniRokovi extends Model
{
    protected $fillable = ['rok_id','pocetak', 'kraj', 'komentar', 'tipRoka_id', 'indikatorAktivan'];
}
