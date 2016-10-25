<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PredmetProgram extends AndroModel
{
    protected $table = 'predmet_program';

    public function predmet()
    {
        return $this->belongsTo(Predmet::class, 'predmet_id');
    }

    public function program()
    {
        return $this->belongsTo(StudijskiProgram::class, 'studijskiProgram_id');
    }

    public function godinaStudija()
    {
        return $this->belongsTo(GodinaStudija::class, 'godinaStudija_id');
    }

    public function tipStudija()
    {
        return $this->belongsTo(TipStudija::class, 'tipStudija_id');
    }

    public function studijskiProgram()
    {
        return $this->belongsTo(StudijskiProgram::class, 'studijskiProgram_id');
    }

    public function tipPredmeta()
    {
        return $this->belongsTo(TipPredmeta::class, 'tipPredmeta_id');
    }

    public function prijaveIspita()
    {
        return $this->hasMany(PrijavaIspita::class, 'predmet_id');
    }
}
