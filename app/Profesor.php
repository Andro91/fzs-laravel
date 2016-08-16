<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    protected $table = 'profesor';

    public function status()
    {
        return $this->belongsTo(StatusProfesora::class, 'status_id');
    }

    public function angazovanja()
    {
        return $this->hasMany(ProfesorPredmet::class);
    }
}
