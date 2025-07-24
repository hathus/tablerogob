<?php

namespace App\Livewire\Compromisos;

use App\Models\Compromiso;
use App\Models\Dependencia;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateCompromiso extends Component
{
    #[Validate('required', message: 'El campo es requerido')]
    public $compromiso_numero;
    #[Validate('required', message: 'El campo es requerido')]
    public $compromiso_nombre;

    public $compromiso_dependencia_intervienen = [];

    public $dependencia_id;
    public $longitud_nombre_compromiso;

    public function mount(Compromiso $compromiso)
    {
        $this->longitud_nombre_compromiso = strlen($compromiso->compromiso_nombre);
        $this->compromiso_numero = $compromiso->compromiso_numero;
    }

    public function character_count()
    {
        $this->longitud_nombre_compromiso = strlen($this->compromiso_nombre);
    }

    public function render()
    {
        $dependencias = Dependencia::all();

        return view('livewire.compromisos.create-compromiso', [
            'dependencias' => $dependencias,
        ]);
    }

    public function store()
    {
        $valida_datos = $this->validate();
        $valida_datos['compromiso_numero'] = $this->compromiso_numero;
        $valida_datos['compromiso_nombre'] = $this->compromiso_nombre;
        $valida_datos['dependencia_id'] = $this->dependencia_id;
        $valida_datos['compromiso_dependencia_intervienen'] = json_encode($this->compromiso_dependencia_intervienen);

        if ($valida_datos['dependencia_id'] === '') {
            $valida_datos['dependencia_id'] = null;
        }

        try {
            $doneRecordCompromiso = Compromiso::create($valida_datos);

            if ($doneRecordCompromiso) {
                session()->flash('message', 'El compromiso se creo correctamente!');
            } else {
                session()->flash('message', 'El compromiso no se pudo crear!');
            }
        } catch (\Throwable $th) {
            session()->flash('message', 'El compromiso no se pudo crear, ese numero ya existe!');
        }
        return redirect()->route('compromisos');
    }
}
