<?php

use Illuminate\Database\Seeder;

class StudijskiProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $studijskiProgram = new \App\StudijskiProgram();

        $studijskiProgram->naziv = str_random(10);
        $studijskiProgram->skrNazivStudijskogPrograma = str_random(10);
        $studijskiProgram->tipStudija_id = 2;
        $studijskiProgram->indikatorAktivan = 1;

        $studijskiProgram->save();
    }
}
