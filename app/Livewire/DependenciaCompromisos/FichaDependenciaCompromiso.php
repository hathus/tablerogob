<?php

namespace App\Livewire\DependenciaCompromisos;

use Livewire\Component;
use App\Models\Dependencia;
use App\Models\DependenciaCompromiso;
use App\Models\UnidadMedida;
use Livewire\Attributes\Locked;

class FichaDependenciaCompromiso extends Component
{
    #[Locked]
    public $dependencia_compromiso;

    public $yearLabels = [];

    public $yearMontosPresupuesto = [];

    public $unidad_medidas = [];

    public function render()
    {
        $dependencias = Dependencia::all();
        $unidad_medidas = UnidadMedida::all();

        return view('livewire.dependencia-compromisos.ficha-dependencia-compromiso', [
            'dependencias' => $dependencias,
            'unidad_medidas' => $unidad_medidas,
        ]);
    }

    public function mount(DependenciaCompromiso $dependencia_compromiso)
    {
        $this->yearLabels = $this->dependencia_compromiso->presupuestoMontoAnios->pluck('presupuesto_anio')->unique()->toArray();
        $this->yearMontosPresupuesto = $this->dependencia_compromiso->presupuestoMontoAnios->pluck('presupuesto_monto')->toArray();
        $this->unidad_medidas = $dependencia_compromiso->unidad_medidas ? json_decode($dependencia_compromiso->unidad_medidas, true) : [];

        $this->dependencia_compromiso = DependenciaCompromiso::with([
            'compromiso',
            'compromisoDependenciaIntervienen',
            ])->where('id', '=', $dependencia_compromiso->id)->firstOrFail();
    }

}
