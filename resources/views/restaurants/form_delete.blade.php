
{!! Form::open([
        'route'=>['restaurants.destroy',$restaurant->id],
        'method'=>'delete',
        'onsubmit'=>'return confirm(\'¿Esta seguro que desea remover el restaurante?\')'
    ]) !!}

    <button type="submit" class="btn btn-danger" title="Remover este restaurante">Remover</button>

{!! Form::close() !!}