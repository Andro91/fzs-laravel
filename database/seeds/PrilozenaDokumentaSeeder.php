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
        $dokumentaPrva = array('Dokument za prvu godinu 1','Dokument za prvu godinu 2','Dokument za prvu godinu 3');
        $dokumentaDruga = array('Dokument za drugu godinu 1','Dokument za drugu godinu 2','Dokument za drugu godinu 3');

        foreach($dokumentaPrva as $dok){
            $dokument = new PrilozenaDokumenta();

            $dokument->naziv = $dok;
            $dokument->indGodina = "1";
            $dokument->redniBrojDokumenta = 1;

            $dokument->save();
        }

        foreach($dokumentaDruga as $dok){
            $dokument = new PrilozenaDokumenta();

            $dokument->naziv = $dok;
            $dokument->indGodina = "2";
            $dokument->redniBrojDokumenta = 1;

            $dokument->save();
        }

    }
}
