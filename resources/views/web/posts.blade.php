@extends('layouts.app')
@section('content')

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="/adminlte/css/slider.css">


<style type="text/css">

[class*=underlay] {
  left: 0;
  min-height: 100%;
  min-width: 100%;
  position: fixed;
  top: 0;
}
  
.underlay-photo {
  
  background: url('https://www.carsolfruit.cl/wp-content/uploads/2016/02/slider2.jpg');
  background-size: cover;
  -webkit-filter: grayscale(0);
  z-index: -1;
}




</style>


<!-- slider publico-->
@guest




<br>
<br>
<div id="contenedor-slider" class="contenedor-slider" >


 <div id="slider" class="slider">
 @foreach ($post as $posteos)
         @if($posteos->file && $posteos->publico=="SI")
         
    <section class="slider__section">
   
       <font color="black">
     <h3> {{$posteos->name}}</h3>
     </font>
    
     <a href="{{route('post',$posteos->slug)}}"> <img src="{{ $posteos->file }}" class="slider__img"></a></section>
     
  
     @endif
       @endforeach
  </div>
  
 
  <div id="btn-prev" class="btn-prev">&#60;</div>
  <div id="btn-next" class="btn-next">&#62;</div>
  
  
 </div>

  <div class="underlay-photo"></div>

@else

<!-- slider privado-->

<div id="contenedor-slider" class="contenedor-slider" >

 <div id="slider" class="slider">
 @foreach ($post as $posteos)
         @if($posteos->file && $posteos->slider=="1")
         
    <section class="slider__section">
    <font color="black">
     <h3> {{$posteos->name}}</h3>
     </font>
     <a href="{{route('post',$posteos->slug)}}"> <img src="{{ $posteos->file }}" class="slider__img"></a></section>
     
  
     @endif
       @endforeach
  </div>
  
 
  <div id="btn-prev" class="btn-prev">&#60;</div>
  <div id="btn-next" class="btn-next">&#62;</div>
  
  
 </div>


@endif





<script type="text/javascript">

 //almacenar slider en una variable
var slider = $('#slider');
//almacenar botones
var siguiente = $('#btn-next');
var anterior = $('#btn-prev');

//mover ultima imagen al primer lugar
$('#slider .slider__section:last').insertBefore('#slider .slider__section:first');
//mostrar la primera imagen con un margen de -100%
slider.css('margin-left', '-'+100+'%');

function moverD() {
  slider.animate({
    marginLeft:'-'+200+'%'
  } ,700, function(){
    $('#slider .slider__section:first').insertAfter('#slider .slider__section:last');
    slider.css('margin-left', '-'+100+'%');
  });
}

function moverI() {
  slider.animate({
    marginLeft:0
  } ,700, function(){
    $('#slider .slider__section:last').insertBefore('#slider .slider__section:first');
    slider.css('margin-left', '-'+100+'%');
  });
}

function autoplay() {
  interval = setInterval(function(){
    moverD();
  }, 5000);
}
siguiente.on('click',function() {
  moverD();
  clearInterval(interval);
  autoplay();
});

anterior.on('click',function() {
  moverI();
  clearInterval(interval);
  autoplay();
});


autoplay();
</script>
@endsection
