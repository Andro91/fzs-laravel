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
        $srednjeSkoleFakulteti = new \App\SrednjeSkoleFakulteti();

        $srednjeSkoleFakulteti->naziv = str_random(10);
        $srednjeSkoleFakulteti->indSkoleFakulteta = 1;

        $srednjeSkoleFakulteti->save();
    }
}
