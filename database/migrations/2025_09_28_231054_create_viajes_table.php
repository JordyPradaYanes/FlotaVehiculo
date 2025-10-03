<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('viajes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehiculos_id')->constrained('vehiculos');
            $table->foreignId('conductores_id')->constrained('conductores');
            $table->foreignId('rutas_id')->constrained('rutas');
            $table->string('descripcion')->nullable();
            $table->decimal('distancia_km', 10, 2)->nullable();
            $table->dateTime('tiempo_estimado');
            $table->decimal('costo_peaje', 10, 2)->nullable();
            $table->string('estado');
            $table->string('registrado_por');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('viajes');
    }
};