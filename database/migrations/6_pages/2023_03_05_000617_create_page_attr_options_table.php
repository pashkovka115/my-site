<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public $table = 'page_attr_options';

    public function up(): void
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Page\Page::class)
                ->constrained('pages')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->string('name');
        });
    }


    public function down(): void
    {
        Schema::dropIfExists($this->table);
    }
};
