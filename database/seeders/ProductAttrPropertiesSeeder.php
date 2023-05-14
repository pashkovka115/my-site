<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProductAttrPropertiesSeeder extends Seeder
{
    public function run(Faker $faker): void
    {
        $properties = [];

        for ($i = 1; $i <= 10; $i++){
            $product_id = random_int(1, 2);
            $properties[] = [
                'product_id' => $product_id,
                'name' => "Свойство $i",
                'value' => "Значение $i, товара $product_id",
            ];
        }

        \DB::table('product_attr_properties')->insert($properties);
    }
}
