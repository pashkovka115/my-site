<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoriesProductColumnsSeeder extends Seeder
{
    public function run(): void
    {
       /* $class = include 'templates/TemplateTableColumnsSeeder.php';
        $fields = $class::template()();*/
        $fields = [
            [
                'origin_name' => 'id',
                'show_name' => 'ID',
                'sort_list' => 50,
                'sort_single' => 10,
                'is_show_anons' => 1,
                'is_show_single' => 0,
                'type' => 'id',
                'tab_id' => 1,
            ],
            [
                'origin_name' => 'title',
                'show_name' => 'Заголовок окна (title)',
                'sort_list' => 50,
                'sort_single' => 210,
                'is_show_anons' => 0,
                'is_show_single' => 1,
                'type' => 'string',
                'tab_id' => 5,
            ],
            [
                'origin_name' => 'name',
                'show_name' => 'Название<br> (заголовок страницы)',
                'sort_list' => 50,
                'sort_single' => 10,
                'is_show_anons' => 1,
                'is_show_single' => 1,
                'type' => 'string',
                'tab_id' => 1,
            ],
            [
                'origin_name' => 'name_lavel',
                'show_name' => 'Уровень заголовка',
                'sort_list' => 50,
                'sort_single' => 220,
                'is_show_anons' => 0,
                'is_show_single' => 1,
                'type' => 'name_lavel',
                'tab_id' => 5,
            ],
            [
                'origin_name' => 'slug',
                'show_name' => 'Алиас',
                'sort_list' => 50,
                'sort_single' => 40,
                'is_show_anons' => 1,
                'is_show_single' => 1,
                'type' => 'string',
                'tab_id' => 5,
            ],
            [
                'origin_name' => 'announce',
                'show_name' => 'Анонс',
                'sort_list' => 50,
                'sort_single' => 50,
                'is_show_anons' => 1,
                'is_show_single' => 1,
                'type' => 'text',
                'tab_id' => 1,
            ],
            [
                'origin_name' => 'img_announce',
                'show_name' => 'Изображение в анонсе',
                'sort_list' => 50,
                'sort_single' => 60,
                'is_show_anons' => 0,
                'is_show_single' => 1,
                'type' => 'img',
                'tab_id' => 1,
            ],
            [
                'origin_name' => 'description',
                'show_name' => 'Детальное описание',
                'sort_list' => 50,
                'sort_single' => 70,
                'is_show_anons' => 0,
                'is_show_single' => 1,
                'type' => 'text',
                'tab_id' => 1,
            ],
            [
                'origin_name' => 'additional_fields',
                'show_name' => 'Дополнительные поля',
                'sort_list' => 50,
                'sort_single' => 140,
                'is_show_anons' => 0,
                'is_show_single' => 1,
                'type' => 'additional_fields',
                'tab_id' => 3,
            ],
            [
                'origin_name' => 'img_detail',
                'show_name' => 'Изображение в детальном описании',
                'sort_list' => 50,
                'sort_single' => 80,
                'is_show_anons' => 0,
                'is_show_single' => 1,
                'type' => 'img',
                'tab_id' => 1,
            ],
            [
                'origin_name' => 'gallery',
                'show_name' => 'Галерея изображений',
                'sort_list' => 50,
                'sort_single' => 90,
                'is_show_anons' => 0,
                'is_show_single' => 1,
                'type' => 'img_gallery',
                'tab_id' => 1,
            ],
            [
                'origin_name' => 'meta_keywords',
                'show_name' => 'meta keywords',
                'sort_list' => 50,
                'sort_single' => 230,
                'is_show_anons' => 0,
                'is_show_single' => 1,
                'type' => 'string',
                'tab_id' => 5,
            ],
            [
                'origin_name' => 'meta_description',
                'show_name' => 'meta description',
                'sort_list' => 50,
                'sort_single' => 240,
                'is_show_anons' => 0,
                'is_show_single' => 1,
                'type' => 'text',
                'tab_id' => 5,
            ],
            [
                'origin_name' => 'created_at',
                'show_name' => 'Время создания',
                'sort_list' => 50,
                'sort_single' => 100,
                'is_show_anons' => 0,
                'is_show_single' => 0,
                'type' => 'date',
                'tab_id' => 1,
            ],
            [
                'origin_name' => 'updated_at',
                'show_name' => 'Время обновления',
                'sort_list' => 50,
                'sort_single' => 110,
                'is_show_anons' => 0,
                'is_show_single' => 0,
                'type' => 'date',
                'tab_id' => 1,
            ],
            [
                'origin_name' => 'parent_id',
                'show_name' => 'Родительская категория',
                'sort_list' => 10,
                'sort_single' => 10,
                'is_show_anons' => 0,
                'is_show_single' => 1,
                'type' => 'select.all_categories_but_not_self',
                'tab_id' => 1
            ],
        ];

        DB::table('categories_product_columns')->insert($fields);
    }
}
