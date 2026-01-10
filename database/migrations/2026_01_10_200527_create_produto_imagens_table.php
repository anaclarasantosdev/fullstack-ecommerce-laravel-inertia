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
        Schema::create('produto_imagens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('produto_id')->constrained('produto', 'id_produto')->onDelete('cascade');
            $table->string('url_imagem', 500);
            $table->integer('ordem')->default(0);
            $table->boolean('principal')->default(false);
            $table->string('legenda', 200)->nullable();
            $table->timestamps();

            $table->index('produto_id', 'idx_imagem_produto');
            $table->index('ordem', 'idx_imagem_ordem');
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produto_imagens');
    }
};
