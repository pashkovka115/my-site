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
                'name' => 'Связи',
            ],
            [
                'name' => 'SEO',
            ],
        ];

        DB::table('pages_tabs')->insert($tabs);


        /*$class = include base_path('database/seeders/templates/TemplateTableColumnsSeeder.php');
        $fields = $class::template()();
        // Всего 3 вкладки
        foreach ($fields as $key => $field){
            if ($field['tab_id'] > 3){
                $fields[$key]['tab_id'] = 3;
            }
        }*/
//        print_r($fields);

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
                'tab_id' => 3,
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
                'tab_id' => 3,
            ],
            [
                'origin_name' => 'slug',
                'show_name' => 'Алиас',
                'sort_list' => 50,
                'sort_single' => 40,
                'is_show_anons' => 1,
                'is_show_single' => 1,
                'type' => 'string',
                'tab_id' => 3,
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
                'tab_id' => 3,
            ],
            [
                'origin_name' => 'meta_description',
                'show_name' => 'meta description',
                'sort_list' => 50,
                'sort_single' => 240,
                'is_show_anons' => 0,
                'is_show_single' => 1,
                'type' => 'text',
                'tab_id' => 3,
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
                'origin_name' => 'properties',
                'show_name' => 'Свойства с одним значением',
                'sort_list' => 10,
                'sort_single' => 120,
                'is_show_anons' => 0,
                'is_show_single' => 1,
                'type' => 'properties',
                'tab_id' => 2
            ],
            [
                'origin_name' => 'options',
                'show_name' => 'Опции с множественными значениями',
                'sort_list' => 10,
                'sort_single' => 130,
                'is_show_anons' => 0,
                'is_show_single' => 1,
                'type' => 'options',
                'tab_id' => 2
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
