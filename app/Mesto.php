<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mesto extends Model
{
    protected $table = 'mesto';

    public function opstina()
    {
        return $this->belongsTo(Opstina::class, 'opstina_id');
    }
}
