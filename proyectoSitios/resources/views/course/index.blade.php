@extends('layouts.app')
@section('title', 'Cursos')

@section('content')
    <div class="row">
        <div class="col-6 d-flex justify-content-center align-content-center">
            <h1>Listado de Cursos</h1>
        </div>
        @if($auth->type_user_id == "3")
            <div class="col-6">
                <a href="{{ url('/courses/create') }}" class="btn btn-primary">Crear Nuevo Curso</a>
            </div>
        @endif
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
                        @if($auth->type_user_id == "3")
                            <div class="row">
                                <div class="col-12 d-flex justify-content-end align-content-center">
                                    <form action="{{url('/courses/'. $c->id)}}" method="POST">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <a href="{{url('courses/'.$c->id.'/edit')}}" class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></a>
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro que seaseas eliminarlo?')"><i class="bi bi-trash"></i></button>
                                    </form>
                                </div>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-12">
                                <h5 class="card-title text-center">{{$c->title}}</h5>
                            </div>
                            @if ($c->teacher_id != null)
                            <div class="col-12">
                                <h4><strong>Profesor: </strong>{{$c->teacher->name}}</h4>
                            </div>
                            @endif

                        </div>

                      @if ($auth->type_user_id == 2  && $c->teacher_id == null && $auth->countIns > 0 )
                        <div class="row">
                          <div class="col-12 d-flex justify-content-center align-content-center">
                              <form action="{{ route('courses.update', ['course' => $c->id]) }}" method="post" enctype="multipart/form-data">
                                  @csrf
                                  @method('PATCH')
                                  <input type="hidden" id="teacher_id" name="teacher_id" value="{{$teacherId}}">
                                  <input type="hidden" id='countIns' name="countIns" value="{{$auth->countIns - 1}}">
                                  <div class="row d-flex justify-content-center align-content-center">
                                      <div class="col-12 d-flex justify-content-center align-content-center">
                                          <button type="submit" class="btn btn-dark">Ser profesor</button>
                                      </div>
                                  </div>
                              </form>
                          </div>
                        </div>
                      @endif
                    </div>
                  </div>
                </div>
            @endforeach
        </div>
        @endif

    </div>
@endsection



