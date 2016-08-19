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
        $predmet->semestarSlusanjaPredmeta = 1;
        $predmet->tipStudija_id = 1;
        $predmet->studijskiProgram_id = 1;
        $predmet->godinaStudija_id = 1;
        $predmet->espb = 5;
        $predmet->statusPredmeta = 1;

        $predmet->save();
    }
}
