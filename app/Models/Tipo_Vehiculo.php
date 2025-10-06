<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tipo_Vehiculo extends Model
{
    Use HasFactory;
    protected $table = 'tipo_vehiculos';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nombre',
        'descripcion',
        'capacidad_pasajero',
        'capacidad_carga',
        'capacidad_gasolina',
        'estado',
        'registrado_por',
    ];
    protected $guarded=[ 'id',
    'created_at',
    'updated_at'   
    ];

    //relacion con vehiculo(uno a muchos)
    public function vehiculos()
    {
        return $this->hasMany(Vehiculo::class, 'tipo_vehiculo_id');
    }
}
