@extends('layouts.app')

@section('content')
   <div class="container">
     <div class="row">
      <div class="col-md-8 col-md-offset-2">
       <div class="panel panel-default">
         <div class="panel-heading">
          
         </div>
         
       <div class="panel-body">
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th width="10px">ID</th>
                <th>Nombre</th>
                <th>(Maximo 10 Post a la vez)</th>
                <th colspan="3">&nbsp;</th>
              </tr>
            </thead>
            <tbody>
              @foreach($posts as $post)
                <tr>
                   <td>{{$post->id}}</td>
                   <td>{{$post->name}}</td>
                  
                      <td width="10px">
                      <a href="{{route('removeSPublico', $post->id)}}" class="btn btn-sm btn-default">
                        Quitar de  Slider
                      </a>
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

@endsection