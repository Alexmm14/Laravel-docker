@extends('layouts.app')

@section('title', 'Listado de Cursos con Profesores')

@section('content')
<div class="container">
    <h1 class="my-4">Listado de Cursos con Profesores</h1>
    @foreach($groups as $group)
    <div class="card mb-4">
        <div class="card-header">
            <h2>Grupo: {{ $group->group }}</h2>
            <p>Máximo de Estudiantes: {{ $group->max_students }}</p>
        </div>
        <div class="card-body">
            <h3>Cursos:</h3>
            <ul>
                @foreach($group->courses as $course)
                <li>
                    {{ $course->title }}
                    @if($course->teacher)
                    <br><small>Profesor: {{ $course->teacher->name }}</small>
                    @else
                    <br><small>Profesor: No asignado</small>
                    @endif
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    @endforeach
</div>
@endsection
