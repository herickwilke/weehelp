<?php

use App\TimeWorkType;
use Illuminate\Database\Seeder;

class TipoTarefaSeeder extends Seeder
{
    public function run()
    {
        $tipotarefa = [
            [
                'id'           => '1',
                'name'         => 'Desenvolvimento',
               ],

               [
                'id'            => '2',
                'name'          => 'Análise',
               ],

               [
                'id'             => '3',    
                'name'           => 'Suporte',
               ],

               [
                'id'             => '4',
                'name'           => 'Estudo',
               ],
        ];

        TimeWorkType::insert($tipotarefa);
    }
}
