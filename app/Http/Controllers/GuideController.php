<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGuideRequest;
use App\Http\Requests\UpdateGuideRequest;
use App\Models\Guide;
use App\Models\Species;
use Illuminate\Http\Request;


class GuideController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guides = Guide::all();
        return view('guides.index')->with('guides', $guides);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $guides = Guide::all();
        return view('guides.create')->with('guide', $guides);
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
    public function show(Guide $guide)
    {

        $species = $guide->species;
        return view('guides.show', compact('guide', 'species'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Guide $guide)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGuideRequest $request, Guide $guide)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guide $guide)
    {
        //
    }
}
