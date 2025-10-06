<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conductor_Contrato extends Model
{
    Use HasFactory;
    protected $table = 'conductores_contratos';
    protected $fillable = ['id',
        'conductor_id',
        'contrato_id',
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
    //relacion con Contrato(Muchos a uno)
    public function contrato() {
        return $this->belongto(Contrato::class);
    }
}
