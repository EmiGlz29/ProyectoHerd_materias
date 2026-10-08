<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MateriaController;

Route::get('/materia', [MateriaController::class, 'index']);
Route::get('/materia/show', [MateriaController::class, 'show']);
Route::get('/materia/create', [MateriaController::class,'create']);
Route::post('/materia', [MateriaController::class,'store']);
Route::get('/materia/{materia}/edit', [MateriaController::class, 'edit'])->name('materia.edit');
Route::put('/materia/{materia}', [MateriaController::class, 'update'])->name('materia.update');
Route::delete('/materia/{materia}', [MateriaController::class, 'destroy'])->name('materia.destroy');

Route::get('/', function () {
    return view('welcome');
});
