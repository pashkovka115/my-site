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
                'sort' =>20,
            ],
            [
                'name' => 'Характеристики',
                'sort' =>30,
            ],
            [
                'name' => 'Связи',
                'sort' =>40,
            ],
            [
                'name' => 'Номера товара',
                'sort' =>50,
            ],
            [
                'name' => 'SEO',
                'sort' =>60,
            ],
        ];

        DB::table('products_tabs')->insert($tabs);


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
                'tab_id' => 5,
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
                'tab_id' => 5,
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
                'tab_id' => 5,
                'description' => '',
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
                'description' => '',
            ],
            [
                'origin_name' => 'img_announce',
                'show_name' => 'Изображение в анонсе 480x480',
                'sort_list' => 50,
                'sort_single' => 60,
                'is_show_anons' => 0,
                'is_show_single' => 1,
                'type' => 'img',
                'tab_id' => 1,
                'description' => '',
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
                'description' => '',
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
                'description' => '',
            ],
            [
                'origin_name' => 'img_detail',
                'show_name' => 'Изображение в детальном описании<br>и в модальном на главной 800x800',
                'sort_list' => 50,
                'sort_single' => 80,
                'is_show_anons' => 0,
                'is_show_single' => 1,
                'type' => 'img',
                'tab_id' => 1,
                'description' => '',
            ],
            [
                'origin_name' => 'gallery',
                'show_name' => 'Галерея изображений 800x800',
                'sort_list' => 50,
                'sort_single' => 90,
                'is_show_anons' => 0,
                'is_show_single' => 1,
                'type' => 'img_gallery',
                'tab_id' => 1,
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
                'tab_id' => 5,
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
                'tab_id' => 5,
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
        ];

        $fields[] = [
            'origin_name' => 'category_id',
            'show_name' => 'Категория',
            'sort_list' => 10,
            'sort_single' => 20,
            'is_show_anons' => 0,
            'is_show_single' => 1,
            'type' => 'select.all_categories',
            'tab_id' => 1,
            'description' => '',
        ];
        $fields[] = [
            'origin_name' => 'properties',
            'show_name' => 'Свойства с одним значением',
            'sort_list' => 10,
            'sort_single' => 120,
            'is_show_anons' => 0,
            'is_show_single' => 1,
            'type' => 'properties',
            'tab_id' => 3,
            'description' => '',
        ];
        $fields[] = [
            'origin_name' => 'options',
            'show_name' => 'Опции с множественными значениями',
            'sort_list' => 10,
            'sort_single' => 130,
            'is_show_anons' => 0,
            'is_show_single' => 1,
            'type' => 'options',
            'tab_id' => 3,
            'description' => '',
        ];
        $fields[] = [
            'origin_name' => 'sku',
            'show_name' => 'Артикул',
            'sort_list' => 10,
            'sort_single' => 150,
            'is_show_anons' => 0,
            'is_show_single' => 1,
            'type' => 'string',
            'tab_id' => 4,
            'description' => '',
        ];
        $fields[] = [
            'origin_name' => 'upc',
            'show_name' => 'UPC',
            'sort_list' => 10,
            'sort_single' => 160,
            'is_show_anons' => 0,
            'is_show_single' => 1,
            'type' => 'string',
            'tab_id' => 4,
            'description' => '',
        ];
        $fields[] = [
            'origin_name' => 'ean',
            'show_name' => 'EAN',
            'sort_list' => 10,
            'sort_single' => 170,
            'is_show_anons' => 0,
            'is_show_single' => 1,
            'type' => 'string',
            'tab_id' => 4,
            'description' => '',
        ];
        $fields[] = [
            'origin_name' => 'jan',
            'show_name' => 'JAN',
            'sort_list' => 10,
            'sort_single' => 180,
            'is_show_anons' => 0,
            'is_show_single' => 1,
            'type' => 'string',
            'tab_id' => 4,
            'description' => '',
        ];
        $fields[] = [
            'origin_name' => 'isbn',
            'show_name' => 'ISBN',
            'sort_list' => 10,
            'sort_single' => 190,
            'is_show_anons' => 0,
            'is_show_single' => 1,
            'type' => 'string',
            'tab_id' => 4,
            'description' => '',
        ];
        $fields[] = [
            'origin_name' => 'mpn',
            'show_name' => 'MPN',
            'sort_list' => 10,
            'sort_single' => 200,
            'is_show_anons' => 0,
            'is_show_single' => 1,
            'type' => 'string',
            'tab_id' => 4,
            'description' => '',
        ];
        $fields[] = [
            'origin_name' => 'parent_id',
            'show_name' => 'Сделать вариантом этого товара',
            'sort_list' => 10,
            'sort_single' => 1,
            'is_show_anons' => 0,
            'is_show_single' => 1,
            'type' => 'select.parent',
            'tab_id' => 3,
            'description' => '',
        ];
        $fields[] = [
            'origin_name' => 'price',
            'show_name' => 'Цена',
            'sort_list' => 10,
            'sort_single' => 40,
            'is_show_anons' => 0,
            'is_show_single' => 1,
            'type' => 'number',
            'tab_id' => 1,
            'description' => '',
        ];
        $fields[] = [
            'origin_name' => 'old_price',
            'show_name' => 'Старая цена',
            'sort_list' => 10,
            'sort_single' => 40,
            'is_show_anons' => 0,
            'is_show_single' => 1,
            'type' => 'number',
            'tab_id' => 1,
            'description' => '',
        ];
        $fields[] = [
            'origin_name' => 'quantity',
            'show_name' => 'Количество товара',
            'sort_list' => 10,
            'sort_single' => 30,
            'is_show_anons' => 0,
            'is_show_single' => 1,
            'type' => 'number',
            'tab_id' => 1,
            'description' => '',
        ];
        $fields[] = [
            'origin_name' => 'min_quantity',
            'show_name' => 'Минимальное количество товара',
            'sort_list' => 10,
            'sort_single' => 10,
            'is_show_anons' => 0,
            'is_show_single' => 1,
            'type' => 'number',
            'tab_id' => 1,
            'description' => '',
        ];
        $fields[] = [
            'origin_name' => 'width',
            'show_name' => 'Ширина',
            'sort_list' => 10,
            'sort_single' => 20,
            'is_show_anons' => 0,
            'is_show_single' => 1,
            'type' => 'string',
            'tab_id' => 2,
            'description' => '',
        ];
        $fields[] = [
            'origin_name' => 'height',
            'show_name' => 'Высота',
            'sort_list' => 10,
            'sort_single' => 30,
            'is_show_anons' => 0,
            'is_show_single' => 1,
            'type' => 'string',
            'tab_id' => 2,
            'description' => '',
        ];
        $fields[] = [
            'origin_name' => 'length',
            'show_name' => 'Длина',
            'sort_list' => 10,
            'sort_single' => 40,
            'is_show_anons' => 0,
            'is_show_single' => 1,
            'type' => 'string',
            'tab_id' => 2,
            'description' => '',
        ];
        $fields[] = [
            'origin_name' => 'weight',
            'show_name' => 'Вес',
            'sort_list' => 10,
            'sort_single' => 50,
            'is_show_anons' => 0,
            'is_show_single' => 1,
            'type' => 'string',
            'tab_id' => 2,
            'description' => '',
        ];
        $fields[] = [
            'origin_name' => 'is_show',
            'show_name' => 'Видимость',
            'sort_list' => 10,
            'sort_single' => 10,
            'is_show_anons' => 0,
            'is_show_single' => 1,
            'type' => 'is_show',
            'tab_id' => 1,
            'description' => '',
        ];
        $fields[] = [
            'origin_name' => 'hit',
            'show_name' => 'Хит продаж',
            'sort_list' => 10,
            'sort_single' => 10,
            'is_show_anons' => 0,
            'is_show_single' => 1,
            'type' => 'hit',
            'tab_id' => 1,
            'description' => '',
        ];
        $fields[] = [
            'origin_name' => 'sort',
            'show_name' => 'Сортировка в ленте',
            'sort_list' => 10,
            'sort_single' => 10,
            'is_show_anons' => 0,
            'is_show_single' => 1,
            'type' => 'number',
            'tab_id' => 1,
            'description' => '',
        ];

        DB::table('products_columns')->insert($fields);

    }


    public function down(): void
    {
        DB::table('products_columns')->truncate();
    }
};
