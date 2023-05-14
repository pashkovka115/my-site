<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class
{
    /**
     * @param Blueprint $table
     * @return Closure
     * Поля Column таблиц
     */
    public static function template(Blueprint $table): Closure
    {
        $func = function () use ($table) {
            $table->id();
            $table->string('origin_name');
            $table->string('type');
            $table->string('show_name');
            $table->integer('sort_list')->default(10);
            $table->integer('sort_single')->default(10);
            $table->boolean('is_show_anons');
            $table->boolean('is_show_single');
            $table->text('description')->nullable();

            // Первичный ключ не добавляю чтобы не удалить колонки вместе с табами
            // Будет связь только в модели
            $table->unsignedBigInteger('tab_id')->default(1);
        };
        return $func;
    }
};
