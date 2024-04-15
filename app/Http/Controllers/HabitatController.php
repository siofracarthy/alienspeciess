<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreHabitatRequest;
use App\Http\Requests\UpdateHabitatRequest;
use App\Models\Habitat;
use App\Models\Species;
use Illuminate\Http\Request;

class HabitatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $habitats = Habitat::all();
        return view ('habitats.index')->with('habitats', $habitats);
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
    public function show(Habitat $habitat)
    {
        $species = $habitat->species;

        return view('habitats.show', compact('habitat', 'species'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Habitat $habitat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHabitatRequest $request, Habitat $habitat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Habitat $habitat)
    {
        //
    }
}
