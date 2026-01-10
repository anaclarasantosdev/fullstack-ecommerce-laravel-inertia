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
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('sku', 50)->unique();
            $table->string('nome_produto', 200);
            $table->string('slug', 200)->unique();
            $table->longText('descricao')->nullable();
            $table->string('descricao_curta', 500)->nullable();
            $table->decimal('preco_base', 10, 2);
            $table->decimal('preco_promocional', 10, 2)->nullable();
            $table->decimal('custo_medio', 10, 2)->nullable();
            $table->boolean('gerenciar_estoque')->default(true);
            $table->integer('estoque')->default(0);
            $table->integer('estoque_minimo')->default(5);
            $table->boolean('baixa_estoque')->default(true);
            $table->decimal('peso_kg', 6, 3)->nullable();
            $table->decimal('comprimento_cm', 6, 2)->nullable();
            $table->decimal('largura_cm', 6, 2)->nullable();
            $table->decimal('altura_cm', 6, 2)->nullable();
            $table->boolean('disponivel')->default(true);
            $table->boolean('destaque')->default(false);
            $table->boolean('novidade')->default(false);
            $table->boolean('mais_vendido')->default(false);
            $table->enum('visibilidade', ['PUBLICO', 'PRIVADO', 'OCULTO'])->default('PUBLICO');
            $table->dateTime('data_publicacao')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->foreign('id_categoria')->references('id')->on('categorias');
            $table->index('id_categoria', 'idx_produto_categoria');
            $table->index('slug', 'idx_produto_slug');
            $table->index('sku', 'idx_produto_sku');
            $table->index('destaque', 'idx_produto_destaque');
            $table->index('preco_base', 'idx_produto_preco');
            $table->index('disponivel', 'idx_produto_disponivel');
            $table->index('data_publicacao', 'idx_produto_data_publicacao');        
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
