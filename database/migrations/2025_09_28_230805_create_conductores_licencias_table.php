<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('conductores_licencias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_conductor')->constrained('conductores');
            $table->foreignId('id_licencia')->constrained('licencias');
            $table->date('fecha_asociacion');
            $table->string('estado_asociacion');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('conductores_licencias');
    }
};
