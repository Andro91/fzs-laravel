<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiplomskiRad extends Model
{
    protected $table = 'diplomski_rad';

    public function student()
    {
        return $this->belongsTo(Kandidat::class, 'kandidat_id');
    }

    public function mentor()
    {
        return $this->belongsTo(Profesor::class, 'mentor_id');
    }

    public function clan()
    {
        return $this->belongsTo(Profesor::class, 'clan_id');
    }

    public function predsednik()
    {
        return $this->belongsTo(Profesor::class, 'predsednik_id');
    }

    public function predmet()
    {
        return $this->belongsTo(Predmet::class, 'predmet_id');
    }
}
