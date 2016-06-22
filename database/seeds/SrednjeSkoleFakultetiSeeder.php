<?php

use Illuminate\Database\Seeder;

class SrednjeSkoleFakultetiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $skole = array('Школа 1','Школа 2','Школа 3','Школа 4','Школа 5');

        foreach ($skole as $skola) {
            $srednjeSkoleFakulteti = new \App\SrednjeSkoleFakulteti();

            $srednjeSkoleFakulteti->naziv = $skola;
            $srednjeSkoleFakulteti->indSkoleFakulteta = 1;

            $srednjeSkoleFakulteti->save();
        }
    }
}
