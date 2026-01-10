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
            $table->enum('tipo', ['RESIDENCIAL', 'COMERCIAL', 'ENTREGA', 'COBRANCA'])->default('ENTREGA');  
            $table->string('apelido'); // "Casa", "Trabalho", "Sítio"
            $table->string('destinatario')->nullable();
            $table->string('telefone_contato')->nullable();
            $table->boolean('principal')->default(false);
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade');
            $table->string('rua');
            $table->string('numero');
            $table->string('complemento')->nullable();
            $table->string('bairro');
            $table->string('cidade');
            $table->string('estado');
            $table->string('cep');
            $table->timestamps();


            $table->index('usuario_id', 'idx_endereco_usuario');
            $table->index('principal', 'idx_endereco_principal');
            $table->unique(['usuario_id', 'tipo', 'principal'], 'uk_endereco_principal');

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
