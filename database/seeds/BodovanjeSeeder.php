<?php

use Illuminate\Database\Seeder;

class BodovanjeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ocene = array('Одличан', 'Добар', 'Задовољавајућ');

        foreach ($ocene as $o) {
            $ocena= new \App\Bodovanje();

            $ocena->opisnaOcena = $o;
            $ocena->poeniMin = 55;
            $ocena->poeniMax = 100;
            $ocena->ocena = 8;
            $ocena->indikatorAktivan = 1;

            $ocena->save();
        }
    }
}
