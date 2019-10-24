<?php

use App\PrioridadeChamado;
use Illuminate\Database\Seeder;

class PrioridadeSeeder extends Seeder
{
    public function run()
    {
        $prioridades = [
            [
                'id'             => '1',
                'prioridade'     => 'Baixa',
                'descricao'      => 'O prazo de entrega pode ser combinado.',
               ],

               [
                'id'             => '2',
                'prioridade'     => 'Média',
                'descricao'      => 'Próxima entrega.',
               ],

               [
                'id'             => '3',
                'prioridade'     => 'Alta',
                'descricao'      => 'Entregar assim que possível.',
               ],

               [
                'id'             => '4',
                'prioridade'     => 'Urgente',
                'descricao'      => 'Passar projeto a frente.',
               ],
        ];

        PrioridadeChamado::insert($prioridades);
    }
}
