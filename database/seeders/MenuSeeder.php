<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        $menus = [
            ['name' => 'Верхнее меню'],
            ['name' => 'Меню 2'],
        ];

        \DB::table('menu')->insert($menus);
    }
}
