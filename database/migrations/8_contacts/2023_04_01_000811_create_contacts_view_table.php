<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public $table = 'contacts_view';


    public function up(): void
    {
        /*Schema::create($this->table, function (Blueprint $table) {
            $table->id();
            $table->string('key')->comment('Поиск по этому полю');
            $table->string('name')->nullable()->comment('Отображаемое название');
            $table->string('value')->nullable();
            $table->boolean('is_show')->default(true);

            $table->unique('key');
        });*/
    }


    public function down(): void
    {
//        Schema::dropIfExists($this->table);
    }
};
