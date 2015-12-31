@extends('plantilla.plantilla')

@section('titulo')
	Inicio
@stop
@section('body')
@parent
<body class="inicio">
	
@section('header')
	<header class="ed-container full">
	    <div class="ed-item base-50 cross-center">
	      <h1 class="titulo">Bienvenido, {{ Auth::user()->usuario_nombres; }}</h1>
	    </div>
	    <div class="ed-item base-50 cross-center main-end">
	    	<a class="enlace cross-center main-center" href="{{ URL::to('/administrador/moderador') }}">Moderadores</a>
	    	<a class="enlace cross-center main-center" href="{{ URL::to('/administrador/perfil') }}">Perfil</a>
		    <a class="enlace cross-center main-center" href="{{ URL::to('/logout') }}">Salir</a>
	    </div>
	  </header>
@stop

@section('main')
	<main class="ed-container full">
	    <div class="ed-item movil-100 main-center cross-center">
			<h2>Red de Conocimiento</h2>
	    </div>
	</main>
@stop

@section('footer')
	@parent
@stop

</body>
@stop