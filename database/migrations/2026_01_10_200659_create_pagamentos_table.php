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
        Schema::create('pagamentos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pedido')->on('Pedidos')->onDelete('cascade');
            $table->string('gateway_pagamento');
            $table->string('status')->enum(['PENDENTE', 'PROCESSANDO', 'APROVADO', 'RECUSADO','REEMBOLSADO', 'CHARGEBACK'])->defualt('PENDENTE');
            $table->decimal('valor', 10,2);
            $table->integer('parcelas')->default(1);
            $table->string('codigo_autorizacao');
            $table->date('data_transacao')->default(timestamp()); //json
            $table->date('data_confirmacao')->nullable();
            $table->timestamps();

            $table->index('id_pedido', 'idx_pagamento_pedido');
            $table->index('status', 'idx_pagamento_status');
            $table->index('gateway_pagamento', 'idx_pagamento_gateway');
            $table->unique(['id_transacao_gateway', 'gateway_pagamento', 'variacao_id'], 'uk_transacao_gateway');        
      
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagamentos');
    }
};
