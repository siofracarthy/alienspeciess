<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSpeciesRequest;
use App\Http\Requests\UpdateSpeciesRequest;
use App\Models\Species;
use Illuminate\Support\Facades\Auth;

class SpeciesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('species.index');
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
    public function store(StoreSpeciesRequest $request)
    {

        return view('species.create');
        // $user = Auth::user();


        // $request->validate([
        //     'title' => 'required',
        //     'description' => 'required|max:500',
        //     'origin' => 'required|max:3',
        //     'habitat' => 'required',
        //     'sighting_year' => 'required|max:2',
        //     'risk_level' => 'required',
        //     'species_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        // ]);

        // //creates unique name for image file
        // if ($request->hasFile('species_image')) {
        //     $image = $request->file('species_image');
        //     $imageName = time() . '.' . $image->extension();
        //     // stores file in public disk under the species directory
        //     $image->storeAs('public/species', $imageName);
        //     $species_image_name = 'storage/species/' . $imageName;
        // }


        // $species = Species::create([
        //     'title' => $request->title,
        //     'description' => $request->description,
        //     'origin' => $request->run_time,
        //     'habitat' => $request->release_date,
        //     'sighting_year' => $request->age_rating,
        //     'risk_level' => $request->original_language,
        //     'species_image' => $species_image_name
        // ]);


        // return to_route('species.index')->with('success', 'Species created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Species $species)
    {
        return view('species.show')->with('species', $species);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Species $species)
    {

        return view('species.edit')->with('species', $species);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSpeciesRequest $request, Species $species)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Species $species)
    {
        //
    }
}
