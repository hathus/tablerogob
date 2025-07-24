<?php

namespace App\Livewire\Compromisos;

use App\Models\Compromiso;
use App\Models\Dependencia;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class ShowCompromiso extends Component
{
    use WithPagination;

    public $search = '';
    public $searchType = 'all'; // 'all', 'numero', 'nombre', 'dependencia'
    
    protected $paginationTheme = 'tailwind';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingSearchType()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = Compromiso::with('dependencia');

        if (!empty($this->search)) {
            switch ($this->searchType) {
                case 'numero':
                    $query->where('compromiso_numero', 'like', '%' . $this->search . '%');
                    break;
                case 'nombre':
                    $query->where('compromiso_nombre', 'like', '%' . $this->search . '%');
                    break;
                case 'dependencia':
                    $query->whereHas('dependencia', function ($q) {
                        $q->where('dependencia_nombre', 'like', '%' . $this->search . '%');
                    });
                    break;
                default: // 'all'
                    $query->where(function ($q) {
                        $q->where('compromiso_numero', 'like', '%' . $this->search . '%')
                          ->orWhere('compromiso_nombre', 'like', '%' . $this->search . '%')
                          ->orWhereHas('dependencia', function ($subQuery) {
                              $subQuery->where('dependencia_nombre', 'like', '%' . $this->search . '%');
                          });
                    });
                    break;
            }
        }

        $compromisos = $query->paginate(5);
        $dependencias = Dependencia::all();

        return view('livewire.compromisos.show-compromiso', [
            'compromisos' => $compromisos,
            'dependencias' => $dependencias,
        ]);
    }

    #[On('eliminar-compromiso')]
    public function eliminarCompromiso($id): void
    {
        $compromiso = Compromiso::find($id);
        $compromiso->delete();
    }

    public function clearSearch()
    {
        $this->search = '';
        $this->searchType = 'all';
        $this->resetPage();
    }
}