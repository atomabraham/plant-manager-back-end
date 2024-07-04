<?php

use App\Http\Controllers\ArrosageController;
use App\Http\Controllers\PlantController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WateringLogController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::apiResource('plants', PlantController::class);
Route::apiResource('arrosages', ArrosageController::class);
Route::post('/arrosages/{plant_id}', [ArrosageController::class, 'store']);
Route::post('/plants/{plant_id}/water', [WateringLogController::class, 'store']);
Route::get('/plants/{plant_id}/waterings', [WateringLogController::class, 'index']);
