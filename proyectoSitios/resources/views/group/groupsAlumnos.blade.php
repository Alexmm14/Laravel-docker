@extends('layouts.app')

@section('title', 'Listado de Grupos de Alumnos')

@section('content')
<div class="container">
    <h1 class="my-4">Listado de Grupos de Alumnos</h1>
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
                <li>{{ $course->name }}</li>
                @endforeach
            </ul>

            <h3>Estudiantes Inscritos:</h3>
            <ul>
                @foreach($group->users as $user)
                <li>{{ $user->name }}</li>
                @endforeach
            </ul>
        </div>
    </div>
    @endforeach
</div>
@endsection
