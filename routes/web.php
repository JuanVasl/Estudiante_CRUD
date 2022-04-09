<?php

use App\Http\Controllers\CursosController;
use App\Http\Controllers\EstudiantesController;
use Illuminate\Support\Facades\Route;

/* Read Estudiantes */
Route::get('/', [EstudiantesController::class,'readStudent']);

/* Formulario de Estudiante */
Route::get('/Estudiante/Formulario', [EstudiantesController::class,'formStudent']);

/* Create Estudiante */
Route::post('/Estudiante/crearStuden', [EstudiantesController::class,'createStudent'])->name('Estudiante.save');

/* Delete Estudiante */
Route::delete('/delete/{carne}', [EstudiantesController::class,'deleteStudent'])->name('Estudiante.delete');

/* Editar estudiante */
Route::get('/editform/{carne}', [EstudiantesController::class,'editStudent'])->name('Estudiante.edit');

/* Update Estudiante */
Route::patch('/edit/{carne}', [EstudiantesController::class, 'updateStudent'])->name('Estudiante.update');

/* Read Cursos */
Route::get('/Curso', [CursosController::class,'readCourse']);

/* Formulario de Cursos */
Route::get('/Curso/Formulario', [CursosController::class,'formCourse']);

/* Create Curso */
Route::post('/Curso/crearCourse', [CursosController::class,'createCourse'])->name('Curso.save');

