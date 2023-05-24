<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        $tabs = [
            [
                'name' => 'Общее',
                'sort' =>10,
            ],
            [
                'name' => 'SEO',
                'sort' =>20,
            ],
        ];

        DB::table('categories_product_tabs')->insert($tabs);


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
                'description' => '',
            ],
            [
                'origin_name' => 'title',
                'show_name' => 'Заголовок окна (title)',
                'sort_list' => 50,
                'sort_single' => 210,
                'is_show_anons' => 0,
                'is_show_single' => 1,
                'type' => 'string',
                'tab_id' => 2,
                'description' => '',
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
                'description' => '',
            ],
            [
                'origin_name' => 'name_lavel',
                'show_name' => 'Уровень заголовка',
                'sort_list' => 50,
                'sort_single' => 220,
                'is_show_anons' => 0,
                'is_show_single' => 1,
                'type' => 'select.name_lavel',
                'tab_id' => 2,
                'description' => '',
            ],
            [
                'origin_name' => 'slug',
                'show_name' => 'Алиас',
                'sort_list' => 50,
                'sort_single' => 40,
                'is_show_anons' => 1,
                'is_show_single' => 1,
                'type' => 'string',
                'tab_id' => 2,
                'description' => '',
            ],
            [
                'origin_name' => 'meta_keywords',
                'show_name' => 'meta keywords',
                'sort_list' => 50,
                'sort_single' => 230,
                'is_show_anons' => 0,
                'is_show_single' => 1,
                'type' => 'string',
                'tab_id' => 2,
                'description' => '',
            ],
            [
                'origin_name' => 'meta_description',
                'show_name' => 'meta description',
                'sort_list' => 50,
                'sort_single' => 240,
                'is_show_anons' => 0,
                'is_show_single' => 1,
                'type' => 'text_not_editor',
                'tab_id' => 2,
                'description' => '',
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
                'description' => '',
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
                'description' => '',
            ],
            [
                'origin_name' => 'parent_id',
                'show_name' => 'Родительская категория',
                'sort_list' => 10,
                'sort_single' => 1,
                'is_show_anons' => 0,
                'is_show_single' => 1,
                'type' => 'select.all_categories_but_not_self',
                'tab_id' => 1,
                'description' => '',
            ],
            [
                'origin_name' => 'is_show',
                'show_name' => 'Видимость',
                'sort_list' => 10,
                'sort_single' => 10,
                'is_show_anons' => 0,
                'is_show_single' => 1,
                'type' => 'is_show',
                'tab_id' => 1,
                'description' => '',
            ],
        ];

        DB::table('categories_product_columns')->insert($fields);

    }


    public function down(): void
    {
        DB::table('categories_product_columns')->truncate();
        DB::table('categories_product_tabs')->truncate();
    }
};
