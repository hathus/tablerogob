<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class DependenciaCompromiso extends Model
{
    protected $fillable = [
        'planeacion_estrategica',
        'planeacion_operativa',
        'tipo_cobertura',
        'municipios', /* Tipo JSON */
        'unidad_medida',
        'unidad_medidas', /* Tipo JSON */
        'accion_realizada',
        'beneficiarios',
        'fuente_informacion', /* Tipo JSON */
        'medio_verificacion',
        'presupuesto_ejercido',
        'porcentaje_cumplimiento',
        'meta_acumulada',
        'tipo_compromiso_id',
        'compromiso_id',
        'tipo_recurso',
        'usuario_id',
    ];

    public function compromisos() : BelongsToMany
    {
        return $this->belongsToMany(Compromiso::class);
    }

    public function metaAnios()
    {
        return $this->hasMany(MetaAnios::class);
    }

    public function presupuestoMontoAnios()
    {
        return $this->hasMany(PresupuestoMontoAnios::class);
    }

    public function evaluacionPorcentajeAnios()
    {
        return $this->hasMany(EvaluacionPorcentajeAnios::class);
    }

    public function tipoCompromiso()
    {
        return $this->belongsTo(TipoCompromiso::class);
    }

    public function dependenciasCompromisos()
    {
        return $this->hasMany(Dependencia::class, 'dependencia_compromiso_id');
    }

    public function getMunicipiosAttribute($value)
    {
        return json_decode($value, true);
    }

    public function getUnidadMedidasAttribute($value)
    {
        return json_decode($value, true);
    }

    public function getMedioVerificacionAttribute($value)
    {
        return json_decode($value, true);
    }

    public function getTipoCoberturaAttribute($value)
    {
        return json_decode($value, true);
    }

    public function compromiso()
    {
        return $this->belongsTo(Compromiso::class, 'compromiso_id');
    }

    public function getCompromisoNumeroAttribute()
    {
        return $this->compromiso ? $this->compromiso->compromiso_numero : null;
    }

    public function compromisoDependenciaIntervienen()
    {
        return $this->belongsToMany(
            Dependencia::class,
            'compromisos',
            'dependencia_id',
            'dependencia_id'
        );
    }
}
