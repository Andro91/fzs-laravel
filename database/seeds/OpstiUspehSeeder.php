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
        $opstiUspeh = array('Odličan','Vrlo dobar', 'Dobar','Dovoljan','Nedovoljan');

        foreach($opstiUspeh as $element){
            $uspeh = new \App\OpstiUspeh();

            $uspeh->naziv = $element;

            $uspeh->save();
        }

    }
}
