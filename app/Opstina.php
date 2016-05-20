<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Opstina extends Model
{
    protected $table = 'opstina';

    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id');
    }
}
