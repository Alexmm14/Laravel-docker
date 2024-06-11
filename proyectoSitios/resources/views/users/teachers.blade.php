@extends('layouts.app')
@section('title', 'Lista de Profesores')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Lista de Profesores</h1>
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
            @if($teachers->isEmpty())
                <p>No hay profesores registrados.</p>
            @else
                <ul>
                    @foreach($teachers as $teacher)
                        <li>{{ $teacher->name }} - {{ $teacher->email }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</div>
@endsection
