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
            $table->foreignId('id_vehiculos')->constrained('vehiculos');
            $table->foreignId('id_conductores')->constrained('conductores');
            $table->foreignId('id_rutas')->constrained('rutas');
            $table->dateTime('tiempo_estimado');
            $table->decimal('km_inicial', 10, 2);
            $table->decimal('km_final', 10, 2)->nullable();
            $table->decimal('kilometraje', 10, 2)->nullable();
            $table->decimal('costo_total', 10, 2)->nullable();
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