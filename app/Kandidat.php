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
}
