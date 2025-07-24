<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Eje;

class ShowDashboard extends Component
{
    public $eje_id;

    public $sub_sector_numero;

    public $dependencias;

    public function mount()
    {
        $this->sub_sector_numero = 1;
        $this->changeEje($this->sub_sector_numero);
    }

    public function render()
    {
        $ejes = DB::table('ejes')
            ->get();

        return view('livewire.dashboard.show-dashboard', [
            'ejes' => $ejes,
            'dependencias' => $this->dependencias,
        ]);
    }

    public function changeEje($sub_sector_numero)
    {
        $this->sub_sector_numero = $sub_sector_numero;
        $this->dependencias = DB::table('dependencias')
            ->join('dependencia_sectors', 'dependencias.id', '=', 'dependencia_sectors.dependencia_id')
            ->join('ejes', 'dependencia_sectors.eje_id', '=', 'ejes.id')
            ->where('ejes.sub_sector_numero', $this->sub_sector_numero)
            ->get();

        $this->dispatch('changed-eje', ejeId: $this->sub_sector_numero);
    }
}
