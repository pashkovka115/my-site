<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('product_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->string('src');
            $table->integer('sort')->default(0);

            $table->index(["product_id"], 'fk_product_image1_idx');

            $table->foreign('product_id', 'fk_product_image1_idx')
                ->references('id')->on('products')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
        });
    }


    public function down(): void
    {
        Schema::table('product_images', function (Blueprint $table) {
            $table->dropForeign('fk_product_image1_idx');
        });
        Schema::dropIfExists('product_images');
    }
};
