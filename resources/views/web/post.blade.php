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
   
 
   
       
       <div class="panel panel-default">
          <div class="panel-heading">
           <h3>Departamento
           
            <a href="{{route('departamento', $post->category->slug)}}">{{$post->category->name}}</a>
            </h3>
          </div>
       <div class="panel-body">
    
       {!! $post->body!!}
       <hr>
       Etiquetas
       @foreach ($post->tags as $tag )
        <a href="{{route('etiqueta',$tag->slug)}}">
            {{$tag->name}}
        </a>
       @endforeach

</div>
</div>


</div>
@endsection