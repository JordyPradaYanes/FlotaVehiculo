<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conductor_Licencia extends Model
{
    Use HasFactory;
    protected $table = 'conductores_licencias';
    protected $fillable = ['id',
        'conductor_id',
        'licencia_id',
        'fecha_asignacion',
        'estado_asignacion'
    ];

    protected $guarded=['id',
        'created_at',
        'updated_at'   
    ];
    //relacion con Conductor(Muchos a uno)
    public function conductor() {
        return $this->belongto(Conductor::class);
    }
    //relacion con Licencia(Muchos a uno)
    public function licencia() {
        return $this->belongto(Licencia::class);
    }
}
