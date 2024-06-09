@extends('template.templateBase')
@section('title', 'Cursos')

@section('content')
    <div class="row">
        <div class="col-12 d-flex justify-content-center align-content-center">
            <h1>Nuevo Curso</h1>
        </div>
    </div>
    <div class="container">
        <form method="post" action="{{ url('courses') }}">
            {{ csrf_field() }}
            <div class="mb-3">
              <label for="NombreCurso" class="form-label">Nombre</label>
              <input type="text" class="form-control" id="title" name="title">
            </div>
            <div class="mb-3">
              <label for="CreditosCurso" class="form-label">Creditos</label>
              <input type="number" class="form-control" id="credits" name="credits">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <div>
            <a href="{{url('courses')}}">Regresar   </a>
        </div>
    </div>
@endsection


