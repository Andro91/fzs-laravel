<?php

use Illuminate\Database\Seeder;
use App\IspitniRok;

class IspitniRokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sportovi = array('Јануар', 'Јун','Септембар');

        foreach ($sportovi as $s) {
            $ispitniRok = new IspitniRok();

            $ispitniRok->naziv = $s;
            $ispitniRok->indikatorAktivan = 1;

            $ispitniRok->save();
        }
    }
}
