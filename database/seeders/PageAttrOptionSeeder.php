<?php

namespace Database\Seeders;

use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class PageAttrOptionSeeder extends Seeder
{
    public function run(Faker $faker): void
    {
        $options = [];

        for ($i = 1; $i <= 2; $i++){
            $options[] = [
                'page_id' => 1,
                'name' => "Опция $i",
            ];
        }

        \DB::table('page_attr_options')->insert($options);
    }
}
