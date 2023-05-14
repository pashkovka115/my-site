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


        $class = include base_path('database/seeders/templates/TemplateTableColumnsSeeder.php');
        $fields = $class::template()();
        // Всего 3 вкладки
        foreach ($fields as $key => $field){
            if ($field['tab_id'] > 3){
                $fields[$key]['tab_id'] = 3;
            }
        }
//        print_r($fields);

        $fields[] = [
            'origin_name' => 'properties',
            'show_name' => 'Свойства с одним значением',
            'sort_list' => 10,
            'sort_single' => 120,
            'is_show_anons' => 0,
            'is_show_single' => 1,
            'type' => 'properties',
            'tab_id' => 2
        ];
        $fields[] = [
            'origin_name' => 'options',
            'show_name' => 'Опции с множественными значениями',
            'sort_list' => 10,
            'sort_single' => 130,
            'is_show_anons' => 0,
            'is_show_single' => 1,
            'type' => 'options',
            'tab_id' => 2
        ];
        $fields[] = [
            'origin_name' => 'is_show',
            'show_name' => 'Видимость',
            'sort_list' => 10,
            'sort_single' => 10,
            'is_show_anons' => 0,
            'is_show_single' => 1,
            'type' => 'is_show',
            'tab_id' => 1
        ];

        DB::table('pages_columns')->insert($fields);

    }


    public function down(): void
    {
        DB::table('pages_columns')->truncate();
        DB::table('pages_tabs')->truncate();
    }
};
