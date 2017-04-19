<?php

use Illuminate\Database\Seeder;

class CupomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++)
            DB::table('tb_cupom')->insert([
                'id_cupom'          => null,
                'dt_maximo_cupom'   => '2017-05-05',
                'cd_cupom'          => str_random(10),
                'id_parceiro'       => 1
            ]);
    }
}
