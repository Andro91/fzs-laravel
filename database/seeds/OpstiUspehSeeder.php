<?php

use Illuminate\Database\Seeder;

class OpstiUspehSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $opstiUspeh = array('Одличан','Врло добар', 'Добар','Довољан','Недовољан');

        foreach($opstiUspeh as $element){
            $uspeh = new \App\OpstiUspeh();

            $uspeh->naziv = $element;

            $uspeh->save();
        }

    }
}
