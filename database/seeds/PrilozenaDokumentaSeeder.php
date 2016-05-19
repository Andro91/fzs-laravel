<?php

use Illuminate\Database\Seeder;
use App\PrilozenaDokumenta;

class PrilozenaDokumentaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dokumenta = array('Izvod iz maticne knjige rodjenih','dokument','3 fotografije');

        foreach($dokumenta as $dok){
            $dokument = new PrilozenaDokumenta();

            $dokument->naziv = $dok;
            $dokument->indGodina = "1";
            $dokument->redniBrojDokumenta = 1;

            $dokument->save();
        }

    }
}
