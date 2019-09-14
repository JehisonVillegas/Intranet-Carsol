@extends('layouts.app')

@section('content')
   <div class="container">
     <div class="row">
      <div class="col-md-8 col-md-offset-2">
       <div class="panel panel-default">
         <div class="panel-heading">
          Subir Archivo 
           {{$departamento->first()->name}}
         </div>
         
       <div class="panel-body">
         {!!Form::open(['route'=> 'archivos.store','files'=> true])!!}

         @include('Files.partials.form')

         {!!Form::close()!!}
            
        
        </div>
        </div>
         </div>
         </div>
         </div>
        

@endsection