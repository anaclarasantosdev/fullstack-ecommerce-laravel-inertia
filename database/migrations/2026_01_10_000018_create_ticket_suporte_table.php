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
        Schema::create('ticket_suporte', function (Blueprint $table) {
            $table->id();
            $table->string('numero_ticket');
            $table->foreignId('user_id')->constrained('users');
            $table->string('assunto');
            $table->text('descricao');
            $table->enum('departamento',[
                'VENDAS',
                'TECNICO',
                'FINANCEIRO',
                'ENTREGA',
                'OUTROS'
            ])->default('OUTROS');
            $table->enum('prioridade',[
                'BAIXA', 
                'NORMAL', 
                'ALTA', 
                'URGENTE'
            ])->default('NORMAL');
            $table->enum('status',[
                'ABERTO', 
                'EM_ATENDIMENTO', 
                'AGUARDANDO_RESPOSTA', 
                'RESOLVIDO', 
                'FECHADO'
                ])->default('ABERTO');
            $table->foreignId('admin_id')->constrained('users');
            $table->date('data_ultima_resposta');
            $table->date('data_fechamento');
            $table->unique('numero_ticket');
            $table->timestamps();
            $table->index('status');
            $table->index('departamento');
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket_suporte');
    }
};
