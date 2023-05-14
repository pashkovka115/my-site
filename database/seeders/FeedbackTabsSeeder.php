<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class FeedbackTabsSeeder extends Seeder
{
    public function run(): void
    {
        $fields = [
            [
                'name' => 'Общее',
            ],
            [
                'name' => 'Свойства',
            ],
        ];

        DB::table('feedback_tabs')->insert($fields);
    }
}
