<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('currencies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
            $table->string('symbol_left')->nullable();
            $table->string('symbol_right')->nullable();
            $table->boolean('base')->default(false);
            $table->double('rate')->default(0.0);
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('currencies');
    }
};
