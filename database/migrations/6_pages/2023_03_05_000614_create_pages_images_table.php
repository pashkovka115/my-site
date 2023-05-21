<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pages_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('page_id');
            $table->string('src');
            $table->integer('sort')->default(0);

            $table->index(["page_id"], 'fk_pages_image1_idx');

            $table->foreign('page_id', 'fk_pages_image1_idx')
                ->references('id')->on('pages')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
        });
    }


    public function down(): void
    {
        Schema::table('pages_images', function (Blueprint $table) {
            $table->dropForeign('fk_pages_image1_idx');
        });
        Schema::dropIfExists('pages_images');
    }
};
