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
           Lista de Entradas
           <a href="{{route('posts.create')}}" 
           class="btn btn-sm btn-primary pull-right">
           Crear
           </a>
            <!--
           {{--Aqui se revisa si el usuario es el administrador y desplguiega las opciones--}}
               -->

            @if(auth()->user()->email == 'jehison_snake@hotmail.com')
             <a href="{{route('mostrarS')}}" 
           class="btn btn-sm btn-primary pull-right">

            Slider interno
            
           </a>
           <a href="{{route('mostrarSPublico')}}" 
           class="btn btn-sm btn-primary pull-right">

           Slider Publico
            
           </a>

            <a href="{{route('postsBorrados')}}" 
           class="btn btn-sm btn-primary pull-right">

           Restablecer Posts
            
           </a>
@endif
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
              @foreach($posts as $post)
                <tr>
                  
                   <td>{{$post->name}}</td>
                   <td width="10px">
                      <a href="{{ route('post', $post->slug) }}" class="btn btn-sm btn-default">
                        ver
                      </a>
                      </td>

                       @if(auth()->user()->email == 'jehison_snake@hotmail.com')
                      <td width="10px">
                      <a href="{{route('moveS', $post->id)}}" class="btn btn-sm btn-default">
                        Interno
                      </a>
                      </td>

                      <td width="10px">
                      <a href="{{route('moveSPublico', $post->id)}}" class="btn btn-sm btn-default">
                        publico
                      </a>
                      </td>
                       @endif
                      <td width="10px">
                      <a href="{{route('posts.edit', $post->id)}}" class="btn btn-sm btn-default">

                        Editar
                      </a>
                      </td>

                      <td width="10px">
                      {!!Form::open(['route' =>['posts.destroy',$post->id], 'method' =>'DELETE'])!!}
                        <button class="btn btn-sm btn-danger">
                         Eliminar
                        </button>
                      
                       {!!Form::close()!!}

                      </td>
                      </tr>
                      @endforeach
            </tbody>
          </table>
          {{$posts->render()}}
        </div>
        </div>
         </div>
         </div>
         </div>
         </div>
         </div>


@endsection