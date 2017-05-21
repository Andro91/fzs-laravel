<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiplomskiPolaganje extends Model
{
    public $table = 'diplomski_polaganje';
    public $dates = ['datum'];
    public $fillable = ['kandidat_id', 'tipStudija_id', 'studijskiProgram_id', 'predmet_id', 'nazivTeme', 'datum', 'vreme',
        'profesor_id', 'profesor_id_predsednik', 'profesor_id_clan', 'rok_id', 'brojBodova', 'ocena'];

    public function student()
    {
        return $this->belongsTo(Kandidat::class, 'kandidat_id');
    }

    public function predmet()
    {
        return $this->belongsTo(PredmetProgram::class, 'predmet_id');
    }

    public function profesor()
    {
        return $this->belongsTo(Profesor::class, 'profesor_id');
    }

    public function ispitniRok()
    {
        return $this->belongsTo(AktivniIspitniRokovi::class, 'rok_id');
    }

    public function clan()
    {
        return $this->belongsTo(Profesor::class, 'profesor_id_clan');
    }

    public function predsednik()
    {
        return $this->belongsTo(Profesor::class, 'profesor_id_predsednik');
    }
}
