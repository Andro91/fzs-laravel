<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PredmetProgram extends Model
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

    public function tipPredmeta()
    {
        return $this->belongsTo(TipPredmeta::class, 'tipPredmeta_id');
    }
}
