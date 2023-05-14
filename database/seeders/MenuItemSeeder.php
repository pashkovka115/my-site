<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuItemSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [ // 1
                'parent_id' => 0,
                'menu_id' => 1,
                'name' => 'Главная',
                'slug' => '/',
            ],
            [ // 2
                'parent_id' => 0,
                'menu_id' => 1,
                'name' => 'Контакты',
                'slug' => 'contacts',
            ],
        ];

        \DB::table('menuitem')->insert($items);
    }
}
