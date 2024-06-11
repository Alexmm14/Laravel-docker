@extends('layouts.app')
@section('title', 'Grupos Inscritos')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-6">
            <h1>Grupos Inscritos</h1>
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
</div>
<div class="container">
    @if(isset($message))
        <p>{{ $message }}</p>
    @else
        <ul>
            @foreach($groups as $group)
                <li>{{ $group->group }}</li>
            @endforeach
        </ul>
    @endif
</div>

@endsection



