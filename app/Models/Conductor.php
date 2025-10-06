<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Conductor extends Model
{
    Use HasFactory;
    protected $table = 'conductores';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nombre',
        'apellido',
        'documento',
        'fecha_nacimiento',
        'estado',
        'registrado_por',
    ];
    protected $guarded=['id',
        'created_at',
        'updated_at'   
    ];

    //relacion con viaje(uno a muchos)
    public function viaje()
    {
        return $this->hasMany(Viaje::class, 'conductor_id');
    }
    //relacion con Conductor_Contrato(uno a muchos)
    public function conductor_contrato()
    {
        return $this->hasMany(Conductor_Contrato::class, 'conductor_id');
    }
}
