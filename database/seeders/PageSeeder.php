<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageSeeder extends Seeder
{
    public function run(Faker $faker): void
    {
        $pages = [];
        $pages[] = [
            'title' => 'Доставка и оплата',
            'name' => 'Доставка и оплата',
            'slug' => 'shipping-and-payment',
            'description' => '<h4>Доставка по РФ осуществляется различными способами:</h4>
<ul>
<li>Самовывоз из Мастерской</li>
<li>Транспортная компания СДЭК</li>
<li>Траспортная компания БОКСБЕРРИ</li>
<li>Почта России</li>
</ul>',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];

        DB::table('pages')->insert($pages);
    }
}
