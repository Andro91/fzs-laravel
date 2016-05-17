<?php

use Illuminate\Database\Seeder;

class KrsnaSlavaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $krsnaSlava = new \App\KrsnaSlava();

        $krsnaSlava->naziv = str_random(10);
        $krsnaSlava->datumSlave = 1;
        $krsnaSlava->indikatorAktivan = 1;


        $krsnaSlava->save();
    }
}