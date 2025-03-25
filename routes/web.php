<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AnimalesController;
use App\Http\Controllers\ContinentesController;
use App\Http\Controllers\EcosistemasController;
use App\Http\Controllers\VegetacionesController;

// Ruta de inicio
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('animales', [AnimalesController::class, 'index'])->name('animales');
Route::get('animales/{id}', [AnimalesController::class, 'item'])->name('animales.item');

Route::get('continentes', [ContinentesController::class, 'index'])->name('continentes');
Route::get('continentes/{id}', [ContinentesController::class, 'item'])->name('contientes.item');

Route::get('ecosistemas', [EcosistemasController::class, 'index'])->name('ecosistemas');
Route::get('continentes/{id}', [EcosistemasController::class, 'item'])->name('ecosistemas.item');

Route::get('vegetaciones', [VegetacionesController::class, 'index'])->name('vegetaciones');
Route::get('vegetaciones/{id}', [VegetacionesController::class, 'item'])->name('vegetaciones.item');


