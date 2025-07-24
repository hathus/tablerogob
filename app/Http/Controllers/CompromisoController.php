<?php

namespace App\Http\Controllers;

use App\Models\Compromiso;

class CompromisoController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(Compromiso $compromiso)
    {
        return view('compromisos.show', [
                'compromiso' => $compromiso,
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Compromiso $compromiso)
    {
        return view('compromisos.edit', [
                'compromiso' => $compromiso,
            ]
        );
    }
}
