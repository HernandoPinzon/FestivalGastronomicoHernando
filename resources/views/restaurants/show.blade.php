@extends('layouts.app');

@section('content')
    <h3>
        <small class="text-muted">Restaurante</small>
        {{$restaurant->name}}
    </h3>

    <h4>
        Servimos en {{$restaurant->city}}@if ($restaurant->schedule != null)
            en el horario de {{$restaurant->schedule}}
        @endif. <br>
        Contactenos para
        @if ($restaurant->delivery == 'y')
            domicilios y 
        @endif
        mas informacion al numero {{$restaurant->phone}}
    </h4>

    <div class="row mt-4 justify-content-end">
        <div class="col-2 aling-self-end">
            <a class="btn btn-warning" href="{{ route('restaurants.edit', $restaurant->id) }}">Editar</a>
        </div>
        <div class="col-1 aling-self-end">
            @include('restaurants.form_delete')
        </div>
    </div>
    

    

@endsection