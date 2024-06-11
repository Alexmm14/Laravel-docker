@extends('template.templateBase')

@section('title', 'Estudiantes')

@section('content')

<div class="container-fluid">
    <div class="container">
        <h1>Estudiante</h1>
    </div>
    <div class="mb-3">
        <form action="{{url('/student')}}" method="post">
            {{csrf_field()}}
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nombre del estudiante">


            </div>

        </form>

    </div>


</div>

@endsection
