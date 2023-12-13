<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarsController;
use App\Http\Controllers\ArendatorsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TarifsController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::apiResources(['cars' => CarsController::class,'arendators' => ArendatorsController::class]);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'api','prefix' => 'auth'], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
    Route::get('cars', [CarsController::class, 'index']);
    Route::get('cars/{id}', [CarsController::class, 'show']);
    Route::post('cars/create', [CarsController::class, 'store']);
    Route::put('cars/{id}/update', [CarsController::class, 'update']);
    Route::delete('cars/{id}/delete', [CarsController::class, 'destroy']);
    Route::get('arend', [ArendatorsController::class, 'index']);
    Route::get('arend/{id}', [ArendatorsController::class, 'show']);
    Route::post('arend/create', [ArendatorsController::class, 'store']);
    Route::put('arend/{id}/update', [ArendatorsController::class, 'update']);
    Route::delete('arend/{id}/delete', [ArendatorsController::class, 'destroy']);
});