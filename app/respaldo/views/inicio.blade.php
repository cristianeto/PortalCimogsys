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
		      <h1>Bienvenidos</h1>
		    </div>
		    <div class="ed-item base-50 cross-center main-end">
			    <a class="enlace cross-center main-center" href="{{ URL::to('/usuarios/registro') }}"> Inicio &nbsp; | &nbsp; <i class="fa fa-home"></i> </a>
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