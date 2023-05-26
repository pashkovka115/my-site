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

            $table->string('title')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('meta_description')->nullable();

            $table->string('name');
            $table->string('name_lavel', 2)->default('h2');
            $table->string('slug');
            $table->text('announce')->nullable();
            $table->longText('description')->nullable();

            $table->integer('sort')->default(0);
            $table->string('img_announce')->nullable();
            $table->string('img_detail')->nullable();

            $table->boolean('is_show')->default(true);

            $table->unsignedDouble('price')->nullable()->default(0.0);
            $table->unsignedDouble('old_price')->nullable()->default(0.0);

            $table->unsignedInteger('quantity')->nullable()->default(0);
            $table->unsignedSmallInteger('min_quantity')->nullable()->default(0);

            $table->boolean('hit')->default(0);

            $table->unsignedInteger('width')->nullable()->default(0);
            $table->unsignedInteger('height')->nullable()->default(0);
            $table->unsignedInteger('length')->nullable()->default(0);
            $table->unsignedInteger('weight')->nullable()->default(0);

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
