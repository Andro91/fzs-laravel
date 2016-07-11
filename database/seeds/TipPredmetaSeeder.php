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
        $tip = array('обавезан', 'изборни', 'практични');

        foreach ($tip as $t) {
            $tip= new \App\TipPredmeta();

            $tip->naziv = $t;
            $tip->indikatorAktivan = 1;

            $tip->save();
        }
    }
}
