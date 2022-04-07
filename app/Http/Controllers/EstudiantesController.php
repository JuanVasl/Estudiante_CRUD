<?php

namespace App\Http\Controllers;

use App\Models\estudiantes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EstudiantesController extends Controller
{
    public function readStudent()
    {
        $data['student'] = estudiantes::paginate(3);

        return view('Estudiante.ReadStudent', $data);

    }

    public function formStudent()
    {
        return view('Estudiante.CreateStudent');
    }


    public function createStudent(Request $request)
    {
        $dataStudent = request()->except('_token');

        $validator = $this->validate($request, [
            'nombre'=> 'required|string|max:255',
            'foto'=>'required:estudiante',
            'correo'=>'required|string|max:255',
            'semestre'=>'required|max:20|string',
            'edad'=>'required|max:2|string'

        ]);

        /* Guardar Imagen */
        if($request->hasFile('foto')){
            $datostuden['foto']=$request->file("foto")->store('image', 'public');
        }

        estudiantes::create([
            'nombre' => $validator['nombre'],
            'foto' => $datostuden['foto'],
            'correo' => $validator['correo'],
            'semestre' => $validator['semestre'],
            'edad' => $validator['edad'],

        ]);

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
