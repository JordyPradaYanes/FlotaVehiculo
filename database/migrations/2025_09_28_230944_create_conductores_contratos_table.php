<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('conductores_contratos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_conductor')->constrained('conductores');
            $table->foreignId('id_contrato')->constrained('contratos');
            $table->date('fecha_asignacion');
            $table->string('estado_asignacion');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('conductores_contratos');
    }
};