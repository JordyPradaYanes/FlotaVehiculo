<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Licencia extends Model
{
    Use HasFactory;
    protected $table = 'licencias';
    protected $primaryKey = 'id';
    protected $fillable = ['id',
        'numero_licencia',
        'tipo_licencia',
        'fecha_expedicion',
        'fecha_vencimiento',
        'entidad_emisora',
        'estado',
        'registrado_por',
    ];
    protected $guarded=['id',
        'created_at',
        'updated_at'   
    ];
    //relacion con Conductor_Licencia(uno a muchos)
    public function conductor_licencias()
    {
        return $this->hasMany(Conductor_Licencia::class, 'licencia_id');
    }
}
