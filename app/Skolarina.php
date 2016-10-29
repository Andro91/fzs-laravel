<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skolarina extends AndroModel
{
    protected $table = "skolarina";

    protected $dates = ['datum'];

    protected $guarded = [];

    public function kandidat()
    {
        return $this->belongsTo(Kandidat::class, 'kandidat_id');
    }
}
