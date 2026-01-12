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
        Schema::create('variacao_atributo', function (Blueprint $table) {
            $table->id();
            $table->foreignId('variacao_id')->constrained('variacaos')->onDelete('cascade');
            $table->foreignId('atributo_id')->constrained('atributos')->onDelete('cascade');
            $table->string('valor_atributo', 100);
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('variacao_atributo');
    }
};
