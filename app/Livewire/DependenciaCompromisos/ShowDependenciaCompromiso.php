<?php

namespace App\Livewire\DependenciaCompromisos;

use App\Models\Dependencia;
use App\Models\DependenciaCompromiso;
use Livewire\Component;

class ShowDependenciaCompromiso extends Component
{
    public function render()
    {
        $dependencias = Dependencia::all();
        $dependencia_compromisos = DependenciaCompromiso::with([
            'compromiso',
            'compromisoDependenciaIntervienen',
        ])->get();

        return view('livewire.dependencia-compromisos.show-dependencia-compromiso', [
            'dependencia_compromisos' => $dependencia_compromisos,
            'dependencias' => $dependencias,
        ]);
    }
}
