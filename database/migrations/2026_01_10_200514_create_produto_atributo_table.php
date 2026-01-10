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
        Schema::create('produto_atributo', function (Blueprint $table) {
            $table->id();
            $table->string('valor');
            $table->timestamps();
            $table->foreign('id_produto')->references('id')->on('produtos')->onDelete('cascade');
            $table->foreign('id_atributo')->references('id')->on('atributos')->onDelete('cascade');
            $table->index(['id_produto', 'id_atributo']);
        });

    }
     /* Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produto_atributo');
    }
};
