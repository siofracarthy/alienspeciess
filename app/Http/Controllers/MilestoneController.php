<?php

namespace App\Http\Controllers;

use App\Models\Milestone;
use App\Models\User;
use Illuminate\Http\Request;

class MilestoneController extends Controller
{
    /**
     * Display a listing of the milestones.
     */
    public function index()
    {
        $milestones = Milestone::all();
        return view('milestones.index', compact('milestones'));
    }

    /**
     * Display a leaderboard of users.
     */
    public function leaderboard()
    {
        $users = User::orderBy('score', 'desc')->get();

        // Assuming you already have $species and $guides data
        return view('milestones.leaderboard', compact('users'));
    }

    /**
     * Dashboard for milestone.
     */
    public function dashboard()
    {
        $users = User::orderByDesc('score')->get();
        return view('dashboard', compact('users'));
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
    public function show(Milestone $milestone)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Milestone $milestone)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Milestone $milestone)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Milestone $milestone)
    {
        //
    }
}
