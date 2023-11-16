<?php

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


Route::controller(SurfistaController::class)->group(function () {
    Route::get('index', 'index');
    Route::post('register', 'register')->middleware('AdminMiddleware');  
    Route::get('show/{id}','show');
    Route::put('update/{id}','update'); 
    Route::delete('destroy/{id}','destroy');
});


Route::group(['prefix' => 'surfistas'], function () {
    Route::get('/', [SurfistaController::class, 'index']);
    Route::get('/{id}', [SurfistaController::class, 'show']);
    Route::post('/', [SurfistaController::class, 'store']);
    Route::put('/{id}', [SurfistaController::class, 'update']);
    Route::delete('/{id}', [SurfistaController::class, 'destroy']);
});

Route::group(['prefix' => 'ondas'], function () {
    Route::get('/', [SurfistaController::class, 'index']);
    Route::get('/{id}', [SurfistaController::class, 'show']);
    Route::post('/', [SurfistaController::class, 'store']);
    Route::put('/{id}', [SurfistaController::class, 'update']);
    Route::delete('/{id}', [SurfistaController::class, 'destroy']);
});
