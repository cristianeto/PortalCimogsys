
@extends('plantilla.adminPlantilla')

@section('titulo')
  Error 404
@stop
@section('body')
<body class="desarrollo adminMisionVision">
@parent
@if (Session::has('mensaje'))
		<div>
			<span>{{ Session::get('mensaje') }}</span>
		</div>
@endif
	<div class="ed-container full bannerTop cross-center">
		<div class="ed-item web-50 main-start"><a class="" href="{{URL::Route('inicio')}}">{{ HTML::image('img/logo-en-negativo.png', 'alt=logo CIMOGSYS en negativo', array( 'class' => 'logoBlanco' )) }}</a></div>
		<div class="ed-item web-50 main-end cerrarSesion"><a class="cerrar" href="{{ URL::to('/logout') }}">Cerrar Sesión</a></div>
	</div>
 	<header class="ed-container full cross-center">
 		<div class="ed-item movil-50 tipoUsuario ">Comité Académico</div>
 		<div class="ed-item movil-50 cross-center main-end"> {{ Auth::user()->nombres_usuario}} {{Auth::user()->apellidos_usuario }} &nbsp &nbsp

			@if(Auth::user()->img_formal_usuario=="")
 				{{ HTML::image('img/usuario1.jpg', 'alt=logo centro CIMOGSYS', array( 'class' => 'fotoSesion' )) }}
 			@else
 				{{ HTML::image('img/usuario/'.Auth::user()->img_formal_usuario, 'alt=logo centro CIMOGSYS', array( 'class' => 'fotoSesion' )) }}
			@endif
 		</div>
 	</header>
 	<main class="ed-container full">
 		<div class="ed-item movil-25 lateral no-padding">
 			<h4 class="bienvenido">Bienvenido</h4>

 		</div>
 		<div class="ed-item movil-75 no-padding">
 			<div class="ed-container main-center full noExiste">
 			  <div class="ed-item main-center cross-center no-padding">
 			    <p>OOPS! Página no funcionando</p>
 			  </div>
 			  <div class="ed-item cross-center main-center">
 			    <p>Lo sentimos la página que está intentando cargar no existe :(</p>
 			  </div>
 			  <div class="ed-item base movil-6-8 cuadroCasa no-padding">
 			    <div class="ed-container">
 			      <div class="ed-item base movil-2-3 main-start opciones">
 			        <ul>
 			          <li>01. Comprobación de la dirección para los errores.</li>
 			          <li>02. Visitar la página de inicio (enlace a la derecha).</li>
 			          <li>03. Visitar nuestro sitio web Mapa del sitio aquí .</li>
 			          <li>04. Utilizando el buscador de sitio Web.</li>
 			        </ul>
 			      </div>
 			      <div class="ed-item base cross-center main-center movil-1-3 home "><i class="fa fa-home fa-4x"></i></div>
 			    </div>
 			  </div>

 			</div>
 		</div>
 	</main>
</body>
@stop
