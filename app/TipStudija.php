<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipStudija extends Model
{
    protected $table = 'tip_studija';

    protected $fillable = ['naziv', 'skrNaziv', 'indikatorAktivan'];

    public function studijskiProgram()
    {
        return $this->hasMany(StudijskiProgram::class, 'tipStudija_id');
    }

}
