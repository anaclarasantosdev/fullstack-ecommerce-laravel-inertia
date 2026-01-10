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
        Schema::create('pedido_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pedido_id');
            $table->foreignId('produto_id');
            $table->foreignId('variacao_id')->nullable();
            $table->string('nome_produto', 200);
            $table->string('sku', 50);      
            $table->integer('quantidade');
            $table->decimal('preco_unitario', 10, 2);
            $table->decimal('subtotal', 10, 2)->storedAs('quantidade * preco_unitario');    
           $table->index('pedido_id', 'idx_pedido_item_pedido');
            $table->index('produto_id', 'idx_pedido_item_produto');     
            $table->timestamps();
        });
    }


    /*  
-- ITENS DO PEDIDO
CREATE TABLE Pedido_Item (
    id_pedido_item INT PRIMARY KEY AUTO_INCREMENT,
    id_pedido INT NOT NULL,
    id_produto INT NOT NULL,
    id_variacao INT NULL,
    nome_produto VARCHAR(200) NOT NULL, -- Cópia no momento da compra
    sku VARCHAR(50) NOT NULL,
    quantidade INT NOT NULL,
    preco_unitario DECIMAL(10,2) NOT NULL,
    subtotal DECIMAL(10,2) GENERATED ALWAYS AS (quantidade * preco_unitario) STORED,
    
    FOREIGN KEY (id_pedido) REFERENCES Pedido(id_pedido) ON DELETE CASCADE,
    FOREIGN KEY (id_produto) REFERENCES Produto(id_produto),
    FOREIGN KEY (id_variacao) REFERENCES Variacao(id_variacao),
    
    INDEX idx_pedido_item_pedido (id_pedido),
    INDEX idx_pedido_item_produto (id_produto)
);

    */
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedido_items');
    }
};
