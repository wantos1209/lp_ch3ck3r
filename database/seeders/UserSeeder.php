<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Administrator',
                'username' => 'admin',
                'password' => Hash::make('admin123'),
                'isadmin' => true,
                'area_id' => null
            ],
            [
                'name' => 'Ujang',
                'username' => 'ujang',
                'password' => Hash::make('ujang123'),
                'isadmin' => false,
                'area_id' => 1
            ],
            [
                'name' => 'Dono',
                'username' => 'dono',
                'password' => Hash::make('dono123'),
                'isadmin' => false,
                'area_id' => 2
            ],
        ];

        User::insert($users);
    }
}
