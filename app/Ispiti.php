<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ispiti extends Model
{
    protected $table = 'ispiti';

    public function predmet()
    {
        return $this->belongsTo(Predmet::class, 'predmet_id');
    }

    public function student()
    {
        return $this->belongsTo(Kandidat::class, 'student_id');
    }

    public function rok()
    {
        return $this->belongsTo(IspitniRok::class, 'ispitni_rok_id');
    }
}
