<?php

use App\TimeProject;
use Illuminate\Database\Seeder;

class ProjetoSeeder extends Seeder
{
    public function run()
    {
        $projetos = [
            [
                'id'             => '1',
                'name'           => 'Business',
               ],

               [
                'id'             => '2',
                'name'           => 'WeeHealth',
               ],

               [
                'id'             => '3',
                'name'           => 'WeeForms',
               ],
        ];

        TimeProject::insert($projetos);
    }
}
