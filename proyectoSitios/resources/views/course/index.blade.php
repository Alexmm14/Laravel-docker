@extends('template.templateBase')
@section('title', 'Cursos')

@section('content')
    <div class="row">
        <div class="col-6 d-flex justify-content-center align-content-center">
            <h1>Listado de Cursos</h1>
        </div>
        <div class="col-6">
            <a href="{{ url('/courses/create') }}" class="btn btn-primary">Crear Nuevo Curso</a>
        </div>
    </div>
    <div class="container">
        @if($course->isEmpty())
        <div class="d-flex justify-content-center align-content-center">
            <h2>No hay cursos registrados</h2>
        </div>
        @else
        <div class="row">
            @foreach ($course as $c )
                <div class="col-sm-6 mb-3 mb-sm-0 pb-4">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title text-center">{{$c->title}}</h5>
                      <div class="row d-flex justify-content-center align-content-center" >
                        <div class="col-4">
                            <a href="#" class="btn btn-primary">Inscribirme</a>
                        </div>
                        <div class="col-4">
                            <a href="{{url('courses/'.$c->id.'/edit')}}" class="btn btn-warning">Actualizar</a>
                        </div>
                        <div class="col-4">
                            <form action="{{url('/courses/'. $c->id)}}" method="POST">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro que seaseas eliminarlo?')">Eliminar</button>
                            </form>
                        </div>

                      </div>
                    </div>
                  </div>
                </div>
            @endforeach
        </div>
        @endif

    </div>
@endsection



