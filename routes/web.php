<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpeciesController;
use App\Http\Controllers\GuideController;
use App\Http\Controllers\HabitatController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MilestoneController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [HomeController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('/species', SpeciesController::class)->only(['index', 'create', 'store', 'show', 'edit', 'destroy', 'update']);
    Route::resource('/guides', GuideController::class)->only(['index', 'create', 'store', 'show', 'edit', 'destroy', 'update']);
    Route::resource('/habitats', HabitatController::class)->only(['index', 'create', 'store', 'show', 'edit', 'destroy', 'update']);

    Route::get('/milestone-dashboard', [MilestoneController::class, 'dashboard'])->name('milestone.dashboard');
    Route::get('/milestone-leaderboard', [MilestoneController::class, 'leaderboard'])->name('milestone.leaderboard');
});

require __DIR__ . '/auth.php';

