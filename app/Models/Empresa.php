<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    Use HasFactory;
    protected $table = 'empresas';
    protected $primaryKey = 'id';
    protected $fillable = ['id',
        'nombre_empresa',
        'direccion',
        'telefono',
        'email',
        'estado',
        'registrado_por',
    ];
    protected $guarded=['id',
        'created_at',
        'updated_at'   
    ];
    //relacion con Vehiculo(uno a muchos)
    // public function vehiculos()
    // {
    //     return $this->hasMany(Vehiculo::class, 'empresa_id');
    // }
}
