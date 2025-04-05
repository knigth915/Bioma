<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AnimalesController;
use App\Http\Controllers\ContinentesController;
use App\Http\Controllers\EcosistemasController;
use App\Http\Controllers\VegetacionesController;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Rutas para Animales
Route::get('/animales', [AnimalesController::class, 'index'])->name('animales');
Route::get('/animales/create', [AnimalesController::class, 'create'])->name('animales.create');
Route::post('animales/', [AnimalesController::class, 'store'])->name('animales.store');
Route::get('/animales/{id}', [AnimalesController::class, 'item'])->name('animales.item');
Route::get('/animales/{id}/edit', [AnimalesController::class, 'edit'])->name('animales.edit'); 
Route::put('/animales/{id}', [AnimalesController::class, 'update'])->name('animales.update'); 
Route::delete('/animales/{id}', [AnimalesController::class, 'destroy'])->name('animales.destroy');


// Rutas para Continentes
Route::get('/continentes', [ContinentesController::class, 'index'])->name('continentes');
Route::get('/continentes/create', [ContinentesController::class, 'create'])->name('continentes.create');
Route::post('/continentes', [ContinentesController::class, 'store'])->name('continentes.store');
Route::get('/continentes/{id}', [ContinentesController::class, 'item'])->name('continentes.item');
Route::get('/continentes/{id}/edit', [ContinentesController::class, 'edit'])->name('continentes.edit');
Route::put('/continentes/{id}', [ContinentesController::class, 'update'])->name('continentes.update');
Route::delete('/continentes/{id}', [ContinentesController::class, 'destroy'])->name('continentes.destroy');



// Rutas para Ecosistemas
Route::get('/ecosistemas', [EcosistemasController::class, 'index'])->name('ecosistemas');
Route::get('/ecosistemas/create', [EcosistemasController::class, 'create'])->name('ecosistemas.create');
Route::post('/ecosistemas', [EcosistemasController::class, 'store'])->name('ecosistemas.store');
Route::get('/ecosistemas/{id}', [EcosistemasController::class, 'item'])->name('ecosistemas.item');
Route::get('/ecosistemas/{id}/edit', [EcosistemasController::class, 'edit'])->name('ecosistemas.edit');
Route::put('/ecosistemas/{id}', [EcosistemasController::class, 'update'])->name('ecosistemas.update');
Route::delete('/ecosistemas/{id}', [EcosistemasController::class, 'destroy'])->name('ecosistemas.destroy');


// Rutas para Vegetaciones
Route::get('/vegetaciones', [VegetacionesController::class, 'index'])->name('vegetaciones');
Route::get('/vegetaciones/create', [VegetacionesController::class, 'create'])->name('vegetaciones.create');
Route::post('/vegetaciones', [VegetacionesController::class, 'store'])->name('vegetaciones.store');
Route::get('/vegetaciones/{id}', [VegetacionesController::class, 'item'])->name('vegetaciones.item');
Route::get('/vegetaciones/{id}/edit', [VegetacionesController::class, 'edit'])->name('vegetaciones.edit');
Route::put('vegetaciones/{id}', [VegetacionesController::class, 'update'])->name('vegetaciones.update');
Route::delete('/vegetaciones/{id}', [VegetacionesController::class, 'destroy'])->name('vegetaciones.destroy');




