<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conductor extends Model
{
    Use HasFactory;
    protected $table = 'conductores';
    protected $primaryKey = 'id';
    protected $fillable = ['id',
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
    public function viajes()
    {
        return $this->hasMany(Viaje::class, 'conductores_id');
    }
    //relacion con Conductor_Contrato(uno a muchos)
    public function conductor_contratos()
    {
        return $this->hasMany(Conductor_Contrato::class, 'conductor_id');
    }
}
