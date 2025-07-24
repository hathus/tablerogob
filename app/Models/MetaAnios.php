<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MetaAnios extends Model
{
    protected $fillable = [
        'meta_anio',
        'meta_monto',
        'dependencia_compromiso_id',
    ];
}
