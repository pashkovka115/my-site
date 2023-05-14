<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('categories_product_additional_fields', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id');

            $class = include base_path('database/migrations/templates/TemplateAdditionalFields.php');
            $class::template($table)();

            $table->index(["category_id"], 'fk_category_additional_fields2_idx');

            $table->foreign('category_id', 'fk_category_additional_fields2_idx')
                ->references('id')->on('categories_product')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');

            $table->unique(['category_id', 'key']);
        });
    }


    public function down(): void
    {
        Schema::table('categories_product_additional_fields', function (Blueprint $table) {
            $table->dropForeign('fk_category_additional_fields2_idx');
        });
        Schema::dropIfExists('categories_product_additional_fields');
    }
};
