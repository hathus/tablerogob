<?php

namespace App\Http\Controllers;

use App\Models\SubSector;
use Illuminate\Http\Request;

class SubSectorController extends Controller
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
    public function show(SubSector $subSector)
    {
        return view('subsector.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubSector $subSector)
    {
        return view('subsector.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubSector $subSector)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubSector $subSector)
    {
        //
    }
}
