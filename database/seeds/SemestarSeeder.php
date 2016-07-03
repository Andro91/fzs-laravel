<?php

use Illuminate\Database\Seeder;
use App\Semestar;

class SemestarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $semestri = array('Први', 'Други', 'Трећи', 'Четврти', 'Пети');

        foreach ($semestri as $s) {
            $semestar= new Semestar();

            $semestar->naziv = $s;
            $semestar->indikatorAktivan = 1;

            $semestar->save();
        }
    }
}
