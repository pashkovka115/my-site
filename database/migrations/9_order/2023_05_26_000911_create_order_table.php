<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable()->default(null);
            $table->enum('status', ['первый статус', 'второй статус', 'третий статус', 'четвёртый статус']);
            $table->text('note')->nullable();
            $table->unsignedDouble('total');
            $table->unsignedInteger('qty')->nullable()->default(null);
            $table->timestamps();
        });

        Schema::create('order_product', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id')->nullable()->default(null);
            $table->string('name');
            $table->string('slug');
            $table->unsignedInteger('qty');
            $table->unsignedDouble('price');
            $table->unsignedDouble('sum');
            $table->string('options')->nullable();

            $table->foreignIdFor(\App\Models\Order\Order::class)
                ->constrained('orders')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_product');
        Schema::dropIfExists('orders');
    }
};
