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
}
