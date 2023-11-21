<?php

use App\Http\Controllers\BateriaController;
use App\Http\Controllers\NotasController;
use App\Http\Controllers\OndasController;
use App\Http\Controllers\SurfistaController;
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
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', function () {
    return response()->json([
        'sucess' => true
    ]);
});

Route::get('/surfistas/index',[SurfistaController::class,'index']);
Route::get('/surfistas/store',[SurfistaController::class,'store']);


Route::apiResource('bateria', BateriaController::class)->only([
    'store', 'vencedor/{bateriaId}',
]);

Route::apiResource('ondas', OndasController::class)->only([
    'store',
]);

Route::apiResource('notas', NotasController::class)->only([
    'store',
]);
