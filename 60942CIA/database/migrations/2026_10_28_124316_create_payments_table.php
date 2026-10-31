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
        Schema::create('payments', function (Blueprint $table) {
            $table->comment('Оплаты покупателей');

            $table->id()->comment('Идентификатор оплаты');

            $table->foreignId('user_id')
                ->comment('Покупатель, выполнивший оплату')
                ->constrained('users')
                ->restrictOnDelete()
                ->cascadeOnUpdate();

            $table->dateTime('payment_date')
                ->comment('Дата и время оплаты');

            $table->decimal('amount', 12, 2)
                ->unsigned()
                ->comment('Сумма оплаты');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
