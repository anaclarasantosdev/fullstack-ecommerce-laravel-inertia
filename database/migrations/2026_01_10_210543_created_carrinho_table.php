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
    Schema::create('carrinho', function (Blueprint $table) {
        $table->id('id_carrinho');
        $table->foreignId('id_usuario')->nullable()->constrained('usuario', 'id_usuario')->onDelete('cascade');
        $table->string('sessao_id', 100)->unique();
        $table->timestamp('data_criacao')->useCurrent();
        $table->timestamp('data_atualizacao')->useCurrent()->useCurrentOnUpdate();
        $table->string('ip_address', 45);
        $table->text('user_agent');
        
        $table->index('id_usuario', 'idx_carrinho_usuario');
        $table->index('sessao_id', 'idx_carrinho_sessao');
        $table->index('data_criacao', 'idx_carrinho_data');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carrinho');
    }
};
