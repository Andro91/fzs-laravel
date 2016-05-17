<?php

use Illuminate\Database\Seeder;

class StatusStudiranjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statusStudiranja = new \App\StatusStudiranja();

        $statusStudiranja->naziv = str_random(10);
        $statusStudiranja->indikatorAktivan = 1;

        $statusStudiranja->save();
    }
}
