<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;
    protected $table = 'vehiculos';
    protected $primaryKey = 'id';
    protected $fillable = [
        'marca',
        'modelo',
        'anio',
        'color',
        'placa',
        'tipo_vehiculo',
        'estado',
    ];
    protected $guarded=[ 'id',
    'created_at',
    'updated_at'   
    ];

    //relacion con marca(muchos a uno)
    public function marca()
    {
        return $this->belongto(Marca::class);
    }
    //relacion con tipo_vehiculo(muchos a uno)
    public function tipo_vehiculo()
    {
        return $this->belongto(Tipo_Vehiculo::class);   
    }
    //relacion con viaje(uno a muchos)
    public function viaje()
    {
        return $this->hasMany(Viaje::class, 'vehiculos_id');   
    }
    //relacion con recarga_combustible(uno a muchos)
    public function recarga_combustible()
    {
        return $this->hasMany(Recarga_Combustible::class, 'vehiculos_id');   
    }
}
