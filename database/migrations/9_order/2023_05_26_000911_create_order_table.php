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
            $table->string('customer_name')->nullable();
            $table->string('customer_email');
            $table->string('status')->default('В обработке');
            $table->text('comment_from_user')->nullable();
            $table->text('comment_from_manager')->nullable();
            $table->unsignedDouble('total')->comment('Сумма общая');
            $table->unsignedInteger('qty')->nullable()->default(null)->comment('Количество всего');

            $table->string('getter_family');
            $table->string('getter_name');
            $table->string('getter_otchectvo')->nullable();
            $table->string('getter_street');
            $table->string('getter_house');
            $table->string('getter_apartment')->nullable();
            $table->string('getter_email');
            $table->string('getter_country');

            $table->timestamps();
        });

        Schema::create('order_product', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id')->nullable()->default(null);
            $table->string('name');
            $table->string('sku')->nullable();
            $table->unsignedInteger('qty')->comment('Количество');
            $table->unsignedDouble('price')->comment('Цена за еденицу');
            $table->unsignedDouble('sum')->comment('Сумма');
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
