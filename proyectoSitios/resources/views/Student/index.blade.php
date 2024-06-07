@extends('template.templateBase')

@section('title', 'Estudiantes')

@section('content')
<div class="container-fluid">
    <div class="container">
        <div class=" row col-10">
            <h2>Estudiantes</h2>
        </div>
        <div class="col-2">

        </div>
        <table class="table table-dark table-responsive ">
            <thead class="">
                <tr>
                    <th scope="col"># de Cuenta</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Correo</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($student as $students)
                <tr>
                    <th scope="row">{{ $students->id }}</th>
                    <td>{{$students->name}}</td>
                    <td>{{$student->email}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
