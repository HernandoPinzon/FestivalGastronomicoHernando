@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('restaurants.create') }}" 
        class="btn btn-primary" 
        title="crear un nuevo restaurante">
            Crear Nuevo
    </a>

    <ul class="list-group list-group-flush">
        @foreach ($restaurants as $restaurant)
            <li class="list-group-item h4">
                <!--  TODO:agregar enlace a ver restaurante de propietario  --!>
                <a href="" title="Visitar a este restaurante">{{$restaurant->name}}</a>
                
            </li>
        @endforeach
    </ul>
</div>
@endsection
