<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSpeciesRequest;
use App\Http\Requests\UpdateSpeciesRequest;
use App\Models\Species;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SpeciesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $species = Species::all();
        return view('species.index')->with('species', $species);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $species = Species::all();
        return view('species.create')->with('species', $species);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required|max:3000',
            'origin' => 'required|max:20',
            'habitat' => 'required',
            'lat' => 'required',
            'lng' => 'required',
            'sighting_year' => 'required|digits:4',
            'risk_level' => 'required|digits:3',
            'species_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle image upload
        if ($request->hasFile('species_image')) {
            $image = $request->file('species_image');
            $imageName = time() . '.' . $image->extension();
            $image->storeAs('public/species', $imageName);
            $species_image_name = 'storage/species/' . $imageName;
        }

        // Create the species
        Species::create([
            'title' => $request->title,
            'description' => $request->description,
            'origin' => $request->origin,
            'habitat' => $request->habitat,
            'lat' => $request->lat,
            'lng' => $request->lng,
            'sighting_year' => $request->sighting_year,
            'risk_level' => $request->risk_level,
            'species_image' => $species_image_name
        ]);

        // Redirect to the index page with a success message
        return to_route('species.index')->with('success', 'Species created successfully');
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
    public function update(Request $request, Species $species)
    {
        // $user = Auth::user();
        // $user->authorizeRoles('admin');

        $request->validate([
            'title' => 'required',
            'description' => 'required|max:500',
            'origin' => 'required|max:20',
            'habitat' => 'required',
            'lat' => 'required',
            'lng' => 'required',
            'sighting_year' => 'required|digits:4',
            'risk_level' => 'required|digits:3',
            'species_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',


        ]);

        if ($request->hasFile('species_image')) {
            $image = $request->file('species_image');
            $imageName = time() . '.' . $image->extension();

            $image->storeAs('public/species', $imageName);
            $species_image_name = 'storage/species/' . $imageName;
        }

        $species->update([
            'title' => $request->title,
            'description' => $request->description,
            'origin' => $request->origin,
            'habitat' => $request->habitat,
            'lat' => $request->lat,
            'lng' => $request->lng,
            'sighting_year' => $request->sighting_year,
            'risk_level' => $request->risk_level,
            'species_image' => $species_image_name,
        ]);
        return to_route('species.show', $species)->with('success', 'Species updated successfully!');
        // return redirect()->route('species.show', $species)->with('success', 'Species updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Species $species)
    {
            $species->delete();
            return to_route('species.index')->with('success', 'Species deleted successfully');
    }
}
