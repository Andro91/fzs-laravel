<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kandidat extends Model
{
    protected $table = 'kandidat';

    public function angazovanja()
    {
        return $this->hasMany(SportskoAngazovanje::class);
    }

    public function program()
    {
        return $this->belongsTo(StudijskiProgram::class, 'studijskiProgram_id');
    }

    public function upisaneGodine()
    {
        return $this->hasMany(UpisGodine::class);
    }

    public function prijaveIspita()
    {
        return $this->hasMany(PrijavaIspita::class);
    }
}
