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
        $statusi = array('самогинансирајући', 'буџет', 'стипендија');

        foreach ($statusi as $s) {
            $status= new \App\StatusStudiranja();

            $status->naziv = $s;

            $status->indikatorAktivan = 1;

            $status->save();
        }
    }
}
