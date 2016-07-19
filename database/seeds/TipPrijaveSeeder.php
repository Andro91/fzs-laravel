<?php

use Illuminate\Database\Seeder;

class TipPrijaveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tip = array('обавезан предмет', 'изборни предмет', 'допунски', 'дипломски рад тема', 'дипломски рад одбрана');

        foreach ($tip as $t) {
            $tip= new \App\TipPrijave();

            $tip->naziv = $t;
            $tip->indikatorAktivan = 1;

            $tip->save();
        }
    }
}
