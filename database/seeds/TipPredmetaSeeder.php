<?php

use Illuminate\Database\Seeder;

class TipPredmetaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tip = array('Тип 1', 'Тип 2', 'Тип 3');

        foreach ($tip as $t) {
            $tip= new \App\TipPredmeta();

            $tip->naziv = $t;
            $tip->indikatorAktivan = 1;

            $tip->save();
        }
    }
}
