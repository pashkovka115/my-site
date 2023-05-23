<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();

            $table->string('title')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('name_lavel', 2)->nullable()->default('h2');

            $table->string('name');
            $table->string('slug');
            $table->integer('sort')->default(0);

//            $table->string('img_announce')->nullable();
//            $table->string('img_detail')->nullable();
//            $table->text('announce')->nullable();

            $table->longText('description')->nullable();
            $table->boolean('is_show')->default(true);

            $table->timestamps();

            $table->unique('slug');
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
