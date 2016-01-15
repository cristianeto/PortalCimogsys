<!DOCTYPE html>
<html lang="es">
<head>
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
  	<!--meta etiquetas sociales-->
  	<!--Google-->
  	<meta itemprop="name" content="Centro de Investigación CIMOGSYS"/>
  	<meta itemprop="description" content="Centro de investigación en modelos de Gestión y Sistemas Informáticos"/> <meta itemprop="image" content="img/headerLogo.png"/>
  	<meta itemprop="author" content="CIMOGSYS"/>
  	<!--Open Graph data (Facebook)-->
  	<meta property="og:title" content="Centro de Investigación CIMOGSYS"/>
  	<meta property="og:url" content="http://www.fausto.bugs3.com"/>
  	<meta property="og:image" content="img/headerLogo.png"/>
  	<meta property="og:description" content="Centro de investigación en modelos de Gestión y Sistemas Informáticos"/>
  	<meta property="og:site_name" content="CIMOGSYS.COM"/>
  	<!--Twitter-->
  	<meta name="twitter:card" content="summary_large_image"/>
  	<meta name="twitter:site" content="@Centro_Cimogsys"/>
  	<meta name="twitter:title" content="Centro de Investigación CIMOGSYS"/>
  	<meta name="twitter:description" content="Centro de investigación en modelos de Gestión y Sistemas Informáticos"/>
  	<meta name="twitter:creator" content="@autor"/>
  	<meta name="twitter:image:src" content="img/headerLogo.png"/>

	<title> CIMOGSYS | @yield('titulo')</title>
	@yield('metas')
	@section('estilos')
    {{ HTML::style('css/styles.css'); }}
    {{ HTML::style('css/miEstilo.css'); }}
    {{ HTML::style('fonts/font-awesome-4.5.0/css/font-awesome.css'); }}
    {{ HTML::style('dataTables/jquery.dataTables.min.css'); }}
	@show
	@section('scripts')
		{{ HTML::script('js/jquery.js') }}
		{{ HTML::script('js/script.js') }}
		{{ HTML::script('dataTables/jquery-1.12.0.min.js') }}
		{{ HTML::script('dataTables/jquery.dataTables.min.js') }}
		{{ HTML::script('dataTables/miDataTables.js') }}
	@show
</head>
@section('body')
	@yield('header')
	@yield('main')
	@section('footer')
  
	@show
@show
</html>
