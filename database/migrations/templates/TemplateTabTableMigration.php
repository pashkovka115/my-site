<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class
{
    /**
     * @param Blueprint $table
     * @return Closure
     * Табы(вкладки) для Tab таблиц
     */
    public static function template(Blueprint $table): Closure
    {
        $func = function () use ($table) {
            $table->id();
            $table->string('name');
            $table->integer('sort')->default(10);
            $table->boolean('is_show')->default(true);
        };
        return $func;
    }
};
