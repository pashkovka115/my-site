<?php

namespace Database\Seeders;

use Faker\Generator as Faker;
use Illuminate\Support\Str;


/**
 * Используется как шаблон для заполнения одинаковых полей в таблицах основной сущности
 */
return new class {
    public static function template(Faker $faker, $number = '', $options = []): \Closure
    {

        $func = function () use ($faker, $number, $options){
            $name = "$number" . $faker->realText($faker->numberBetween(10, 20));

            $options = array_merge([
//                'title' => $faker->realText($faker->numberBetween(10, 30)),
//                'meta_keywords' => $faker->realText($faker->numberBetween(10, 30)),
//                'meta_description' => $faker->realText($faker->numberBetween(50, 100)),

                'name_lavel' => 'h2',

//                'name' => $name,
//                'slug' => Str::slug($name),
//                'img_announce' => '',
//                'img_detail' => '',
//                'announce' => $faker->realText($faker->numberBetween(100, 300)),
//                'description' => $faker->realText($faker->numberBetween(500, 1000)),
            ], $options);

            return $options;
        };

        return $func;
    }
};
