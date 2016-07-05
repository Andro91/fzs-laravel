<?php

use Illuminate\Database\Seeder;

class StatusKandidataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statusi = array('Статус 1', 'Статус 2', 'Статус 3');

        foreach ($statusi as $s) {
            $status= new \App\StatusKandidata();

            $status->naziv = $s;

            $status->indikatorAktivan = 1;

            $status->save();
        }
    }
}
