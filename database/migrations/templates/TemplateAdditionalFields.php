<?php

use Illuminate\Database\Schema\Blueprint;

/*
 * Шаблон для построения таблицы свойств
 */
return new class
{
    public static function template(Blueprint $table): Closure
    {
        $fields = function () use ($table) {
            $table->id();
            $table->string('key');
            $table->string('name')->nullable();
            $table->string('type')->nullable();
            $table->longText('value')->nullable();
            $table->boolean('is_show')->default(true);
        };

        return $fields;
    }
};
