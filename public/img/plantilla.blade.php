<!DOCTYPE html>
<html lang="es">
<head>
  @section('metas')
	<!--meta etiquetas-->
  	<meta charset="UTF-8"/>
  	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
  	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
  	<meta name="description" content="Página del Centro de Investigación ESPOCH"/>
  	<meta name="author" content="Gabriela Baldeón"/>
  	<meta name="author" content="Fausto Cevallos"/>
  	<meta name="author" content="Cristian Guamán"/>
  	<meta name="keywords" content="investigación, modelos, gestión, software, diseño, informática, planificación estratégica"/>
  	<meta name="robots" content="index,follow"/>
  	<!--Geolocalización-->
  	<meta name="geo.region" content="EC-H"/>
  	<meta name="geo.placename" content="Riobamba"/>
  	<meta name="geo.position" content="-1.65613;-78.6814"/>
  	<meta name="ICBM" content="-1.65613, -78.6814"/>
  @show

	<title> @yield('titulo') | CIMOGSYS</title>

	@section('estilos')
    {{ HTML::style('css/estilos.css'); }}
    {{ HTML::style('css/miEstilo.css'); }}
    {{ HTML::style('fonts/font-awesome-4.5.0/css/font-awesome.min.css'); }}
	@show
	@section('scripts')
		{{ HTML::script('js/jquery.js'); }}
		{{ HTML::script('js/script.js'); }}
	@show
</head>
@section('body')
	@yield('header')
	@yield('main')
	@section('footer')
  	<footer class="ed-container full">
      	<div class="logos ed-item web-25 tablet-100 cross-center">
        		<div class="ed-container">
          		<div class="ed-item web-1-3 movil-1-3"><a href="http://www.espoch.edu.ec" target="blank"><img src="img/footerEspoch.png" alt="Espoch" class="cross-center"/></a></div>
          		<div class="ed-item web-1-3 movil-1-3"><a href="http://fade.espoch.edu.ec" target="blank"><img src="img/footerFade.png" alt="Espoch" class="cross-center"/></a></div>
          		<div class="ed-item web-1-3 movil-1-3"><a href="http://fie.espoch.edu.ec" target="blank"><img src="img/footerFie.png" alt="Espoch" class="cross-center"/></a></div>
        		</div>
      	</div>
      	<div class="informacion ed-item web-70 tablet-95 cross-center">
        		<div class="ed-container">
          		<div class="ed-item web-1-3 tablet-1-3 movil-100 cross-center">
            			<p>{{ $centro->descripcion_centro}}</p>
          		</div>
          		<div class="ed-item web-1-3 tablet-1-3 movil-100 cross-center">
            			<p>Dirección: {{ $centro->direccion_centro }} </p>
            			<p>TELF:{{ $centro->telefono_centro }}</p>
            			<p>Código Postal: {{$centro->codigo_postal_centro}}</p>
          		</div>
          		<div class="ed-item web-1-3 tablet-1-3 movil-100 cross-center">
            			<p>Términos de Uso | Políticas de Privacidad</p>
            			<p>Acerca de | Créditos | Acceso | <a href="{{URL::Route('iniciarSesion')}}">Iniciar Sesión</a> </p>
          		</div>
        		</div>
      	</div>
      	<div class="redes ed-item web-5 tablet-5 main-center">
          <a href="http://www.facebook.com" target="blank" class="cross-center tablet-100 movil-1-3 main-center"><img src="img/footerFacebook.png" alt=""/></a>
          <a href="http://www.facebook.com" target="blank" class="cross-center tablet-100 movil-1-3 main-center"><img src="img/footerTwitter.png" alt=""/></a>
          <a href="http://www.facebook.com" target="blank" class="cross-center tablet-100 movil-1-3 main-center"><img src="img/footerYoutube.png" alt=""/></a>
        </div>
    	</footer>
	@show
@show
</html>
