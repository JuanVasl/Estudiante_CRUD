@extends('layouts.index')

@section('title', 'Update Student')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-7 mt-5">

                <!--Mensaje de Modificacion-->
                @if(session('studenModificado'))
                    <div class="alert alert-success">
                        {{session('studenModificado')}}
                    </div>
                @endif

            <!--Validacion de errores-->
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>

                    </div>
                @endif

                <div class="card border-success">
                    <form action="{{ route('Estudiante.update', $student->carne)}}" method="POST" enctype="multipart/form-data">
                        @csrf @method('PATCH')

                        <div class="card-header border-success text-center" style="background-color: #EAFAF1;" >Modificar Estudiante</div>

                        <div class="card-body">

                            <div class="row form-group">
                                <label for="" class="col-2">Nombre</label>
                                <input type="text" name="nombre" class="form-control col-md-9" value="{{$student->nombre}}">
                            </div>

                            <div class="row form-group">
                                <label for="" class="col-2">Semestre</label>
                                <input type="text" name="semestre" class="form-control col-md-9" value="{{$student->semestre}}">
                            </div>

                            <div class="row form-group">
                                <label for="" class="col-2">Correo</label>
                                <input type="text" name="correo" class="form-control col-md-9" value="{{$student->correo}}">
                            </div>

                            <div class="row form-group">
                                <label for="" class="col-2">Edad</label>
                                <input type="text" name="edad" class="form-control col-md-9" value="{{$student->edad}}">
                            </div>

                            <div class="row form-group">
                                <label for="" class="col-2">Foto</label>
                                <img src="{{ asset('storage').'/'. $student->foto}}" class="img-fluid img-thumbnail"  width="100px" >
                                <input type="file" name="foto" class="form-control col-md-9" value="{{$student->foto}}">
                            </div>

                            <div class="row form-group">
                                <button type="submit" class="btn btn-success col-md-9 offset-2">Modificar</button>
                                <a class="btn btn-outline-secondary col-md-9 offset-2 text-dark" href="{{url('/')}}" role="button">Regresar</a>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
