<?php

use Illuminate\Database\Seeder;
use App\Sport;

class SportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sportovi = array('Амерички фудбал', 'Аустралијски фудбал', 'Бејзбол', 'Баскијска пелота', 'Канадски фудбал',
            'Крикет', 'Карлинг', 'Кошарка', 'Одбојка', 'Пејнтбол', 'Пентак', 'Поло', 'Рукомет', 'Рагби', 'Софтбол',
            'Фаутсал', 'Флорбол', 'Фудбал', 'Футсал', 'Хокеј', 'Хокеј на трави', 'Хурлинг', 'Хокеј на леду',
            'Хокеј на ролерима');

        foreach ($sportovi as $s) {
            $sport = new Sport();

            $sport->naziv = $s;
            $sport->indikatorAktivan = 1;

            $sport->save();
        }


    }
}
