<?php

namespace App\Http\Controllers;

use App\Models\estudiantes;
use Illuminate\Http\Request;

class EstudiantesController extends Controller
{
    public function readStudent()
    {
        return view('Estudiante.ReadStudent');
    }

    public function formStudent()
    {
        return view('Estudiante.CreateStudent');
    }


    public function createStudent(Request $request)
    {
        $validator = $this->validate($request, [
            'nombre'=> 'required|string|max:255',
            'foto'=>'required:estudiante',
            'correo'=>'required|string|max:255',
            'semestre'=>'required|max:20|string',
            'edad'=>'required|max:2|string'

        ]);

        $dataStudent = request()->except('_token');
        estudiantes::insert($dataStudent);

        /* Guardar Imagen */
        if($request->hasFile('foto')){
            $datostuden['foto']=$request->file("foto")->store('image', 'public');
        }

        return back()->with('studenGuardado', 'Estudiante Guardado');
    }

    public function editStudent(estudiantes $estudiantes)
    {
        //
    }

    public function updateStudent(Request $request, estudiantes $estudiantes)
    {
        //
    }

    public function deleteStudent(estudiantes $estudiantes)
    {
        //
    }
}
