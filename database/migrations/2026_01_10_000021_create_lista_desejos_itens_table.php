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
        Schema::create('lista_desejos_itens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lista_id')->contrined('lista_desejo')->onDelete('cascade');
            $table->foreignId('produto_id')->constrained('produtos');
            $table->unique(['lista_id', 'produto_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lista_desejos_itens');
    }
};
