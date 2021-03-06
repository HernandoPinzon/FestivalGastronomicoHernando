@extends('layouts.app')

@section('content')
    
    <h1>Crear un nuevo restaurante</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error}}</li>
                @endforeach
            </ul>
            
        </div>
        
    @endif

    {{Form::open(['route'=>'restaurants.store', 'method'=>'post'])}}
        
        
        {{-- incluimos la vista que contiene los form_fields --}}
        @include('restaurants.form_fields')

        @if (Auth::user()->type=='admin')
            {!! Form::submit('Crear', ['class'=>'btn btn-primary']) !!}
        @endif
        
        <a href="{{ route ('home')}}" class="btn btn-secondary">Cancelar</a>

    {{Form::close()}}

@endsection