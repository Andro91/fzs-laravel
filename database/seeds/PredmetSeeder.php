<?php

use Illuminate\Database\Seeder;

class PredmetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $predmet = new \App\Predmet();

        $predmet->naziv = 'Социологија';
        $predmet->espb = 5;
        $predmet->statusPredmeta = 1;

        $predmet->save();
    }
}
