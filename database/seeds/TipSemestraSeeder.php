<?php

use Illuminate\Database\Seeder;

class TipSemestraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tip = array('летњи', 'зимски');

        foreach ($tip as $t) {
            $tip= new \App\TipSemestra();

            $tip->naziv = $t;
            $tip->indikatorAktivan = 1;

            $tip->save();
        }
    }
}
