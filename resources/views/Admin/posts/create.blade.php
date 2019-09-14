@extends('layouts.app')

@section('content')
<style type="text/css">
#global {
    height: 530px;
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
     <div class="row">
      
       <div class="panel panel-default">
         <div class="panel-heading">
          Crear Entrada
           {{$departamento->first()->name}}
         </div>
         
       <div class="panel-body">
         {!!Form::open(['route'=> 'posts.store','files'=> true])!!}

         @include('admin.posts.partials.form')

         {!!Form::close()!!}
            
        
        </div>
        </div>
         
         </div>
         </div>
        
</div>
</div>

@endsection