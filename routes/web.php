```php
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MateriaController;

// Listar materias
Route::get('/materia', [MateriaController::class, 'index'])
    ->name('materia.index');

// Formulario para crear una materia
Route::get('/materia/create', [MateriaController::class, 'create'])
    ->name('materia.create');

// Guardar una materia
Route::post('/materia', [MateriaController::class, 'store'])
    ->name('materia.store');

// Ver el detalle de una materia
Route::get('/materia/{materia}', [MateriaController::class, 'show'])
    ->name('materia.show');

// Formulario para editar una materia
Route::get('/materia/{materia}/edit', [MateriaController::class, 'edit'])
    ->name('materia.edit');

// Actualizar una materia
Route::put('/materia/{materia}', [MateriaController::class, 'update'])
    ->name('materia.update');

// Eliminar una materia
Route::delete('/materia/{materia}', [MateriaController::class, 'destroy'])
    ->name('materia.destroy');
