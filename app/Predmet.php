<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Predmet extends Model
{
    protected $table = 'predmet';

    public function godinaStudija()
    {
        return $this->belongsTo(GodinaStudija::class, 'godinaStudija_id');
    }

    public function prijaveIspita()
    {
        return $this->hasMany(PrijavaIspita::class);
    }

    public function tipPredmeta()
    {
        return $this->belongsTo(TipPredmeta::class, 'tipPredmeta_id');
    }
}
