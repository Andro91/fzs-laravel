<?php

namespace App;


class DiplomskiPrijavaTeme extends AndroModel
{
    public $table = 'diplomski_prijava_teme';
    public $dates = ['datum'];
    public $fillable = ['kandidat_id', 'tipStudija_id', 'studijskiProgram_id', 'predmet_id', 'nazivTeme', 'datum', 'indikatorOdobreno', 'profesor_id'];

    public function predmet()
    {
        return $this->belongsTo(PredmetProgram::class, 'predmet_id');
    }

    public function profesor()
    {
        return $this->belongsTo(Profesor::class, 'profesor_id');
    }
}
