@extends('layouts.app')


@section('content')

    <h1>
        Nuestros restaurantes
    </h1>
    
    @php
        $rows = $restaurants->count()/4;
    @endphp
    
    @for ($i = 0; $i < $rows; $i++)
        <div class="row">
            @for ($j = 0; $j < 4; $j++)
                
                <div class="col-3">
                    @if (($i*4)+$j<$restaurants->count())
                        @php
                            $restaurant = $restaurants[($i*4)+$j];
                        @endphp
                        
                        
                        <img src={{asset('images/restaurantIcon.png')}} class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{$restaurant->name}}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{$restaurant->category->name}}</h4>
                            <p class="card-text">{{$restaurant->description}} en {{$restaurant->city}}</p>
                            <a href="#" class="btn btn-primary">Visitenos</a>
                        </div>
                        
                    @endif
                </div>
            @endfor
        </div>
    @endfor

@endsection