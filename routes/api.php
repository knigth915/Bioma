<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AnimalesController;
use App\Http\Controllers\Api\ContinentesController;
use App\Http\Controllers\Api\EcosistemasController;
use App\Http\Controllers\Api\VegetacionesController;

// Rutas protegidas con Sanctum
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Rutas API  Animales 
Route::get('animales', [AnimalesController::class, 'index']);
Route::post('animales/create', [AnimalesController::class, 'create']);
Route::get('animales/{id}', [AnimalesController::class, 'item']);
Route::post('animales/{id}/edit', [AnimalesController::class, 'update']); 
Route::post('animales/{id}', [AnimalesController::class, 'destroy']);


// Rutas API  Continentes 
Route::get('continentes', [ContinentesController::class, 'index']);
Route::post('continentes/create', [ContinentesController::class, 'create']);
Route::get('continentes/{id}', [ContinentesController::class, 'item']);
Route::post('continentes/{id}/edit', [ContinentesController::class, 'update']);
Route::post('continentes/{id}', [ContinentesController::class, 'destroy']);

// Rutas API  Ecosistemas 
Route::get('ecosistemas', [EcosistemasController::class, 'index']);
Route::post('ecosistemas/create', [EcosistemasController::class, 'create']);
Route::get('ecosistemas/{id}', [EcosistemasController::class, 'item']);
Route::post('ecosistemas/{id}/edit', [EcosistemasController::class, 'update']);
Route::post('ecosistemas/{id}', [EcosistemasController::class, 'destroy']);

// Rutas API  Vegetaciones 
Route::get('vegetaciones', [VegetacionesController::class, 'index']);
Route::post('vegetaciones/create', [VegetacionesController::class, 'create']);
Route::get('vegetaciones/{id}', [VegetacionesController::class, 'item']);
Route::post('vegetaciones/{id}/edit', [VegetacionesController::class, 'update']);
Route::post('vegetaciones/{id}', [VegetacionesController::class, 'destroy']);
