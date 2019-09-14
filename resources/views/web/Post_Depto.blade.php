@extends('layouts.app')

@section('content')
<style type="text/css">
#global {
   height: 575px;
    width: 100%;
    border: 1px solid #ddd;
    background: #f1f1f1;
    overflow-y: scroll;
    float:right;
}
#mensajes {
    height: auto;
}
.texto {
    padding:4px;
    background:#fff;
}
</style>


<a href="{{route('archivosDepto',$category)}}">Archivos</a>
<div id="global">
<div id="mensajes">
<div class="container" style="background-image: url('/image/fondo_noticias_2.jpg'); width:100%; height: 100%;"> >
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

        	<h1>Noticias {{$namecategory}} </h1>
            
        	@foreach($posts as $post)

            <div class="panel panel-default">
                <div class="panel-heading"></div>
                 <h3>{{$post->name}}</h3>
                <div class="panel-body">
                    @if($post->file)
                        <img src="{{ $post->file }}" class="img-responsive" width="800px" height="500px">
                    @else

                    <img src="http://psiquelink.com/wp-content/uploads/2016/05/no-disponible.jpg" class="img-responsive" width="300px" height="300px">
                    @endif
                    {{ $post->excerpt }}
                    <a href="{{ route('post', $post->slug) }}" class="pull-right"><h4>Leer más</h4></a>
                </div>
            </div>
            @endforeach

            {{ $posts->render() }}
        </div>
    </div>
</div>
</div>
</div>
@endsection
