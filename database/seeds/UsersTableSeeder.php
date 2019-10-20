<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => '$2y$10$JC8O6oiFerstIirGJLHB3.pMrpdMRwYYU4RlUvt97PLErvAahcHIe',
                'remember_token' => null,
            ],
        ];

        User::insert($users);
    }
}
