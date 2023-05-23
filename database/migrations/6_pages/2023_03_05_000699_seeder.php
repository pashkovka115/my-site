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
            ],
            [
                'name' => 'SEO',
            ],
        ];

        DB::table('pages_tabs')->insert($tabs);

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
                'tab_id' => 2,
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
                'type' => 'select.name_lavel',
                'tab_id' => 2,
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
                'origin_name' => 'meta_keywords',
                'show_name' => 'meta keywords',
                'sort_list' => 50,
                'sort_single' => 230,
                'is_show_anons' => 0,
                'is_show_single' => 1,
                'type' => 'string',
                'tab_id' => 2,
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
                'origin_name' => 'is_show',
                'show_name' => 'Видимость',
                'sort_list' => 10,
                'sort_single' => 10,
                'is_show_anons' => 0,
                'is_show_single' => 1,
                'type' => 'is_show',
                'tab_id' => 1
            ]
        ];

        DB::table('pages_columns')->insert($fields);

    }


    public function down(): void
    {
        DB::table('pages_columns')->truncate();
        DB::table('pages_tabs')->truncate();
    }
};
