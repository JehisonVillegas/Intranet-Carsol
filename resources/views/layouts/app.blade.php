<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Intranet Carsol</title>

  <link rel="shortcut icon" href="/image/favicon.ico" /> 

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <link rel="stylesheet" href="/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->

  <link rel="stylesheet" href="/adminlte/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="/adminlte/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/adminlte/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="/adminlte/css/skins/skin-purple.min.css">

  <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->




 <?php
use App\Category;

$departamentos=Category::all();

 ?>

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<meta name="csrf-token" content="{{ csrf_token() }}">
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|


-->

<style>

body{
  zoom: 90%;
}
</style>
<body class="hold-transition skin-purple sidebar-mini" >




<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">
         
    <!-- Logo -->
    <a href="/" class="logo">


      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>I</b>C</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Intranet</b>Carsol</span>
    </a>



    <!-- Header Navbar -->

    <nav class="navbar navbar-static-top" role="navigation">
<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
   
    <div class="navbar-custom-menu" >

   
    
                        <!-- Authentication Links -->
              <!-- Right Side Of Navbar -->
              
                        <!-- Authentication Links -->
                        @guest
                               <ul class="nav navbar-nav navbar-right">
                               
                            <li><a href="{{ route('login') }}">INGRESAR&nbsp&nbsp&nbsp&nbsp</a></li>
                            </ul>
                        @else
                          
                      <!--Cuenta Administrador-->
                              <ul class="nav navbar-nav navbar-right">
                              <li><a href="{{ route('Mis_Datos')}}">{{auth()->user()->name}}</a></li>
                                 <!--
           {{--Aqui se revisa si el usuario es el administrador y desplguiega las opciones--}}
               -->

                         @if(auth()->user()->email == 'jehison_snake@hotmail.com')
                           
                            <li><a href="{{ route('users.index') }}">Registrar Usuario</a></li>
                            <li><a href="{{ route('tags.index') }}">Etiquetas</a></li>
                            <li><a href="{{ route('AP') }}">Administrar Entradas</a></li>
                            <li><a href="{{ route('categories.index') }}">Departamentos</a></li>



                               

                            >@endif

                            <li><a href="{{ route('archivos.index') }}">Mis Archivos</a></li>
                            <li><a href="{{ route('posts.index') }}">Mis Entradas</a></li>

                           
                            
                               <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                   
                                </ul>
                            </li>
                            
                        @endguest
                    </ul>
                </div>
            </div>

        </nav>

        @if (session('info'))
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="alert alert-success">
                            {{ session('info') }}
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if(count($errors))            
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endif

    
        
    </div>
                <!-- Sidebar toggle button-->
 
         
  </header>


  <!-- Left side column. contains the logo and sidebar -->
@guest

  <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
    

 @else
  <aside class="main-sidebar">


    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
     

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
         
          <span class="input-group-btn">
              
              </button>
            </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
  
        <li class="header">DEPARTAMENTOS</li>

        <!-- Optionally, you can add icons to the links -->

         <li class="active"><a href="{{route('allPosts')}}"><i class="fa fa-link"></i> <span>Ver Todo</span></a></li>
        @foreach($departamentos as $departamento)
        <li class="active"><a href="{{route('departamento', $departamento->slug )}}"><i class="fa fa-link"></i> <span>{{$departamento->name}}</span></a></li>
       @endforeach
       
            
          </ul>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
    
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" >
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
    <section class="content container-fluid">
     
@endguest
 



         @yield('content')



      <!--------------------------
        | Your Page Content Here |
        -------------------------->

    </section>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="/adminlte/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- adminlte App -->
<script src="/adminlte/js/adminlte.min.js"></script>


@yield('scripts')

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>