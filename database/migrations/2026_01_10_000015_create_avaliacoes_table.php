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
       Schema::create('avaliacoes', function (Blueprint $table) {
        $table->id();
        $table->foreignId('produto_id')->constrained('produtos')->onDelete('cascade');
        $table->foreignId('user_id')->constrained('users');
        // Apenas uma linha para pedido_item_id
        $table->foreignId('pedido_item_id')->nullable()->constrained('pedido_items')->onDelete('set null');
        $table->enum('nota', [1, 2, 3, 4, 5])->default(3);
        $table->string('titulo');
        $table->text('comentario')->nullable();
        $table->enum('status', ['PENDENTE', 'APROVADO', 'REJEITADO'])->default('PENDENTE');
        $table->integer('votos_uteis')->default(0);
        $table->integer('votos_inuteis')->default(0);
        $table->timestamp('data_aprovacao')->nullable();
        $table->unique(['user_id','produto_id']);
        $table->timestamps();
        $table->index('status');
        $table->index('nota');
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('avaliacoes');
    }
};
