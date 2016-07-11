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
        $i = 0;

        $oblici = array('предавања', 'вежбе', 'други облик наставе');
        $skr = array('П', 'В', 'ДОН');

        foreach ($oblici as $o) {
            $oblik= new \App\OblikNastave();

            $oblik->naziv = $o;
            $oblik->skrNaziv = $skr[$i];
            $oblik->indikatorAktivan = 1;
            $i++;

            $oblik->save();
        }
    }
}
