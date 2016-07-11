<?php

use Illuminate\Database\Seeder;

class SkolskaGodinaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $skolskeGodine = array('2016/2017','2017/2018','2018/2019', '2019/2020', '2020/2021', '2021/2022', '2022/2023');

        foreach ($skolskeGodine as $godina) {
            $skolskaGodina = new \App\SkolskaGodUpisa();

            $skolskaGodina->naziv = $godina;

            $skolskaGodina->save();
        }

    }
}
