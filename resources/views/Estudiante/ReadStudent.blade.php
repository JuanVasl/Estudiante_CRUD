@extends('layouts.index')

@section('title', 'Read Student')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="cold-md-11">

                <!--Mensaje de Eliminar-->
                @if(session('studenEliminado'))
                    <div class="alert alert-success">
                        {{ session('studenEliminado') }}
                    </div>
                @endif

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
                        <th>Acciones</th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach($student as $students)
                        <tr>
                            <td>
                                <img src="{{ asset('storage').'/'. $students->foto}}" class="img-fluid img-thumbnail"  width="50px" >
                            </td>

                            <td>{{$students->nombre}}</td>
                            <td>{{$students->semestre}}</td>
                            <td>{{$students->correo}}</td>
                            <td>{{$students->edad}}</td>
                            <td>
                                <a href="{{ route('Estudiante.edit', $students->carne) }}" class="btn btn-primary">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>

                                <form action="{{ route('Estudiante.delete', $students->carne) }}" method="POST">
                                    @csrf @method('DELETE')

                                    <button type="submit" onclick="return confirm('¿Desea eliminar al estudiante?');" class="btn btn-danger">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>

                                </form>

                            </td>

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
