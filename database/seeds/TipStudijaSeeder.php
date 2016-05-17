<?php

use Illuminate\Database\Seeder;
use App\TipStudija;

class TipStudijaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipStudija = new TipStudija();

        $tipStudija->naziv = str_random(10);
        $tipStudija->skrNaziv = str_random(10);
        $tipStudija->indikatorAktivan = 1;

        $tipStudija->save();
    }
}
