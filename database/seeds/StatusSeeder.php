<?php

use App\StatusChamado;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    public function run()
    {
        $status = [
            [
                'id'             => '1',
                'status'         => 'Pendente',
                'descricao'      => 'Chamado ainda pendente de atendimento.',
               ],

               [
                'id'             => '2',
                'status'     => 'Em andamento',
                'descricao'      => 'O chamado está sendo resolvido.',
               ],

               [
                'id'             => '3',    
                'status'     => 'Congelado',
                'descricao'      => 'Solicitação foi pausada para em algum momento ser continuada.',
               ],
        ];

        StatusChamado::insert($status);
    }
}
