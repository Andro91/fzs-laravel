<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PolozeniIspiti extends Model
{
    protected $table = 'polozeni_ispiti';

    public function kandidat()
    {
        return $this->belongsTo(Kandidat::class, 'kandidat_id');
    }

    public function predmet()
    {
        return $this->belongsTo(Predmet::class, 'predmet_id');
    }

    public function prijava()
    {
        return $this->belongsTo(PrijavaIspita::class, 'prijava_id');
    }

}
