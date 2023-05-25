<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class usertableseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Datauser = [
            [
                'nama' => 'SuperAdmin',
                'password' => '123456',
                'role' => 'superAdmin'
            ],
            [
                'nama' => 'Admin',
                'password' => '123456',
                'role' => 'admin'
            ],
            [
                'nama' => 'User',
                'password' => '123456',
                'role' => 'user'
            ],
        ];

        
    }
}
