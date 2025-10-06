<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recarga_Combustible extends Model
{
    Use HasFactory;
    protected $table = 'recarga_combustibles';
    protected $primaryKey = 'id';
    protected $fillable = ['id',
        'cantidad_litros',
        'precio_litro',
        'costo_total',
        'tipo_combustible',
        'estacion_servicio',
        'registrado_por',
    ];
    protected $guarded=['id',
        'created_at',
        'updated_at'   
    ];
    //relacion con vehiculo(muchos a uno)
    public function vehiculo()
    {
        return $this->belongto(Vehiculo::class);
    }
}
