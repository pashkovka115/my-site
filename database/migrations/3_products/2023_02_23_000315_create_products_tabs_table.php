<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products_tabs', function (Blueprint $table) {
            $class = include base_path('database/migrations/templates/TemplateTabTableMigration.php');
            $class::template($table)();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('products_tabs');
    }
};
