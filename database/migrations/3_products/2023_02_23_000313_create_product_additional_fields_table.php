<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('product_additional_fields', function (Blueprint $table) {
            $class = include base_path('database/migrations/templates/TemplateAdditionalFields.php');
            $class::template($table)();

            $table->unsignedBigInteger('product_id');

            $table->index(["product_id"], 'fk_product_additional_fields2_idx');

            $table->foreign('product_id', 'fk_product_additional_fields2_idx')
                ->references('id')->on('products')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');

            $table->unique(['product_id', 'key']);
        });
    }


    public function down(): void
    {
        Schema::table('product_additional_fields', function (Blueprint $table) {
            $table->dropForeign('fk_product_additional_fields2_idx');
        });
        Schema::dropIfExists('product_additional_fields');
    }
};
