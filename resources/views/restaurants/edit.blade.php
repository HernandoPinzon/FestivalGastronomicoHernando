@extends('layouts.app')

@section('content')
    
    <h1>Editar un restaurante</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error}}</li>
                @endforeach
            </ul>
            
        </div>
        
    @endif

    {{ Form::model($restaurant, ['route' => ['restaurants.update', $restaurant->id], 'method'=>'PUT']) }}
        

        {{-- incluimos la vista que contiene los form_fields --}}
        @include('restaurants.form_fields')

        @if (Auth::user()->type=='admin')
            {!! Form::submit('Editar', ['class'=>'btn btn-primary']) !!}
        @endif
        
        <a href="{{ URL::previous()}}" class="btn btn-secondary">Cancelar</a>

    {{Form::close()}}

@endsection