@extends('layouts.index')

@section('title', 'Read Student')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="cold-md-11">
                <h2 class="text-center mb-5">Estudiantes</h2>

                <a class="btn btn-success mb-4" href="{{url('/Estudiante/Formulario')}}">Nuevo Estudiante</a>

                <table class="table table-striped text-center">
                    <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Nombre</th>
                        <th>Semestre</th>
                        <th>Correo</th>
                        <th>Edad</th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach($student as $students)
                        <tr>
                            <td>
                                <img src="{{ asset('storage').'/'. $students->foto}}" class="img-fluid img-thumbnail"  width="200px" >
                            </td>

                            <td>{{$students->nombre}}</td>
                            <td>{{$students->semestre}}</td>
                            <td>{{$students->correo}}</td>
                            <td>{{$students->edad}}</td>

                        </tr>
                    @endforeach
                    </tbody>

                </table>

                <!-- Paginación -->
                {{ $student->onEachSide(3)->links() }}

            </div>
        </div>
    </div>
@endsection
