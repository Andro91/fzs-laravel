<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudijskiProgram extends Model
{
    protected $table = 'studijski_program';

    protected $fillable = ['naziv', 'skrNaziv', 'indikatorAktivan'];

    public function tipStudija()
    {
        return $this->belongsTo(TipStudija::class, 'tipStudija_id');
    }
}
