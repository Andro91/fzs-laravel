<?php

use Illuminate\Database\Seeder;
use App\Sport;

class SportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sportovi = array('Američki fudbal', 'Australijski fudbal', 'Bejzbol', 'Baskijska pelota', 'Kanadski fudbal',
            'Kriket', 'Karling', 'Košarka', 'Odbojka', 'Peintbol', 'Petanque', 'Polo', 'Rukomet', 'Ragbi', 'Softbol',
            'Faustbal', 'Florbol', 'Fudbal', 'Futsal', 'Hokej', 'Hokej na travi', 'Hurling', 'Hokej na ledu',
            'Hokej na rolerima');

        foreach ($sportovi as $s) {
            $sport = new Sport();

            $sport->naziv = $s;
            $sport->indikatorAktivan = 1;

            $sport->save();
        }


    }
}
