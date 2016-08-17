<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Predmet extends Model
{
    protected $table = 'predmet';

    public function tipStudija()
    {
        return $this->belongsTo(TipStudija::class, 'tipStudija_id');
    }

    public function studijskiProgram()
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
