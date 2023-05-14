<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('feedback', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable()->default(null);
            $table->string('email');
            $table->boolean('checked')->default(false);

            $class = include base_path('database/migrations/templates/TemplateMetaFieldsMigration.php');
            $class::template($table)();

            $table->timestamps();


            $table->index(["user_id"], 'fk_user1_idx');

            $table->foreign('user_id', 'fk_user1_idx')
                ->references('id')->on('users')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
        });
    }


    public function down(): void
    {
        Schema::table('feedback', function (Blueprint $table) {
            $table->dropForeign('fk_user1_idx');
        });
        Schema::dropIfExists('feedback');
    }
};
