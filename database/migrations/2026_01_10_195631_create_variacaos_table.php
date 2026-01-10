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
        Schema::create('variacaos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_produto')->constrained('produto', 'id_produto')->onDelete('cascade');
            $table->string('sku_variacao', 50)->unique();
            $table->string('descricao_variacao', 200);
            $table->decimal('preco_adicional', 10, 2)->default(0);
            $table->integer('estoque')->default(0);
            $table->string('imagem_url', 500)->nullable();
            $table->boolean('ativa')->default(true);
            $table->timestamps();

            $table->index('id_produto', 'idx_variacao_produto');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('variacaos');
    }
};
