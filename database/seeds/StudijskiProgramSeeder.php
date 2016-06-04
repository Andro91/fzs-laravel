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
        $studijskiProgrami = array('Menadžment u sportu','Trener u sportu','Sportsko novinarstvo');


        foreach ($studijskiProgrami as $program) {

            $studijskiProgram = new \App\StudijskiProgram();

            $studijskiProgram->naziv = $program;
            $studijskiProgram->skrNazivStudijskogPrograma = $program;
            $studijskiProgram->tipStudija_id = 2;
            $studijskiProgram->indikatorAktivan = 1;

            $studijskiProgram->save();
        }


    }
}
