<?php

namespace Database\Seeders;

use App\Models\CategoryProduct\CategoryProduct;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuItemSeeder extends Seeder
{
    public function run(): void
    {
        $cat = CategoryProduct::first();

        $items = [
            [ // 1
                'parent_id' => 0,
                'menu_id' => 1,
                'name' => 'Главная',
                'slug' => '/',
            ],
            /*[ // 2
                'parent_id' => 0,
                'menu_id' => 1,
                'name' => $cat->name,
                'slug' => '/category/' . $cat->slug,
            ],*/
            [ // 3
                'parent_id' => 0,
                'menu_id' => 1,
                'name' => 'Контакты',
                'slug' => 'contacts',
            ],
            [ // 4
                'parent_id' => 0,
                'menu_id' => 1,
                'name' => 'Доставка и оплата',
                'slug' => 'shipping-and-payment',
            ],
        ];

        \DB::table('menuitem')->insert($items);
    }
}
