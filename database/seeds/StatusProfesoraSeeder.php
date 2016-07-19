<?php

use Illuminate\Database\Seeder;

class StatusProfesoraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statusi = array('редован', 'ванредан', 'асистент', 'доцент');

        foreach ($statusi as $s) {
            $status= new \App\StatusProfesora();

            $status->naziv = $s;

            $status->indikatorAktivan = 1;

            $status->save();
        }
    }
}
