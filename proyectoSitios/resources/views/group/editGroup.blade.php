@extends('layouts.app')
@section('title', 'Actualizar grupo')

@section('content')
    <div class="row">
        <div class="col-12 d-flex justify-content-center align-content-center">
            <h1>Actualizar Grupo</h1>
        </div>
    </div>
    <div class="container">
        <form action="{{ route('groups.update', $group->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="mb-3 col-6">
                    <label for="group" class="form-label">Grupo:</label>
                    <input type="number" name="group" id="group" value="{{ $group->group }}" required>
                </div>
                <div class="mb-3 col-6">
                    <label for="max_students" class="form-label">Máximo de Estudiantes:</label>
                    <input type="number" name="max_students" id="max_students" value="{{ $group->max_students }}" required>
                </div>
                <div class="mb-3 col-6">
                    <label for="courses" class="form-label">Cursos:</label>
                    @foreach($courses as $course)
                        <div>
                            <input type="checkbox" name="courses[]" value="{{ $course->id }}" id="course_{{ $course->id }}" {{ in_array($course->id, $group->courses->pluck('id')->toArray()) ? 'checked' : '' }}>
                            <label for="course_{{ $course->id }}">{{ $course->title }}</label>
                        </div>
                    @endforeach
                    <div class="form-text">Selecciona de 1 a 7 cursos</div>
                </div>
                <div class="col-6 row">
                    <div class="col-6">
                        <button type="submit" class="btn btn-success">Actualizar Grupo</button>
                    </div>
                    <div class="col-6">
                        <a href="{{ route('groups.index') }}" class="btn btn-secondary">Regresar</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
