@extends('layouts.app')
@section('title', 'Lista de Estudiantes')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Lista de Estudiantes</h1>
        </div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
    </div>
    <div class="row">
        <div class="col-12">
            @if($students->isEmpty())
                <p>No hay profesores registrados.</p>
            @else
                <ul>
                    @foreach($students as $student)
                        <li>{{ $student->name }} - {{ $student->email }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</div>
@endsection
