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
        Schema::create('cupoms', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->unique();
            $table->string('descricao');
            $table->enum('tipo_desconto',[
                'PORCENTAGEM',
                'VALOR_FIXO',
            ])->default('PORCENTAGEM');
            $table->decimal('valor_desconto', 10,2);
            $table->decimal('valor_minimo', 10,2);
            $table->integer('quantidade_total')->nullable();
            $table->integer('quantidade_usada')->default(0);
            $table->integer('uso_por_cliente')->default(1);
            $table->date('data_fim');
            $table->date('data_inicio');
            $table->boolean('ativo')->default(true);
            $table->index('codigo');
            $table->index('ativo');
            $table->index('data_fim');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cupoms');
    }
};
