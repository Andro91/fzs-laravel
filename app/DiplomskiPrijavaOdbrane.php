<?php

namespace App;


class DiplomskiPrijavaOdbrane extends AndroModel
{
    public $table = 'diplomski_prijava_odbrane';

    public $dates = ['datumPrijave', 'datumOdbrane'];

    public $fillable = ['kandidat_id', 'tipStudija_id', 'studijskiProgram_id', 'predmet_id', 'nazivTeme', 'datumPrijave',
        'datumOdbrane', 'indikatorOdobreno', 'temu_odobrio_profesor_id', 'odbranu_odobrio_profesor_id'];

    public function predmet()
    {
        return $this->belongsTo(PredmetProgram::class, 'predmet_id');
    }

    public function odobrioTemuProfesor()
    {
        return $this->belongsTo(Profesor::class, 'temu_odobrio_profesor_id');
    }

    public function odobrioOdbranuProfesor()
    {
        return $this->belongsTo(Profesor::class, 'odbranu_odobrio_profesor_id');
    }
}
