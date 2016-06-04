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
        $tipoviStudija = array('Osnovne studije', 'Master Studije', 'Doktorske Studije');

        foreach ($tipoviStudija as $tip) {
            $tipStudija = new TipStudija();

            $tipStudija->naziv = $tip;
            $tipStudija->skrNaziv = $tip;
            $tipStudija->indikatorAktivan = 1;

            $tipStudija->save();
        }


    }
}
