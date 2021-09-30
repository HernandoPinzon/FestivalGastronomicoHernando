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
        <div class="mb">
            {{ Form::label('name', 'Nombre', ['class'=> 'form-label','maxlength'=>'50']) }}
            {{ Form::text('name', '', ['class'=>'form-control']) }}
        </div>
        <div class="mb">
            {{ Form::label('description', 'Descripcion', ['class'=> 'form-label']) }}
            {{ Form::textarea('description', '', ['class'=>'form-control', 'rows'=>'6']) }}
        </div>
        <div class="mb">
            {{ Form::label('city', 'Ciudad', ['class'=> 'form-label']) }}
            {{ Form::text('city', '', ['class'=>'form-control','maxlength'=>'30']) }}
        </div>
        <div class="mb">
            {{ Form::label('phone', 'Telefono', ['class'=> 'form-label']) }}
            {{ Form::text('phone', '', ['class'=>'form-control','maxlength'=>'10']) }}
        </div>
        <div class="mb">
            {{ Form::label('delivery', '¿Tiene domicilio?', ['class'=> 'form-label']) }}
            {!! Form::select('delivery', ['y'=>'Si','n'=>'no'],null, ['class'=>'form-control']) !!}
        </div>
        <div class="mb-3">
            {{ Form::label('category_id', 'Categoria', ['class'=> 'form-label']) }}
            {!! Form::select('category_id', $categories ,null, ['class'=>'form-control']) !!}
        </div>

        @if (Auth::user()->type=='admin')
            {!! Form::submit('Crear', ['class'=>'btn btn-primary']) !!}
        @endif
        
        <a href="{{ route ('home')}}" class="btn btn-secondary">Cancelar</a>

    {{Form::close()}}

@endsection