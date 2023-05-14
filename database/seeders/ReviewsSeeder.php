<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewsSeeder extends Seeder
{
    public function run(Faker $faker): void
    {
        $count = 5;
        $reviews = [];
        for ($i = 1; $i <= $count; $i++) {
            $review = [
                'product_id' => 1,
                'user_id' => 1,
                'message' => $faker->realText(),
                'created_at' => Carbon::now()
            ];

            $reviews[] = $review;
        }

        DB::table('reviews')->insert($reviews);
    }
}
