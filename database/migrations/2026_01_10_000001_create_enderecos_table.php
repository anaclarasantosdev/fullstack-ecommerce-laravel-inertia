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
    Schema::create('enderecos', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Corrigido nome
        $table->enum('tipo', ['RESIDENCIAL', 'COMERCIAL', 'ENTREGA', 'COBRANCA'])->default('ENTREGA');  
        $table->string('apelido');
        $table->string('destinatario')->nullable();
        $table->string('telefone_contato', 20)->nullable();
        $table->boolean('principal')->default(false);
        $table->string('rua');
        $table->string('numero', 10);
        $table->string('complemento')->nullable();
        $table->string('bairro');
        $table->string('cidade');
        $table->string('estado', 2);
        $table->string('cep', 10);
        $table->timestamps();

        // Índices - removidos nomes personalizados
        $table->index('user_id');
        $table->index('principal');
        $table->index(['user_id', 'tipo', 'principal']);
        
        // Unique corrigido (não funciona como quer - remover ou usar lógica no Model)
        // $table->unique(['user_id', 'tipo', 'principal']); // Causa problemas
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
