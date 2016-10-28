<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UplataSkolarine extends Model
{
    protected $table = 'uplata_skolarine';

    protected $dates = ['datum'];

    public function kandidat()
    {
        return $this->belongsTo(Kandidat::class, 'kandidat_id');
    }
}
