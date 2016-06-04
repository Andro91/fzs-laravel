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
        $skole = array('skola1','skola2','skola3','skola4','skola5');

        foreach ($skole as $skola) {
            $srednjeSkoleFakulteti = new \App\SrednjeSkoleFakulteti();

            $srednjeSkoleFakulteti->naziv = $skola;
            $srednjeSkoleFakulteti->indSkoleFakulteta = 1;

            $srednjeSkoleFakulteti->save();
        }
    }
}
