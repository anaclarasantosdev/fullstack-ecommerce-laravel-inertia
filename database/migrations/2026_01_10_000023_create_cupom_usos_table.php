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
        Schema::create('cupom_usos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cupom_id')->constrained('cupoms');
            $table->foreignId('user_id')->constrainde('users');
            $table->foreignId('pedido_id')->constrained('pedidos');
            $table->decimal('valor_desconto_aplicado', 10,2);
            $table->timestamp('data_uso');
            $table->unique(['cupom_id', 'pedido_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cupom_usos');
    }
};
