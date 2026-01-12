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
        Schema::create('log_estoque', function (Blueprint $table) {
            $table->id();
            $table->foreignId('produto_id')->constrained('produtos');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('pedido_id')->constrained('pedidos');
            $table->foreignId('variacao_id')->constrained('variacaos');
            $table->enum('tipo_movimento', ['ENTRADA','SAIDA','AJUSTE','DEVOLUCAO']);
            $table->integer('quantidade');
            $table->integer('estoque_anterior');
            $table->integer('estoque_atual');
            $table->string('motivo');
            $table->index('tipo_movimento');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_estoque');
    }
};
