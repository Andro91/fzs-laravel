<?php

use Illuminate\Database\Seeder;

class StatusIspitaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statusi = array('положио', 'није положио', 'одложио', 'није изашао', 'признат');

        foreach ($statusi as $s) {
            $status= new \App\StatusIspita();

            $status->naziv = $s;

            $status->indikatorAktivan = 1;

            $status->save();
        }
    }
}
