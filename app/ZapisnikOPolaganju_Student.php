<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ZapisnikOPolaganju_Student extends Model
{
    protected $table = 'zapisnik_o_polaganju__student';

    public function prijava()
    {
        return $this->belongsTo(PrijavaIspita::class, 'prijavaIspita_id');
    }
}
