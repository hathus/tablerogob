<?php

namespace App\Http\Controllers;

use App\Models\TipoCompromiso;
use Illuminate\Http\Request;

class TipoCompromisoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TipoCompromiso $tipoCompromiso)
    {
        return view('tipo-compromiso.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TipoCompromiso $tipoCompromiso)
    {
        return view('tipo-compromiso.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TipoCompromiso $tipoCompromiso)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TipoCompromiso $tipoCompromiso)
    {
        //
    }
}
