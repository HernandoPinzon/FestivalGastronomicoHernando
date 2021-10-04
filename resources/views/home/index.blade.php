@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('restaurants.create') }}" 
        class="btn btn-primary" 
        title="crear un nuevo restaurante">
            Crear Nuevo
    </a>
    <br>
    <br>
    <ul class="list-group list-group-flush">
        @foreach ($restaurants as $restaurant)
            <li class="list-group-item h4">
                <div class="row">
                    <div class="col aling-self-start">
                        <a href="{{ route('restaurants.show',$restaurant->id) }}" title="Visitar a este restaurante">{{$restaurant->name}}</a>
                    
                    </div>
                    <div class="col-2 aling-self-end">
                        <a href="{{ route('restaurants.edit',$restaurant->id) }}" class="btn btn-warning" title="Editar este restaurante">Editar</a>
                        
                    </div>
                    <div class="col-2 aling-self-end">
                        @include('restaurants.form_delete')
                    </div>
                </div>
                
                
            </li>
        @endforeach
    </ul>
</div>
@endsection
