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
        Schema::create('processos', function (Blueprint $table) {
            $table->id();
            $table->string('numero_siarco', 50);
            $table->string('responsavel_processo', 100);
            $table->integer('posicao')->nullable();
            $table->string('path', 255);
            $table->string('corrigir_pdf', 10)->nullable($value = true);

            $table->foreignId('caixa_id')->constrained('caixas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('processos');
    }
};
