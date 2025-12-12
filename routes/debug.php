<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

// Ruta temporal para ver colores
Route::get('/debug/colores', function () {
    $colores = DB::table('vehiculos')
        ->select('color', DB::raw('COUNT(*) as cantidad'))
        ->groupBy('color')
        ->orderBy('color')
        ->get();
    
    $html = '<h1>Colores en la Base de Datos</h1>';
    $html .= '<table border="1" cellpadding="10">';
    $html .= '<tr><th>Color</th><th>Cantidad</th></tr>';
    
    foreach ($colores as $color) {
        $html .= "<tr><td>{$color->color}</td><td>{$color->cantidad}</td></tr>";
    }
    
    $html .= '</table>';
    $html .= '<p><strong>Total: ' . $colores->count() . ' colores diferentes</strong></p>';
    
    return $html;
});
