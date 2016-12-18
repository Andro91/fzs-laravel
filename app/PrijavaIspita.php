<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrijavaIspita extends AndroModel
{
    protected $table = 'prijava_ispita';

    protected $dates = ['datum'];

    protected $fillable = ['kandidat_id','predmet_id', 'rok_id', 'profesor_id', 'brojPolaganja', 'datum'];

    public function kandidat()
    {
        return $this->belongsTo(Kandidat::class, 'kandidat_id');
    }

    public function predmet()
    {
        return $this->belongsTo(PredmetProgram::class, 'predmet_id');
    }

    public function rok()
    {
        return $this->belongsTo(AktivniIspitniRokovi::class, 'rok_id');
    }

    public function profesor()
    {
        return $this->belongsTo(Profesor::class, 'profesor_id');
    }

    public static function nazivRokaPoId($idRoka)
    {
        $rok = AktivniIspitniRokovi::find($idRoka);
        if($rok == null){
            return null;
        }
        return $rok->naziv;
    }
}
