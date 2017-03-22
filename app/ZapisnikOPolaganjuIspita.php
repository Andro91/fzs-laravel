<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ZapisnikOPolaganjuIspita extends AndroModel
{
    protected $table = 'zapisnik_o_polaganju_ispita';

    protected $dates = ['datum', 'datum2'];

    protected $fillable = ['kandidat_id','predmet_id', 'rok_id', 'brojPolaganja', 'datum', 'vreme', 'ucionica', 'prijavaIspita_id', 'profesor_id'];

    public function predmet()
    {
        return $this->belongsTo(Predmet::class, 'predmet_id');
    }

    public function ispitniRok()
    {
        return $this->belongsTo(AktivniIspitniRokovi::class, 'rok_id');
    }

    public function studenti()
    {
        return $this->hasMany(ZapisnikOPolaganju_Student::class, 'zapisnik_id');
    }

    public function profesor()
    {
        return $this->belongsTo(Profesor::class, 'profesor_id');
    }
}
