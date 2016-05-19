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
        $mesto = new \App\Mesto();

        $mesto->naziv = str_random(10);
        $mesto->opstina_id = 1;

        $mesto->save();
    }
}
