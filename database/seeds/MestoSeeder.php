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
        $gradoviSrbije = array('Beograd', 'Novi Sad', 'Niš', 'Priština', 'Kragujevac', 'Leskovac', 'Subotica', 'Zrenjanin', 'Pancevo', 'Cacak', 'Novi Pazar', 'Kraljevo', 'Smederevo', 'Valjevo', 'Kruševac', 'Vranje', 'Šabac', 'Užice', 'Sombor', 'Požarevac', 'Zajecar', 'Sremska Mitrovica', 'Jagodina', 'Loznica');

        foreach ($gradoviSrbije as $grad) {
            $mesto = new \App\Mesto();

            $mesto->naziv = $grad;
            $mesto->opstina_id = 1;

            $mesto->save();
        }
    }
}
