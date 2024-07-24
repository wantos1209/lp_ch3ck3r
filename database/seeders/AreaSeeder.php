<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $area = [
            ['nama' => 'batam kota'],
            ['nama' => 'batu ampar'],
            ['nama' => 'belakang padang'],
            ['nama' => 'bulang'],
            ['nama' => 'galang'],
            ['nama' => 'lubuk baja'],
            ['nama' => 'nongsa'],
            ['nama' => 'sagulung'],
            ['nama' => 'seibeduk'],
            ['nama' => 'sekupang'],
            ['nama' => 'batu aji'],
            ['nama' => 'bengkong'],
            ['nama' => 'sungai beduk'],
            ['nama' => 'belakang padang'],
        ];

        Area::insert($area);
    }
}
