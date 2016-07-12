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
        $dokumentaPrva = array('Документ за прву годину 1','Документ за прву годину 2','Документ за прву годину 3');
        $dokumentaDruga = array('Документ за прву годину 1','Документ за прву годину 2','Документ за прву годину 3');

        foreach($dokumentaPrva as $dok){
            $dokument = new PrilozenaDokumenta();

            $dokument->naziv = $dok;
            $dokument->skolskaGodina_id = "1";
            $dokument->redniBrojDokumenta = 1;

            $dokument->save();
        }

        foreach($dokumentaDruga as $dok){
            $dokument = new PrilozenaDokumenta();

            $dokument->naziv = $dok;
            $dokument->skolskaGodina_id = "2";
            $dokument->redniBrojDokumenta = 1;

            $dokument->save();
        }

    }
}
