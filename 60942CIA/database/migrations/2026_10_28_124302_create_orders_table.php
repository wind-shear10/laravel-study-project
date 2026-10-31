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
        Schema::create('orders', function (Blueprint $table) {
            $table->comment('Заказы покупателей');

            $table->id()->comment('Идентификатор заказа');

            $table->foreignId('user_id')
                ->comment('Покупатель, оформивший заказ')
                ->constrained('users')
                ->restrictOnDelete()
                ->cascadeOnUpdate();

            $table->dateTime('date_of_shipment')
                ->comment('Дата и время отправки заказа');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
