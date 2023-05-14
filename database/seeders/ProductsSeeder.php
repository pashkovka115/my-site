<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class ProductsSeeder extends Seeder
{
    public function run(Faker $faker): void
    {
        $count = 10;

        $products = [];

        $products[] = [
            'name' => 'Ковёр',
            'slug' => Str::slug('Ковёр'),
            'description' => 'Классный ковер',
            'name_lavel' => 'h2',
            'category_id' => 1,
            'announce' => $faker->realText($faker->numberBetween(100, 300)),
            'price' => $price = $faker->numberBetween(1200, 3000),
            'old_price' => $price + random_int(100, 900),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];

        $products[] = [
            'name' => 'Чашка',
            'slug' => Str::slug('Чашка'),
            'description' => 'Кофейная чашка',
            'name_lavel' => 'h2',
            'category_id' => 1,
            'announce' => $faker->realText($faker->numberBetween(100, 300)),
            'price' => $price = $faker->numberBetween(1200, 3000),
            'old_price' => $price + random_int(100, 900),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];


        for ($i = 1; $i <= $count; $i++){
            $name = $faker->realText($faker->numberBetween(10, 20));
            $products[] = [
                'name' => $name,
                'slug' => Str::slug($name),
                'description' => 'Кофейная чашка',
                'name_lavel' => 'h2',
                'category_id' => 1,
                'announce' => $faker->realText($faker->numberBetween(100, 300)),
                'price' => $price = $faker->numberBetween(1200, 3000),
                'old_price' => $price + random_int(100, 900),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];

        }

        DB::table('products')->insert($products);
    }
}
