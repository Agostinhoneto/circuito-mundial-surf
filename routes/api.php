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

//Inserindo Surfistas e listando todos.
Route::get('/surfistas/index',[SurfistaController::class,'index']);
Route::post('/surfistas/store',[SurfistaController::class,'store']);

// Inserindo Bateria.
Route::post('/bateria/store',[BateriaController::class,'store']);
Route::get('/bateria/vencedor/{bateriaId}',[BateriaController::class,'determinarVencedor']);

// Inserindo Ondas.
Route::post('/ondas/store',[OndasController::class,'store']);

//Inserindo Notas.
Route::post('/notas/store',[NotasController::class,'store']);
