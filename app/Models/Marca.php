<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    Use HasFactory;
    protected $table = 'marcas';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nombre',
        'pais_origen',
        'estado',
        'registrado_por',
    ];
    protected $guarded=[ 'id',
    'created_at',
    'updated_at'   
    ];

    //relacion con vehiculo(muchos a uno)
    // public function vehiculos()
    // {
    //     return $this->belongto(Vehiculo::class);
    // }

    //relacion con vehiculo(uno a muchos)
    public function vehiculos()
    {
        return $this->hasMany(Vehiculo::class, 'marca_id');
    }
}
