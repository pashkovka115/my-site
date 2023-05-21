<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('menuitem', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('menu_id');
            $table->unsignedBigInteger('parent_id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->integer('sort')->default(100);

            $table->foreign('menu_id')->references('id')->on('menu')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }


    public function down(): void
    {
        Schema::table('menuitem', function (Blueprint $table) {
            $table->dropForeign(['menu_id']);
        });

        Schema::dropIfExists('menuitem');
    }
};
