<?php

namespace App\Http\Controllers;

use App\Models\estudiantes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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

    public function editStudent($carne)
    {
        $student= estudiantes::findOrFail($carne);

        return view('Estudiante.UpdateStudent', compact('student'));
    }

    public function updateStudent(Request $request, $carne)
    {
        $data = request()->except((['_token', '_method']));

        //Editar foto
        if($request->hasFile('foto')){

            $studen= estudiantes::findOrFail($carne);

            Storage::delete('public/'.$studen->foto);

            $data['foto']=$request->file("foto")->store('uploads', 'public');
        }

        estudiantes::where('carne', '=', $carne)->update($data);
        $studen= estudiantes::findOrFail($carne);

        return back()->with('studenModificado', 'Estudiante Modificado', compact('studen'));
    }

    public function deleteStudent($carne)
    {
        $student= estudiantes::findOrFail($carne);

        if(Storage::delete('public/'.$student->foto)){

            estudiantes::destroy($carne);
        }

        return back()->with('studenEliminado', 'Estdudiante Eliminado');
    }
}
