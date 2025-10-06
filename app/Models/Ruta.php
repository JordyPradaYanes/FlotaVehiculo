<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ruta extends Model
{
    Use HasFactory;
    protected $table = 'rutas';
    protected $primaryKey = 'id';
    protected $fillable = ['id',
        'nombre_ruta',
        'descripcion',
        'distancia_en_km',
        'tiempo_estimado',
        'costo_peaje',
        'estado',
        'registrado_por',
    ];
    protected $guarded=[
        'created_at',
        'updated_at'   
    ];

    //relacion con viaje(uno a muchos)
    public function viajes()
    {
        return $this->hasMany(Viaje::class, 'rutas_id');
    }

}
