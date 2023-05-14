<?php

use Illuminate\Database\Schema\Blueprint;

return new class {
    /**
     * Общий шаблон для языковых переводов.
     */
    public static function template(Blueprint $table): Closure
    {
        $fields = function () use ($table) {
            $table->string('title')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('meta_description')->nullable();

            $table->string('name');
            $table->string('slug');
            $table->text('announce')->nullable();
            $table->longText('description')->nullable();
        };

//        $table->unique('slug');

        return $fields;
    }
};
