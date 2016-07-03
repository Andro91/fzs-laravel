<?php

use Illuminate\Database\Seeder;

class OblikNastaveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $oblici = array('Први облик', 'Други облик', 'Трећи облик');

        foreach ($oblici as $o) {
            $oblik= new \App\OblikNastave();

            $oblik->naziv = $o;
            $oblik->indikatorAktivan = 1;

            $oblik->save();
        }
    }
}
