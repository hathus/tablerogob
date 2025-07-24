<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Dependencia extends Model
{
    public function compromisos():HasMany
    {
        return $this->hasMany(Compromiso::class);
    }

    public function dependenciaCompromisos():HasManyThrough
    {
        return $this->hasManyThrough(DependenciaCompromiso::class, Compromiso::class);
    }
}
