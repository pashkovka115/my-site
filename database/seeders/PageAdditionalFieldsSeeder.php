<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PageAdditionalFieldsSeeder extends Seeder
{
    public function run(): void
    {
        $properties = [
            [
                'page_id' => 1,
                'name' => 'Адрес',
                'type' => 'contacts',
                'key' => 'address',
                'value' => 'Краснодарский край, Краснодар...',
            ],
            [
                'page_id' => 1,
                'name' => 'Телефон',
                'type' => 'contacts',
                'key' => 'phone',
                'value' => '<a href="tel:+8801234 567 890">+8801234 567 890</a>
								<a href="tel:+8801234 567 890">+8801234 567 890</a>',
            ],
            [
                'page_id' => 1,
                'name' => 'Web',
                'type' => 'contacts',
                'key' => 'web',
                'value' => '<a href="mailto:info@example.com">info@example.com</a>
								<a href="mailto:www.example.com">www.example.com</a>',
            ],
            [
                'page_id' => 1,
                'name' => 'Заголовок формы',
                'type' => 'contacts',
                'key' => 'form_title',
                'value' => 'Напишите нам!',
            ],
            [
                'page_id' => 1,
                'name' => 'Комментарий к форме',
                'type' => 'contacts',
                'key' => 'form_brief',
                'value' => 'Не откладывай на завтра.',
            ],
        ];

        DB::table('page_additional_fields')->insert($properties);
    }
}
