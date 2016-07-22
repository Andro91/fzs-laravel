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
        $dokumentaPrva = array('Диплома о завршено средњој школи','Сведочанства из средње школе (све четири године)',
            'Извод из матичне књиге рођених', '3 фотографије');
        $dokumentaDruga = array('Диплома о завршеној високој школи','Уверење о положеним испитима','Извод из матичне књиге рођених',
            '3 фотографије');

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
