<?php

namespace App\Livewire\Compromisos;

use App\Models\Compromiso;
use App\Models\Dependencia;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Validate;
use Livewire\Component;

class EditCompromiso extends Component
{
    /*
     * Valores que llegan para montar los datos en el formulario
     * */
    #[Validate('required', message: 'El campo es requerido')]
    public $compromiso_numero;
    #[Validate('required', message: 'El campo es requerido')]
    public $compromiso_nombre;
    //#[Validate('required', message: 'El campo es requerido')]
    public $dependencia_id;
    //#[Validate('required', message: 'El campo es requerido')]
    public $compromiso_dependencia_intervienen = [];
    #[Locked]
    public $compromiso_id;

    public $longitud_nombre_compromiso;

    public function mount(Compromiso $compromiso): void
    {
        $this->compromiso_id = $compromiso->id;
        $this->compromiso_numero = $compromiso->compromiso_numero;
        $this->compromiso_nombre = $compromiso->compromiso_nombre;
        $this->dependencia_id = $compromiso->dependencia_id;
        $this->compromiso_dependencia_intervienen = json_decode($compromiso->compromiso_dependencia_intervienen);

        $this->longitud_nombre_compromiso = strlen($compromiso->compromiso_nombre);
    }

    public function character_count()
    {
        $this->longitud_nombre_compromiso = strlen($this->compromiso_nombre);
    }

    public function render()
    {
        $dependencias = Dependencia::all();

        return view('livewire.compromisos.edit-compromiso', [
            'dependencias' => $dependencias,
        ]);
    }

    public function editCompromiso()
    {

        $valida_datos = $this->validate();
        $valida_datos['dependencia_id'] = $this->dependencia_id;

        if($valida_datos['dependencia_id'] === '') {
            $valida_datos['dependencia_id'] = null;
        }

        $compromiso = Compromiso::find($this->compromiso_id, 'id');
        $compromiso->compromiso_numero = $valida_datos['compromiso_numero'];
        $compromiso->compromiso_nombre = $valida_datos['compromiso_nombre'];
        $compromiso->dependencia_id = $valida_datos['dependencia_id'];
        $compromiso->compromiso_dependencia_intervienen = json_encode($this->compromiso_dependencia_intervienen);
        $doneRecordCompromiso = $compromiso->save();

        if ($doneRecordCompromiso) {
            session()->flash('message', 'El compromiso se actualizo correctamente!');
            return redirect()->route('compromisos');
        } else {
            session()->flash('message', 'El compromiso no se pudo crear!');
        }
    }
}
