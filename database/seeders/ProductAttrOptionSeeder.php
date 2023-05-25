<?php

namespace Database\Seeders;

use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class ProductAttrOptionSeeder extends Seeder
{
    public function run(Faker $faker): void
    {
        $options = [
            [
                'product_id' => 1,
                'name' => "Материал",
            ],
        ];

        \DB::table('product_attr_options')->insert($options);
    }
}
