<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrilozenaDokumenta extends Model
{
    protected $table = 'prilozena_dokumenta';
    //
    public function godinaStudija()
    {
        return $this->belongsTo(GodinaStudija::class, 'skolskaGodina_id');
    }
}
