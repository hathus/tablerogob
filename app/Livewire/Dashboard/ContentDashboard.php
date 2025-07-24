<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\DB;

class ContentDashboard extends Component
{

    public $dependencias;

    public function mount($dependencias)
    {
        $this->dependencias = $dependencias;
    }

    public function render()
    {
        return view('livewire.dashboard.content-dashboard',[
            'dependencias' => $this->dependencias,
        ]);
    }

    #[On('changed-eje')]
    public function changedEje($ejeId)
    {
        $this->dependencias = DB::table('dependencias')
            ->join('dependencia_sectors', 'dependencias.id', '=', 'dependencia_sectors.dependencia_id')
            ->join('ejes', 'dependencia_sectors.eje_id', '=', 'ejes.id')
            ->where('ejes.sub_sector_numero', $ejeId)
            ->get();

        $query = DB::table('compromisos')
            ->where('compromisos.dependencia_id', '=', 3)
            ->get();
    }
}
