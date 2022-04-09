<?php

namespace App\Http\Controllers;

use App\Models\cursos;
use Illuminate\Http\Request;

class CursosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function readCourse()
    {
        $dato['course'] = cursos::paginate(7);

        return view('Curso.ReadCourse', $dato);
    }


    public function formCourse()
    {
        return view('Curso.CreateCourse');
    }


    public function createCourse (Request $request)
    {
        $validate = $this->validate($request, [
            'descripcion'=>'required|unique:cursos|string|max:50',
        ]);

        cursos::create([
            'descripcion'=> $validate['descripcion'],
        ]);

        return redirect('/Curso')->with('guardar', "ok");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cursos  $cursos
     * @return \Illuminate\Http\Response
     */
    public function show(cursos $cursos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cursos  $cursos
     * @return \Illuminate\Http\Response
     */
    public function edit(cursos $cursos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cursos  $cursos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cursos $cursos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cursos  $cursos
     * @return \Illuminate\Http\Response
     */
    public function destroy(cursos $cursos)
    {
        //
    }
}
