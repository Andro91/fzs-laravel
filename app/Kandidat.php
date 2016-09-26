<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kandidat extends Model
{
    protected $table = 'kandidat';

    protected $dates = ['datumRodjenja','datumStatusa'];

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

    public function mestoRodjenja()
    {
        return $this->belongsTo(Opstina::class, 'mestoRodjenja_id');
    }

    public function godinaUpisa()
    {
        return $this->belongsTo(SkolskaGodUpisa::class, 'skolskaGodinaUpisa_id');
    }

    public function godinaStudija()
    {
        return $this->belongsTo(GodinaStudija::class, 'godinaStudija_id');
    }
}
