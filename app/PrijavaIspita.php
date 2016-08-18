<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrijavaIspita extends Model
{
    protected $fillable = ['kandidat_id','predmet_id', 'rok_id', 'brojPolaganja', 'datum'];
}
