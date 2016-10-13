<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfesorPredmet extends Model
{
    protected $table = 'profesor_predmet';

    public function profesor()
    {
        return $this->belongsTo(Profesor::class, 'profesor_id');
    }

    public function predmet()
    {
        return $this->belongsTo(PredmetProgram::class, 'predmet_id');
    }

    public function semestar()
    {
        return $this->belongsTo(Semestar::class, 'semestar_id');
    }

    public function oblik_nastave()
    {
        return $this->belongsTo(OblikNastave::class, 'oblik_nastave_id');
    }
}
