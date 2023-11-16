<?php

use App\Http\Controllers\BateriaController;
use App\Http\Controllers\NotasController;
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


Route::controller(BateriaControllerController::class)->group(function () {
    Route::get('index', 'index');
    Route::post('register', 'register')->middleware('AdminMiddleware');  
    Route::get('show/{id}','show');
    Route::put('update/{id}','update'); 
    Route::delete('destroy/{id}','destroy');
});


Route::controller(OndasController::class)->group(function () {
    Route::get('index', 'index');
    Route::post('register', 'register')->middleware('AdminMiddleware');  
    Route::get('show/{id}','show');
    Route::put('update/{id}','update'); 
    Route::delete('destroy/{id}','destroy');
});

Route::controller(NotasController::class)->group(function () {
    Route::get('index', 'index');
    Route::post('register', 'register')->middleware('AdminMiddleware');  
    Route::get('show/{id}','show');
    Route::put('update/{id}','update'); 
    Route::delete('destroy/{id}','destroy');
});
