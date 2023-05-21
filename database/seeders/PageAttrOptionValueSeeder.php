<?php

namespace Database\Seeders;

use App\Models\Page\Attributes\Option;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class PageAttrOptionValueSeeder extends Seeder
{
    public function run(Faker $faker): void
    {
        $values = [];

        for ($i = 1; $i <= 5; $i++){
            $option_id = Option::query()->inRandomOrder()->value('id');
            $values[] = [
                'name' => "Значение $i опции $option_id",
                'option_id' => $option_id
            ];
        }

        \DB::table('page_attr_values')->insert($values);
    }
}
