<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoriesProductTabsSeeder extends Seeder
{
    public function run(): void
    {
        $fields = [
            [
                'name' => 'Общее',
            ],
            [
                'name' => 'Свойства',
            ],
            [
                'name' => 'Третий таб',
            ],
        ];

        DB::table('categories_product_tabs')->insert($fields);
    }
}
