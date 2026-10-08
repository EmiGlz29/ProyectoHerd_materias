<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MateriaController;

Route::get('/materia', [MateriaController::class, 'index']);
Route::get('/materia/show', [MateriaController::class, 'show']);
Route::get('/materia/create', [MateriaController::class,'create']);
Route::post('/materia', [MateriaController::class,'store']);

Route::get('/', function () {
    return view('welcome');
});
