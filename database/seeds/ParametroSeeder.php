<?php

use App\Parametro;
use Illuminate\Database\Seeder;

class ParametroSeeder extends Seeder
{
    public function run()
    {
        $parametro = [
            [
                'id'             => '1',
                'parametro'      => 'Parâmetro do Sistema',
                'valor'          => '120',
                'descricao'      => 'Parâmetro default',
                'notif_email'    => 1,
            ],
        ];

        Parametro::insert($parametro);
    }
}
