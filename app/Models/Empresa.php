<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Empresa extends Model
{
    Use HasFactory;
    protected $table = 'empresas';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nit',
        'nombre',
        'direccion',
        'telefono',
        'email',
        'estado',
        'registrado_por'
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
