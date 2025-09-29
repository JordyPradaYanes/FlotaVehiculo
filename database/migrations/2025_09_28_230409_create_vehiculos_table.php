<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_marcas')->constrained('marcas');
            $table->foreignId('id_tipo_vehiculos')->constrained('tipo_vehiculos');
            $table->string('placa')->unique();
            $table->string('modelo');
            $table->year('año');
            $table->string('color');
            $table->decimal('kilometraje', 10, 2)->default(0);
            $table->string('estado');
            $table->string('registrado_por');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vehiculos');
    }
};