<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Using raw SQL to avoid dependency issues with doctrine/dbal for ->change()
        DB::statement("ALTER TABLE rutas MODIFY tiempo_estimado TIME NOT NULL");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("ALTER TABLE rutas MODIFY tiempo_estimado DECIMAL(10, 2) NOT NULL");
    }
};
