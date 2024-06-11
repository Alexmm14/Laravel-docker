@extends('layouts.app')
@section('title', 'Crear grupo')

@section('content')
    <div class="row">
        <div class="col-12 d-flex justify-content-center align-content-center">
            <h1>Nuevo Grupo</h1>
        </div>

    </div>
    <div class="container">

            <form action="{{ url('groups') }}" method="post">
                {{csrf_field()}}
                <div class="row">
                    <div class="mb-3 col-6">
                        <label for="group" class="form-label">Grupo:</label>
                        <input type="number" name="group" id="group" required>
                    </div>
                    <div class="mb-3 col-6">
                        <label for="max_students" class="form-label">Máximo de Estudiantes:</label>
                        <input type="number" name="max_students" id="max_students" required value="15">
                    </div>
                    <div class="mb-3 col-6">
                        <label for="cursos" class="form-label">Cursos:</label>
                        @foreach($courses as $course)
                            <div>
                                <input type="checkbox" name="cursos[]" value="{{ $course->id }}" id="curso_{{ $course->id }}">
                                <label for="curso_{{ $course->id }}">{{ $course->title }}</label>
                            </div>
                        @endforeach
                        <div class="form-text">Selecciona de 1 a 7 cursos</div>
                    </div>
                    <div class="col-6 row">
                        <div class="col-6">
                            <button type="submit" class="btn btn-success">Crear Grupo</button>
                        </div>
                        <div class="col-6">
                            <a href="{{url('groups')}}" class="btn btn-secondary">Regresar   </a>
                        </div>
                    </div>
                </div>

            </form>
        </div>



@endsection


