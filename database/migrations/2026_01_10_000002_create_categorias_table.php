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
        Schema::create('categorias', function (Blueprint $table) {
            $table->id();
            $table->string('nome')->unique();
            $table->string('slug')->unique();
            $table->text('descricao')->nullable();
            $table->string('imagem_url', 500)->nullable();
            $table->foreignId('categoria_pai_id')->nullable()->constrained('categorias');
            $table->integer('ordem')->default(0);
            $table->boolean('ativa')->default(true);    
            $table->timestamps();
            $table->index('categoria_pai_id');
            $table->index('slug');
            $table->index('ordem');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categorias');
    }
};
