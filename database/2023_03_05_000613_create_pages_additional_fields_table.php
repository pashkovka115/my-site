<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('page_additional_fields', function (Blueprint $table) {
            $table->unsignedBigInteger('page_id');

            $class = include base_path('database/migrations/templates/TemplateAdditionalFields.php');
            $class::template($table)();

            $table->index(["page_id"], 'fk_page_additional_fields2_idx');

            $table->foreign('page_id', 'fk_page_additional_fields2_idx')
                ->references('id')->on('pages')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');

            $table->unique(['page_id', 'key']);
        });
    }


    public function down(): void
    {
        Schema::table('page_additional_fields', function (Blueprint $table) {
            $table->dropForeign('fk_page_additional_fields2_idx');
        });
        Schema::dropIfExists('page_additional_fields');
    }
};
