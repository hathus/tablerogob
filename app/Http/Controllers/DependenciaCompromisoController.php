<?php

namespace App\Http\Controllers;

use App\Models\DependenciaCompromiso;

class DependenciaCompromisoController extends Controller
{
    public function show(DependenciaCompromiso $dependencia_compromiso)
    {
        return view('dependencia-compromisos.show', [
            'dependencia_compromiso' => $dependencia_compromiso,
        ]);
    }

    public function edit(DependenciaCompromiso $dependencia_compromiso)
    {
        return view('dependencia-compromisos.edit', [
            'dependencia_compromiso' => $dependencia_compromiso,
        ]);
    }

    public function ficha(DependenciaCompromiso $dependencia_compromiso)
    {
        return view('dependencia-compromisos.ficha', [
            'dependencia_compromiso' => $dependencia_compromiso,
        ]);
    }
}
