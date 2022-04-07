<?php

use App\Http\Controllers\EstudiantesController;
use Illuminate\Support\Facades\Route;

/* Read Estudiantes */
Route::get('/', [EstudiantesController::class,'readStudent']);

/* Formulario de Estudiante */
Route::get('/Estudiante/Formulario', [EstudiantesController::class,'formStudent']);

/* Create Estudiante */
Route::post('/Estudiante/crearStuden', [EstudiantesController::class,'createStudent'])->name('Estudiante.save');

/* Delete Estudiante */
Route::delete('/delete/{id}', [EstudiantesController::class,'deleteStudent'])->name('Estudiante.delete');

/* Editar estudiante */
Route::get('/editform/{id}', [EstudiantesController::class,'editStudent'])->name('Estudiante.edit');

/* Update Estudiante */
Route::patch('/edit/{id}', [EstudiantesController::class, 'updateStudent'])->name('Estudiante.update');
