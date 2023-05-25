<?php

namespace Database\Seeders;

use App\Models\Product\Attributes\Option;
use App\Models\Product\Attributes\Value;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class ProductAttrOptionValueSeeder extends Seeder
{
    public function run(Faker $faker): void
    {
        $values = [
            [
                'name' => "Ясень",
                'option_id' => 1
            ],
            [
                'name' => "Дуб",
                'option_id' => 1
            ],
            [
                'name' => "Абрикос",
                'option_id' => 1
            ],
        ];

        \DB::table('product_attr_values')->insert($values);
    }
}
