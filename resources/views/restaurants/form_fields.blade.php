<div class="mb">
    {{ Form::label('name', 'Nombre', ['class'=> 'form-label','maxlength'=>'50']) }}
    {{ Form::text('name', null, ['class'=>'form-control']) }}
</div>
<div class="mb">
    {{ Form::label('description', 'Descripcion', ['class'=> 'form-label']) }}
    {{ Form::textarea('description', null, ['class'=>'form-control', 'rows'=>'6']) }}
</div>
<div class="mb">
    {{ Form::label('city', 'Ciudad', ['class'=> 'form-label']) }}
    {{ Form::text('city', null, ['class'=>'form-control','maxlength'=>'30']) }}
</div>
<div class="mb">
    {{ Form::label('phone', 'Telefono', ['class'=> 'form-label']) }}
    {{ Form::text('phone', null, ['class'=>'form-control','maxlength'=>'10']) }}
</div>
<div class="mb">
    {{ Form::label('delivery', '¿Tiene domicilio?', ['class'=> 'form-label']) }}
    {!! Form::select('delivery', ['y'=>'Si','n'=>'no'],null, ['class'=>'form-control']) !!}
</div>
<div class="mb-3">
    {{ Form::label('category_id', 'Categoria', ['class'=> 'form-label']) }}
    {!! Form::select('category_id', $categories ,null, ['class'=>'form-control']) !!}
</div>