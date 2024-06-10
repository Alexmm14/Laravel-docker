@extends('layouts.app')

@section('content')
    <h1>Grupos inscritos</h1>
    <p>User ID: {{ $user->name }}</p>
    {{$courses = $group->courses;}}

    <ul>
        @foreach ($user->groups as $group)
            <li>Group ID: {{ $group->id }}</li>
            <!-- Accede a otros atributos de la tabla pivote si es necesario -->
            <li>Created at: {{ $group->pivot->created_at }}</li>
        @endforeach
    </ul>
@endsection
