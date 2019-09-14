@extends('layouts.app')

@section('content')
   <div class="container">
     <div class="row">
      <div class="col-md-8 col-md-offset-2">
       <div class="panel panel-default">
         <div class="panel-heading">
           Lista de Archivos
           <a href="{{route('archivos.create')}}" 
           class="btn btn-sm btn-primary pull-right">
            Subir Archivo
           </a>
         </div>
         
       <div class="panel-body">
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th width="10px">ID</th>
                <th>Nombre</th>
                <th>Descarga</th>
                <th colspan="3">&nbsp;</th>
              </tr>
            </thead>
            <tbody>
              @foreach($archivos as $archivo)
                <tr>
                   <td>{{$archivo->id}}</td>
                   <td>{{$archivo->name}}</td>
                   <td><a href="{{$archivo->file}}">Download</a></td>
                  
                     
                      <td width="10px">
                      {!!Form::open(['route' =>['archivos.destroy',$archivo->id], 'method' =>'DELETE'])!!}
                        <button class="btn btn-sm btn-danger">
                         Eliminar
                        </button>
                      
                       {!!Form::close()!!}

                      </td>
                      </tr>
                      @endforeach
            </tbody>
          </table>
          {{$archivos->render()}}
        </div>
        </div>
         </div>
         </div>
         </div>

@endsection