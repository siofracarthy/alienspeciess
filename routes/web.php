<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpeciesController;
use App\Http\Controllers\GuideController;


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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware('auth')->group(function () {
    Route::resource('/species', SpeciesController::class)->only(['index', 'create', 'store', 'show', 'edit', 'destroy', 'update']);
    Route::resource('/guides', GuideController::class)->only(['index', 'create', 'store', 'show', 'edit', 'destroy', 'update']);
    Route::get('/guides/create', [GuideController::class, 'create'])->name('guides.create');
    Route::get('/guides/show', [GuideController::class, 'show'])->name('guides.show');
    Route::get('/guides/index', [GuideController::class, 'index'])->name('guides.index');
    Route::get('/guides', [GuideController::class, 'index'])->name('guides.index');






});






require __DIR__ . '/auth.php';
