@extends('layouts.app')
@section('title', 'Grupos')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-6">
            <h1>Grupos</h1>
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
        @if($auth->type_user_id == "3")
            <div class="col-6">
                <a href="{{url('groups/create')}}" class="btn btn-dark">Nuevo</a>
            </div>
        @endif
    </div>
</div>
<div class="container">
    <div class="row">
        @foreach ($groups as $group)
            <div class="col-sm-6 mb-3 mb-sm-0 pb-4">
                <div class="card">
                    <div class="card-body">
                        @if($auth->type_user_id == "3")
                                <div class="row">
                                    <div class="col-12 d-flex justify-content-end align-content-center">
                                        <form action="{{url('/groups/'. $group->id)}}" method="POST">
                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                            <a href="{{url('groups/'.$group->id.'/edit')}}" class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></a>
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro que seaseas eliminarlo?')"><i class="bi bi-trash"></i></button>
                                        </form>
                                    </div>
                                </div>
                        @endif
                        <h2 class="card-title text-center">{{ $group->group }}</h2>
                        <div class="card-text col-12">
                            <h3>Cursos:</h3>
                            <ul>
                                @foreach ($group->courses as $curso)
                                    <li>{{ $curso->title }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @if (auth()->user()->type_user_id == 1 && $group->max_students > 0 )
                            <div class="card-footer d-flex justify-content-center align-content-center">
                                <form action="{{ route('groups.enroll', $group->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-dark btn-sm">Inscribirse</button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>


</div>

@endsection



