<?php

use Illuminate\Database\Seeder;

class MestoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gradoviSrbije = array('Београд', 'Нови Сад', 'Ниш', 'Приштина', 'Крагујевац', 'Лесковац', 'Суботица', 'Зрењанин', 'Панчево', 'Чачак', 'Нови Пазар', 'Краљево', 'Смедерево', 'Ваљево', 'Крушевац', 'Врање', 'Шабац', 'Ужице', 'Сомбор', 'Пожаревац', 'Зајечар', 'Сремска Митровица', 'Јагодина', 'Лозница');

        foreach ($gradoviSrbije as $grad) {
            $mesto = new \App\Mesto();

            $mesto->naziv = $grad;
            $mesto->opstina_id = 1;

            $mesto->save();
        }
    }
}
