@extends('layouts.index')

@section('title', 'Create Course')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-7 mt-5">

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
                    <form action="{{ route('Curso.save')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="card-header border-success text-center text-white" style="background-color: #196F3D"; >Agregar Curso</div>

                        <div class="card-body">

                            <div class="row form-group">
                                <label for="" class="col-3">Descripción</label>
                                <input type="text" name="descripcion" class="form-control col-md-8">
                            </div>

                            <div class="row form-group">
                                <button type="submit" class="btn btn col-md-9 offset-2 text-dark mb-2">Guardar</button>

                                <a class="btn btn-outline-secondary col-md-9 offset-2 text-dark" href="{{url('/Curso')}}" role="button">Regresar</a>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
