<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PresupuestoMontoAnios extends Model
{
    protected $fillable = [
        'presupuesto_anio',
        'presupuesto_monto',
        'tipo_recurso',
        'dependencia_compromiso_id',
    ];
}
