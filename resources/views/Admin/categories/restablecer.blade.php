@extends('layouts.app')

@section('content')
   <div class="container">
     <div class="row">
      <div class="col-md-8 col-md-offset-2">
       <div class="panel panel-default">
         <div class="panel-heading">
           Lista de Departamentos Borrados
          
         
       <div class="panel-body">
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th width="10px">ID</th>
                <th>Nombre</th>
                <th colspan="3">&nbsp;</th>
              </tr>
            </thead>
            <tbody>
              @foreach($categories as $category)
                <tr>
                   <td>{{$category->id}}</td>
                   <td>{{$category->name}}</td>
                   <td width="10px">
                      <a href="{{route('restablecerDepto', $category->id)}}" class="btn btn-sm btn-default">
                        Restablecer
                      </a>
                      
                      </td>
                      </tr>
                      @endforeach
            </tbody>
          </table>
         
        </div>
        </div>
         </div>
         </div>
         </div>

@endsection