<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class CategoryProductsSeeder extends Seeder
{
    public function run(Faker $faker): void
    {
        $count = 1;

        $categories = [];
        $j = 0;
        for ($i = 1; $i <= $count; $i++){
            $name = $faker->realText($faker->numberBetween(10, 20));
            $category = [
                'title' => $faker->realText($faker->numberBetween(10, 30)),
                'meta_keywords' => $faker->realText($faker->numberBetween(10, 30)),
                'meta_description' => $faker->realText($faker->numberBetween(50, 100)),
                'name_lavel' => 'h2',
                'name' => $i == 1 ? 'Разделочные доски' : $name,
                'slug' => Str::slug($name),
                'img_announce' => '',
                'img_detail' => '',
                'announce' => $faker->realText($faker->numberBetween(100, 300)),
                'description' => $faker->realText($faker->numberBetween(500, 1000)),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'parent_id' => null
            ];
            if ($i > 2){
                $category['parent_id'] = ++$j;
            }

//            $class = include 'templates/TemplateMetaSeeder.php';
//            $template = $class::template($faker, '', ['announce' => null, 'description' => null])();



            $categories[] = $category;
        }

        DB::table('categories_product')->insert($categories);
    }
}
