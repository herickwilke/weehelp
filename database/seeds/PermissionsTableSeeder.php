<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => '1',
                'title' => 'user_management_access',
            ],
            [
                'id'    => '2',
                'title' => 'permission_create',
            ],
            [
                'id'    => '3',
                'title' => 'permission_edit',
            ],
            [
                'id'    => '4',
                'title' => 'permission_show',
            ],
            [
                'id'    => '5',
                'title' => 'permission_delete',
            ],
            [
                'id'    => '6',
                'title' => 'permission_access',
            ],
            [
                'id'    => '7',
                'title' => 'role_create',
            ],
            [
                'id'    => '8',
                'title' => 'role_edit',
            ],
            [
                'id'    => '9',
                'title' => 'role_show',
            ],
            [
                'id'    => '10',
                'title' => 'role_delete',
            ],
            [
                'id'    => '11',
                'title' => 'role_access',
            ],
            [
                'id'    => '12',
                'title' => 'user_create',
            ],
            [
                'id'    => '13',
                'title' => 'user_edit',
            ],
            [
                'id'    => '14',
                'title' => 'user_show',
            ],
            [
                'id'    => '15',
                'title' => 'user_delete',
            ],
            [
                'id'    => '16',
                'title' => 'user_access',
            ],
            [
                'id'    => '17',
                'title' => 'chamado_create',
            ],
            [
                'id'    => '18',
                'title' => 'chamado_edit',
            ],
            [
                'id'    => '19',
                'title' => 'chamado_show',
            ],
            [
                'id'    => '20',
                'title' => 'chamado_delete',
            ],
            [
                'id'    => '21',
                'title' => 'chamado_access',
            ],
            [
                'id'    => '22',
                'title' => 'setor_create',
            ],
            [
                'id'    => '23',
                'title' => 'setor_edit',
            ],
            [
                'id'    => '24',
                'title' => 'setor_show',
            ],
            [
                'id'    => '25',
                'title' => 'setor_delete',
            ],
            [
                'id'    => '26',
                'title' => 'setor_access',
            ],
            [
                'id'    => '27',
                'title' => 'meus_chamado_access',
            ],
            [
                'id'    => '28',
                'title' => 'finalizado_access',
            ],
            [
                'id'    => '29',
                'title' => 'time_management_access',
            ],
            [
                'id'    => '30',
                'title' => 'time_work_type_create',
            ],
            [
                'id'    => '31',
                'title' => 'time_work_type_edit',
            ],
            [
                'id'    => '32',
                'title' => 'time_work_type_show',
            ],
            [
                'id'    => '33',
                'title' => 'time_work_type_delete',
            ],
            [
                'id'    => '34',
                'title' => 'time_work_type_access',
            ],
            [
                'id'    => '35',
                'title' => 'time_project_create',
            ],
            [
                'id'    => '36',
                'title' => 'time_project_edit',
            ],
            [
                'id'    => '37',
                'title' => 'time_project_show',
            ],
            [
                'id'    => '38',
                'title' => 'time_project_delete',
            ],
            [
                'id'    => '39',
                'title' => 'time_project_access',
            ],
            [
                'id'    => '40',
                'title' => 'time_entry_create',
            ],
            [
                'id'    => '41',
                'title' => 'time_entry_edit',
            ],
            [
                'id'    => '42',
                'title' => 'time_entry_show',
            ],
            [
                'id'    => '43',
                'title' => 'time_entry_delete',
            ],
            [
                'id'    => '44',
                'title' => 'time_entry_access',
            ],
            [
                'id'    => '45',
                'title' => 'time_report_create',
            ],
            [
                'id'    => '46',
                'title' => 'time_report_edit',
            ],
            [
                'id'    => '47',
                'title' => 'time_report_show',
            ],
            [
                'id'    => '48',
                'title' => 'time_report_delete',
            ],
            [
                'id'    => '49',
                'title' => 'time_report_access',
            ],
            [
                'id'    => '50',
                'title' => 'status_chamado_create',
            ],
            [
                'id'    => '51',
                'title' => 'status_chamado_edit',
            ],
            [
                'id'    => '52',
                'title' => 'status_chamado_show',
            ],
            [
                'id'    => '53',
                'title' => 'status_chamado_delete',
            ],
            [
                'id'    => '54',
                'title' => 'status_chamado_access',
            ],
            [
                'id'    => '55',
                'title' => 'administrador_access',
            ],
            [
                'id'    => '56',
                'title' => 'prioridade_chamado_create',
            ],
            [
                'id'    => '57',
                'title' => 'prioridade_chamado_edit',
            ],
            [
                'id'    => '58',
                'title' => 'prioridade_chamado_show',
            ],
            [
                'id'    => '59',
                'title' => 'prioridade_chamado_delete',
            ],
            [
                'id'    => '60',
                'title' => 'prioridade_chamado_access',
            ],
            [
                'id'    => '61',
                'title' => 'parametro_create',
            ],
            [
                'id'    => '62',
                'title' => 'parametro_edit',
            ],
            [
                'id'    => '63',
                'title' => 'parametro_show',
            ],
            [
                'id'    => '64',
                'title' => 'parametro_delete',
            ],
            [
                'id'    => '65',
                'title' => 'parametro_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
