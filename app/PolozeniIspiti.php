<?php

namespace App;

class PolozeniIspiti extends AndroModel
{
    protected $table = 'polozeni_ispiti';

    public function kandidat()
    {
        return $this->belongsTo(Kandidat::class, 'kandidat_id');
    }

    public function predmet()
    {
        return $this->belongsTo(PredmetProgram::class, 'predmet_id');
    }

    public function prijava()
    {
        return $this->belongsTo(PrijavaIspita::class, 'prijava_id');
    }

    public function zapisnik()
    {
        return $this->belongsTo(ZapisnikOPolaganjuIspita::class, 'zapisnik_id');
    }

}
