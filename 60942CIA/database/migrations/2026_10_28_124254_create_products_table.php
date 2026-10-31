<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->comment('Товары интернет-магазина');

            $table->id()->comment('Идентификатор товара');
            $table->string('name', 255)->comment('Наименование товара');

            $table->foreignId('category_id')
                ->comment('Категория товара')
                ->constrained('product_categories') // должно быть в таблице с категориями
                ->restrictOnDelete() // нельзя удалить категорию, на которую ссылаются товары
                ->cascadeOnUpdate(); // при изменении идентификатора категории ссылки обновляются

            $table->decimal('weight_kg', 10, 3) // 10 цифр - всего, после запятой - 3
                ->unsigned()
                ->comment('Вес товара в килограммах');

            $table->decimal('price', 12, 2)
                ->unsigned()
                ->comment('Цена товара');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
