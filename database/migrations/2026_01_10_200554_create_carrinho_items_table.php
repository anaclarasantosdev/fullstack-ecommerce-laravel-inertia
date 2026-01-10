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
        Schema::create('carrinho_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('carrinho_id')->constrained('carrinho', 'id_carrinho')->onDelete('cascade');
            $table->foreignId('produto_id')->constrained('produto', 'id_produto')->onDelete('cascade');
            $table->foreignId('variacao_id')->nullable()->constrained('variacao', 'id_variacao')->onDelete('cascade');
            $table->integer('quantidade')->default(1);
            $table->decimal('preco_unitario', 10, 2);
            $table->dateTime('data_adicao')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamps();

            $table->index('carrinho_id', 'idx_carrinho_item_carrinho');
            $table->index('produto_id', 'idx_carrinho_item_produto');
            $table->unique(['carrinho_id', 'produto_id', 'variacao_id'], 'uk_carrinho_produto');        
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carrinho_items');
    }
};
