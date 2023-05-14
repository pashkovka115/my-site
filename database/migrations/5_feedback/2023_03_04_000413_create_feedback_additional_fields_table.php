<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('feedback_additional_fields', function (Blueprint $table) {
            $table->unsignedBigInteger('feedback_id');

            $class = include base_path('database/migrations/templates/TemplateAdditionalFields.php');
            $class::template($table)();

            $table->index(["feedback_id"], 'fk_feedback_additional_fields2_idx');

            $table->foreign('feedback_id', 'fk_feedback_additional_fields2_idx')
                ->references('id')->on('feedback')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');

            $table->unique(['feedback_id', 'key']);
        });
    }


    public function down(): void
    {
        Schema::table('feedback_additional_fields', function (Blueprint $table) {
            $table->dropForeign('fk_feedback_additional_fields2_idx');
        });
        Schema::dropIfExists('feedback_additional_fields');
    }
};
