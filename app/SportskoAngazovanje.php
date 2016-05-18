<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SportskoAngazovanje extends Model
{
    protected $table = 'sportsko_angazovanje';

    public function kandidat()
    {
        return $this->belongsTo(Kandidat::class, 'kandidat_id');
    }

    public function sport()
    {
        return $this->belongsTo(Sport::class, 'sport_id');
    }
}
