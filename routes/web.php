<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('cars', [CarsController::class, 'index'])->name('car.index');
Route::get('cars/{id}', [CarsController::class, 'show']);
Route::post('cars/create', [CarsController::class, 'store']);
Route::put('cars/{id}/update', [CarsController::class, 'update']);
Route::delete('cars/{id}/delete', [CarsController::class, 'destroy']);
Route::get('arend', [ArendatorsController::class, 'index']);
Route::get('arend/{id}', [ArendatorsController::class, 'show']);
Route::post('arend/create', [ArendatorsController::class, 'store']);
Route::put('arend/{id}/update', [ArendatorsController::class, 'update']);
Route::delete('arend/{id}/delete', [ArendatorsController::class, 'destroy']);

require __DIR__.'/auth.php';
