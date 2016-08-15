<?php

use Illuminate\Database\Seeder;

class ProfesorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $profesor = new \App\Profesor();

        $profesor->jmbg = '3005987970017';
        $profesor->ime = 'Петар';
        $profesor->prezime = 'Петровић';
        $profesor->telefon = '0606124039';
        $profesor->zvanje = 'др';
        $profesor->kabinet = '101';
        $profesor->indikatorAktivan = 1;
        $profesor->status_id = 2;

        $profesor->save();
    }
}
