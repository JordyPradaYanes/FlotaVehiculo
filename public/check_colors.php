<?php

require __DIR__ . '/../vendor/autoload.php';

$app = require_once __DIR__ . '/../bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "=== COLORES REGISTRADOS EN LA BASE DE DATOS ===\n\n";

$colores = DB::table('vehiculos')
    ->select('color', DB::raw('COUNT(*) as cantidad'))
    ->groupBy('color')
    ->orderBy('color')
    ->get();

foreach ($colores as $color) {
    echo "- {$color->color} ({$color->cantidad} vehículos)\n";
}

echo "\n=== TOTAL: " . $colores->count() . " colores diferentes ===\n";
