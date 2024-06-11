@extends('layouts.app')
@section('title', 'Cursos')

@section('content')
    <div class="container">
        <h1 class="d-flex justify-content-center align-content-center">Editar Curso</h1>
    </div>
    <div class="container">
        <form action="{{ route('courses.update', ['course' => $course->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="NombreCurso" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="title" name="title"
                value="{{isset($course->title) ? $course->title : '' }}" required placeholder="Nombre">
            </div>
            <div class="mb-3">
                <label for="CreditosCurso" class="form-label">Créditos</label>
                <input type="number" class="form-control" id="credits" name="credits"
                value="{{isset($course->credits) ? $course->credits : '' }}" required placeholder="creditos">
            </div>
            <div class="row d-flex justify-content-center align-content-center">
                <div class="col-6 d-flex justify-content-center align-content-center">
                    <button type="submit" class="btn btn-dark">Actualizar</button>
                </div>
                <div class="col-6 d-flex justify-content-center align-content-center">
                    <a href="{{url('/courses')}}" class="btn btn-secondary">Regresar</a>
                </div>
            </div>
        </form>
    </div>

@endsection


