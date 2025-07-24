<?php

namespace App\Http\Controllers;

use App\Models\Eje;
use Illuminate\Http\Request;

class EjeController extends Controller
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
    public function show(Eje $eje)
    {
        return view('ejes.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Eje $eje)
    {
        return view('ejes.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Eje $eje)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Eje $eje)
    {
        //
    }
}
