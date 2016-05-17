<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudijskiProgram extends Model
{
    protected $table = 'studijski_program';

    public function tipStudija()
    {
        return $this->belongsTo(TipStudija::class, 'tipStudija_id');
    }
}
