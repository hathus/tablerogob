<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EvaluacionPorcentajeAnios extends Model
{
    protected $fillable = [
        'evaluacion_anio',
        'evaluacion_monto',
        'dependencia_compromiso_id',
    ];
}
