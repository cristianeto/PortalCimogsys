<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> @yield('titulo') - Red de Conocimiento</title>
	@yield('metas')
	@section('estilos')
		{{ HTML::style('css/styles.css'); }}
		{{ HTML::style('css/font-awesome.css'); }}
		{{ HTML::style('css/alertas.core.css'); }}
		{{ HTML::style('css/alertas.css'); }}
	@show
	@section('scripts')
		{{ HTML::script('js/jquery.js') }}
		{{ HTML::script('js/alertify.js') }}
	@show
</head>
@section('body')
	@yield('header')
	@yield('main')
	@section('footer')
		<footer class="ed-container full">
			<div class="ed-item movil-50 tablet-25 cross-center main-center">
				<img src="{{ asset('img/logoEspoch.png') }}" alt="Escuela Politécnica de Chimborazo" class="logo"/>
			</div>
		    <div class="ed-item movil-50 tablet-25 cross-center main-center">
		    	<img src="{{ asset('img/logoIndoamerica.png') }}" alt="Universidad Indoamerica" class="logo"/>
		    </div>
		    <div class="ed-item movil-50 tablet-25 cross-center main-center">
		    	<img src="{{ asset('img/logoUta.png') }}" alt="Universidad Técnica de Ambato" class="logo"/>
		    </div>
		    <div class="ed-item movil-50 tablet-25 cross-center main-center">
		    	<img src="{{ asset('img/logoCimogsys.png') }}" alt="Centro de Investigación en Modelos de Gestión y Sistemas Informáticos" class="logo"/>
		    </div>
	    </footer>
	@show
@show
</html>