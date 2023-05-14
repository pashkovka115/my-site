<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public $table = 'product_attr_properties';

    public function up(): void
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Product\Product::class)
                ->constrained('products')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->string('name');
            $table->string('value');
        });
    }


    public function down(): void
    {
        Schema::table('product_attr_properties', function (Blueprint $table) {
            $table->dropForeignIdFor(\App\Models\Product\Product::class);
        });

        Schema::dropIfExists($this->table);
    }
};
