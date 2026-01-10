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
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->string('numero_pedido')->unique(); // Formato: PED-2024-001
            $table->unsignedBigInteger('id_usuario');   
            // Status
            $table->enum('status', [
                'PENDENTE',          // Criado, aguardando pagamento
                'AGUARDANDO_PAGAMENTO',
                'PAGAMENTO_ANALISE',
                'PAGO',              // Pagamento confirmado
                'PROCESSANDO',       // Separando pedido
                'ENVIADO',           // Enviado para transporte
                'ENTREGUE',          // Cliente recebeu
                'CANCELADO',         // Pedido cancelado
                'REEMBOLSADO',       // Valor devolvido     
                'CHARGEBACK'         // Disputa no cartão
            ])->default('PENDENTE');
            // Endereços
            $table->json('endereco_entrega_json')->nullable(); // Cópia do endereço no momento da compra
            $table->json('endereco_cobranca_json')->nullable();
            // Valores
            $table->decimal('subtotal', 10, 2);
            $table->decimal('desconto', 10, 2)->default(0);
            $table->decimal('frete', 10, 2)->default(0);
            $table->decimal('total', 10, 2);
            // Métodos de pagamento         
            $table->enum('metodo_pagamento', ['CARTAO', 'BOLETO', 'PIX', 'TRANSFERENCIA', 'DINHEIRO'])->default('CARTAO');      
            $table->integer('parcelas')->default(1);
            // Transporte
            $table->string('codigo_rastreio')->nullable();
            $table->string('transportadora')->nullable();
            // Datas importantes
            $table->dateTime('data_pedido')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('data_pagamento')->nullable();
            $table->dateTime('data_envio')->nullable();
            $table->dateTime('data_entrega')->nullable();
            $table->dateTime('data_cancelamento')->nullable();
            // Observações
            $table->text('observacoes')->nullable();
            $table->string('nota_fiscal_url', 500)->nullable();     
            $table->timestamps();

            $table->index('id_usuario', 'idx_pedido_usuario');
            $table->index('status', 'idx_pedido_status');
            $table->index('numero_pedido', 'idx_pedido_numero');
            $table->index('data_pedido', 'idx_pedido_data');
            $table->index('metodo_pagamento', 'idx_pedido_metodo_pagamento');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
