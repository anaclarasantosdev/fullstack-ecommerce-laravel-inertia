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
            $table->foreignId('produto_id')->constrained('produtos')->onDelete('cascade');
            $table->foreignId('atributo_id')->constrained('atributos')->onDelete('cascade');
            $table->index(['produto_id', 'atributo_id']);
        });

    }
     /* Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produto_atributo');
    }
};
