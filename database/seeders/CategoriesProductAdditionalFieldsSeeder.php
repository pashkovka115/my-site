<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoriesProductAdditionalFieldsSeeder extends Seeder
{
    public function run(): void
    {
        $properties = [];

        for ($i = 1; $i <= 5; $i++){
            $properties[] = [
                'category_id' => 1,
                'type' => 'type' . $i,
                'key' => 'Key' . $i,
                'value' => 'Value' . $i,
            ];
        }

        DB::table('categories_product_additional_fields')->insert($properties);
    }
}
