@extends('layouts.app')

@section('content')
   <div class="container">
     <div class="row">
      <div class="col-md-8 col-md-offset-2">
       <div class="panel panel-default">
         <div class="panel-heading">
          Usuario
          
         </div>
         
       <div class="panel-body">
         <p><strong>  Nombre : </strong>  {{$user->name}}</p>
        
        <p><strong>  e-mail  :</strong>  {{$user->email}}</p>

        <p><strong> Departamento :</strong> {{$departamento->first()->name}} </p>
        </div>
        </div>
         </div>
         </div>
         </div>
         

@endsection