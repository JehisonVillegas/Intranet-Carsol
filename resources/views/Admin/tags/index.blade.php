@extends('layouts.app')

@section('content')
 <style type="text/css">
#global {
    height: 575px;
    width: 100%;
    border: 1px solid #ddd;
    background: #f1f1f1;
    overflow-y: scroll;
}
#mensajes {
    height: auto;
}
.texto {
    padding:4px;
    background:#fff;
}
</style>


<div id="global">
<div id="mensajes">

   <div class="container">
    
         <div class="panel-heading">
           Lista de Etiquetas
           <a href="{{route('tags.create')}}" 
           class="btn btn-sm btn-primary pull-right">
           Crear
           </a>
            <a href="{{route('tagsBorrados')}}" 
           class="btn btn-sm btn-primary pull-right">
           Restablecer
           </a>
         </div>
         
       <div class="panel-body">
          <table class="table table-striped table-hover">
            <thead>
              <tr>
               
                <th>Nombre</th>
                <th colspan="3">&nbsp;</th>
              </tr>
            </thead>
            <tbody>
              @foreach($tags as $tag)
                <tr>
                  
                   <td>{{$tag->name}}</td>
                   <td width="10px">
                      <a href="{{route('tags.show', $tag->id)}}" class="btn btn-sm btn-default">
                        ver
                      </a>
                      </td>
                      <td width="10px">
                      <a href="{{route('tags.edit', $tag->id)}}" class="btn btn-sm btn-default">
                        Editar
                      </a>
                      </td>
                      <td width="10px">
                      {!!Form::open(['route' =>['tags.destroy',$tag->id], 'method' =>'DELETE'])!!}
                        <button class="btn btn-sm btn-danger">
                         Eliminar
                        </button>
                      
                       {!!Form::close()!!}

                      </td>
                      </tr>
                      @endforeach
            </tbody>
          </table>
          {{$tags->render()}}
        </div>
        </div>
         </div>
         </div>
         </div>

@endsection