<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            
            // Tipo de usuário
            $table->enum('tipo', ['cliente', 'administrador', 'vendedor'])->default('cliente');
            
            // Documento (CPF para pessoa física, CNPJ para PJ)
            $table->string('cpf_cnpj', 20)->unique()->nullable();
            
            // Dados pessoais
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            
            // Dados adicionais
            $table->date('data_nascimento')->nullable();
            $table->string('telefone', 20)->nullable();
            $table->string('avatar_url', 500)->nullable();
            
            // Login social
            $table->string('google_id', 100)->unique()->nullable();
            $table->string('facebook_id', 100)->unique()->nullable(); // Adicionei também
            
            // Status e preferências
            $table->boolean('ativo')->default(true);
            $table->boolean('receber_newsletter')->default(true);
            
            // Datas importantes
            $table->timestamp('ultimo_login')->nullable(); // Mudei de date para timestamp
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes(); // Adicionei para exclusão lógica
            
            // Índices - FORMA CORRETA
            $table->index('email'); // Laravel gera nome automaticamente
            $table->index('tipo');
            $table->index('cpf_cnpj');
            $table->index('ativo');
            $table->index('created_at');
            
            // Se quiser nome personalizado nos índices (menos comum):
            // $table->index('email', 'idx_usuario_email');
            // $table->index('tipo', 'idx_usuario_tipo');
        }); // ← AQUI FECHA CORRETAMENTE
    /**
     * Run the migrations.
        */
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
