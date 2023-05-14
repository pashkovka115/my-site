<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public $table = 'products_description';


    public function up(): void
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('language_id');

            $table->string('title')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('meta_description')->nullable();

            $table->string('name');
            $table->string('slug');
            $table->text('announce')->nullable();
            $table->longText('description')->nullable();

            $table->timestamps();



            $table->unique(['language_id', 'slug']);

            $table->foreign('product_id')
                ->references('id')->on('products')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');

            $table->foreign('language_id')
                ->references('id')->on('languages')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
        });
    }


    public function down(): void
    {
        Schema::table($this->table, function (Blueprint $table) {
            $table->dropForeign(['product_id']);
            $table->dropForeign(['language_id']);
        });
        Schema::dropIfExists($this->table);
    }
};
