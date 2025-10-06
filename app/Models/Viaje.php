<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Viaje extends Model
{
    Use HasFactory;
    protected $table = 'viajes';
    protected $primaryKey = 'id';
    protected $fillable = ['id',
        'vehiculos_id',
        'conductores_id',
        'rutas_id',
        'descripcion',
        'recorrido',
        'tiempo_estimado',
        'costo_total',
        'estado',
        'registrado_por',
    ];
    protected $guarded=[
        'created_at',
        'updated_at'   
    ];

    //relacion con vehiculo(muchos a uno)
    public function vehiculo()
    {
        return $this->belongto(Vehiculo::class, 'vehiculos_id');
    }
    //relacion con ruta(muchos a uno)
    public function ruta()
    {
        return $this->belongto(Ruta::class, 'rutas_id');
    }
    //relacion con conductor(muchos a uno)
    public function conductor()
    {
        return $this->belongto(Conductor::class);
    }
}
