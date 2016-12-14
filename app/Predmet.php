<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Predmet extends AndroModel
{
    protected $table = 'predmet';

    public function godinaStudija()
    {
        return $this->belongsTo(GodinaStudija::class, 'godinaStudija_id');
    }

    public function prijaveIspita()
    {
        return $this->hasMany(PrijavaIspita::class);
    }

    public function tipStudija()
    {
        return $this->belongsTo(TipStudija::class, 'tipStudija_id');
    }

    public function studijskiProgram()
    {
        return $this->belongsTo(StudijskiProgram::class, 'studijskiProgram_id');
    }
}
