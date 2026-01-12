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
        Schema::create('ticket_mensagem', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ticket_id')->constrained('ticket_suporte')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users');
            $table->text('mensagem');
            $table->string('anexo_url');
            $table->enum('tipo',[
                'CLIENTE',
                'ATENDENTE',
                'SISTEMA'
            ])->default('CLIENTE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket_mensagem');
    }
};
