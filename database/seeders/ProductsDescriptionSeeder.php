<?php

namespace Database\Seeders;

use App\Models\Product\Product;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class ProductsDescriptionSeeder extends Seeder
{
    public function run(Faker $faker): void
    {
        $ids = Product::all('id');
        $ids = array_keys($ids->keyBy('id')->toArray());

        $products = [];

        foreach ($ids as $id) {
            $name = $faker->realText($faker->numberBetween(10, 20));

            $products[] = [
                'product_id' => $id,
                'language_id' => 1,
                'title' => 'Русский ' . $faker->realText($faker->numberBetween(10, 30)),
                'meta_keywords' => 'Русский ' . $faker->realText($faker->numberBetween(10, 30)),
                'meta_description' => 'Русский ' . $faker->realText($faker->numberBetween(50, 100)),
                'name' => 'Русский ' . $name,
                'slug' => Str::slug('Русский ' . $name),
                'announce' => 'Русский ' . $faker->realText($faker->numberBetween(100, 300)),
                'description' => 'Русский ' . $faker->realText($faker->numberBetween(500, 1000)),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
            $products[] = [
                'product_id' => $id,
                'language_id' => 2,
                'title' => 'English ' . $faker->realText($faker->numberBetween(10, 30)),
                'meta_keywords' => 'English ' . $faker->realText($faker->numberBetween(10, 30)),
                'meta_description' => 'English ' . $faker->realText($faker->numberBetween(50, 100)),
                'name' => 'English ' . $name,
                'slug' => Str::slug('English ' . $name),
                'announce' => 'English ' . $faker->realText($faker->numberBetween(100, 300)),
                'description' => 'English ' . $faker->realText($faker->numberBetween(500, 1000)),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }


        DB::table('products_description')->insert($products);
    }
}
