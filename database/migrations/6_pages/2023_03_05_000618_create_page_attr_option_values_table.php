<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public $table = 'page_attr_values';


    public function up(): void
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->id();
            $table->string('name');


            $table->foreignIdFor(\App\Models\Page\Attributes\Option::class)
                ->constrained('page_attr_options')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });
    }


    public function down(): void
    {
        Schema::table($this->table, function (Blueprint $table) {
            $table->dropForeignIdFor(\App\Models\Product\Attributes\Option::class);
        });

        Schema::dropIfExists($this->table);
    }
};
