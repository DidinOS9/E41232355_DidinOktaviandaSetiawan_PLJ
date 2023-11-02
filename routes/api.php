<?php

use App\Http\Controllers\ApiPendidikanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('api_pendidikan', [ApiPendidikanController::class, 'getAll']);
Route::get('api_pendidikan/{id}', [ApiPendidikanController::class, 'getPen']);
Route::post('api_pendidikan', [ApiPendidikanController::class, 'createPen']);
Route::put('api_pendidikan/{id}', [ApiPendidikanController::class, 'updatePen']);
Route::delete('api_pendidikan/{id}', [ApiPendidikanController::class, 'deletePen']);

// Route::get('pengalaman_kerja', [ApiPendidikanController::class, 'getAll']);
// Route::get('pengalaman_kerja/{id}', [ApiPendidikanController::class, 'getPen']);
// Route::post('pengalaman_kerja', [ApiPendidikanController::class, 'createPen']);
// Route::put('pengalaman_kerja/{id}', [ApiPendidikanController::class, 'updatePen']);
// Route::delete('pengalaman_kerja/{id}', [ApiPendidikanController::class, 'deletePen']);
