<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->comment('Товары, входящие в заказы');

            $table->id()->comment('Идентификатор позиции заказа');

            $table->foreignId('order_id')
                ->comment('Заказ')
                ->constrained('orders')
                ->restrictOnDelete()
                ->cascadeOnUpdate();

            $table->foreignId('product_id')
                ->comment('Товар')
                ->constrained('products')
                ->restrictOnDelete()
                ->cascadeOnUpdate();

            $table->unsignedInteger('quantity')
                ->comment('Количество единиц товара');

            $table->decimal('price', 12, 2)
                ->unsigned()
                ->comment('Цена единицы товара при оформлении заказа');
        });
        DB::statement( // ограничение на кол-во единиц товара
            'ALTER TABLE order_details
            ADD CONSTRAINT chk_order_details_quantity
            CHECK (quantity > 0)'
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
