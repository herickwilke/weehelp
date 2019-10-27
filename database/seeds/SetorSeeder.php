<?php

use App\Setor;
use Illuminate\Database\Seeder;

class SetorSeeder extends Seeder
{
    public function run()
    {
        $setores = [
            [
                'id'             => '1',
                'nome'           => 'Desenvolvimento',
                'descricao'      => 'Setor encarregado do desenvolvimento de soluções.',
               ],

               [
                'id'             => '2',
                'nome'           => 'Suporte',
                'descricao'      => 'Setor encarregado de prestar suporte ao usuário.',
               ],

               [
                'id'             => '3',
                'nome'           => 'Comercial',
                'descricao'      => 'Setor encarregado de negociar com clientes.',
               ],
        ];

        Setor::insert($setores);
    }
}
