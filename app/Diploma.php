<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diploma extends Model
{
    protected $table = 'diploma';

    public function student()
    {
        return $this->belongsTo(Kandidat::class, 'kandidat_id');
    }
}
