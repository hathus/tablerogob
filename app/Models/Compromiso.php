<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Compromiso extends Model
{
    protected $fillable = [
        'compromiso_numero',
        'compromiso_nombre',
        'dependencia_id',
        'compromiso_dependencia_intervienen',
    ];

    public function dependencia(): BelongsTo
    {
        return $this->belongsTo(Dependencia::class);
    }
}
