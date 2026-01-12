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
            $table->foreignId('carrinho_id')->constrained('carrinho');
            $table->foreignId('produto_id')->constrained('produtos');
            $table->foreignId('variacao_id')->nullable()->constrained('variacaos');
            $table->integer('quantidade')->default(1);
            $table->decimal('preco_unitario', 10, 2);
            $table->date('data_adicao')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamps();
            $table->unique(['carrinho_id', 'produto_id', 'variacao_id'],);        
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
