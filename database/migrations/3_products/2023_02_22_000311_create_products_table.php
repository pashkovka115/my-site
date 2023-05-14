<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('parent_id')->nullable()->default(null);

            $table->string('name_lavel', 2)->default('h2');

            $table->integer('sort')->default(0);
            $table->string('img_announce')->nullable();
            $table->string('img_detail')->nullable();

            $table->boolean('is_show')->default(true);

            $table->unsignedDouble('price')->default(0.0);
            $table->unsignedDouble('old_price')->default(0.0);

            $table->unsignedInteger('quantity')->default(0);
            $table->unsignedSmallInteger('min_quantity')->default(0);

            $table->boolean('hit')->default(0);
            $table->boolean('is_download')->default(0);

            $table->unsignedInteger('width')->default(0);
            $table->unsignedInteger('height')->default(0);
            $table->unsignedInteger('length')->default(0);
            $table->unsignedInteger('weight')->default(0);

            // Номера товара
            $table->string('sku')->nullable();
            $table->string('upc')->nullable();
            $table->string('ean')->nullable();
            $table->string('jan')->nullable();
            $table->string('isbn')->nullable();
            $table->string('mpn')->nullable();

            $table->timestamps();


            $table->index(["category_id"], 'fk_category1_idx');

            $table->foreign('category_id', 'fk_category1_idx')
                ->references('id')->on('categories_product')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');

            $table->foreign('parent_id')
                ->references('id')
                ->on('products')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
        });
    }


    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign('fk_category1_idx');
        });
        Schema::dropIfExists('products');
    }
};
