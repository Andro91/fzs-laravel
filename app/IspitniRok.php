<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IspitniRok extends Model
{
    protected $table = 'ispitni_rok';

    public function aktivniRokovi()
    {
        return $this->hasMany(AktivniIspitniRokovi::class);
    }
}
