{{Form::hidden('user_id', auth()->user()->id)}}
{{Form::hidden('category_id', $departamento->first()->id)}}

<div class="form-group">
   {{Form::label('name', 'Nombre de la Entrada')}}
   {{Form::text('name',null,['class' => 'form-control','id' =>'name'])}}
</div>

<div class="form-group">
   {{Form::label('file','Suba aqui su archivo')}}
   {{Form::file('file')}}

</div>

<div class="form-group">
   {{Form::submit('Guardar',['class'=> 'btn btn-sm btn-primary'])}}
</div>
