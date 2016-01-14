
@extends('plantilla.adminPlantilla')

@section('titulo')
  Perfil
@stop
<body class=" adminMisionVision">
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
 		<div class="ed-item movil-50 tipoUsuario ">Pasante</div>
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
 			<ul class="ed-container cross-start menuLateral">
 				<li class="ed-item main-start"><a class="menu-lateral-activo" href="{{URL::Route('acadPerfil')}}">{{ HTML::image('img/icono-cimogsys-negro.png', 'alt=icono CIMOGSYS en negro', array( 'class' => 'iconoMenuLateral' )) }}Perfil</a></li>
 				<li class="ed-item main-start"><a href="{{URL::Route('acadEditar')}}">{{ HTML::image('img/icono-cimogsys-negro.png', 'alt=icono CIMOGSYS en negro', array( 'class' => 'iconoMenuLateral' )) }}Editar perfil</a></li>
 			</ul>
 		</div>
 		<div class="ed-item movil-75 no-padding">
 			<div class="ed-container movil main-center menuCabecera">
 				<div class="ed-item base movil-1-6 main-center"><div class="iconoMenuCabecera menu-cabecera-activo"><a href="{{URL::Route('acadPerfil')}}"><i class="fa fa-user fa-3x"></i><small>Perfil</small></a></div></div>
 				<div class="ed-item base movil-1-6 main-center"><div class="iconoMenuCabecera"><a href="#"><i class="fa fa-files-o fa-3x"></i><small>Reportes</small></a></div></div>
 			</div>
 			<div class="ed-container movil ">
 				<div class="ed-item movil">
 					<div class="ed-container padding-3 topPerfil ">
 						<div class="ed-item movil-2-8 cross-center tituloPagina"><h4>Perfil</h4></div>
   					<div class="ed-item base movil-4-8"><h4>{{ Auth::user()->nombres_usuario}} {{Auth::user()->apellidos_usuario }}</h4><label>PROFESIONAL</label></div>
   					<div class="ed-item base movil-2-8 main-end cross-end">
              @if(Auth::user()->img_formal_usuario=="")
         				{{ HTML::image('img/usuario1.jpg', 'alt=logo centro CIMOGSYS', array( 'class' => 'fotoSesion' )) }}
         			@else
         				{{ HTML::image('img/usuario/'.Auth::user()->img_formal_usuario, 'alt=logo centro CIMOGSYS', array( 'class' => 'fotoSesionGrande' )) }}
        			@endif
   					</div>

 					</div>
 					<div class="ed-container base no-padding main-center panel padding-2">
            <div class="ed-item base informacion cross-center"><i class="fa fa-user fa-2x espacio"></i> Información</div>
            <div class="ed-item base detalle">
              <div class="ed-container">
                <div class="ed-item tablet web-65">
                  <h4 class="tituloDetalle">Formación académica</h4>
                  <p class="text-center">Estudió Master en Planificación, Evaluación y Acreditación en la Educación Superior en ESPOCH-RIOBAMBA</p>
                  <hr>
                  <p>Estudió Maestría en Estudios del Arte en la Universidad de Cuenca.</p>
                  <h4 class="tituloDetalle">Empleo</h4>
                  <p class="text-center">Estudió Maestría en Estudios del Arte en la Universidad de Cuenca.</p>
                  <hr>
                  <p class="text-center">Docente de la Escuela Superior Politécnica de Chimborazo (ESPOCH)</p>
                </div>
                <div class="ed-item tablet web-35 cross-center main-center">
                  <ul class="info-detalle">
                    <li><small><i class="fa fa-user-secret fa-2x espacio"></i></small>{{ Auth::user()->nick_usuario}}</li>
                    <li><small><i class="fa fa-mobile fa-2x espacio"></i></small>{{ Auth::user()->telefono_usuario}}</li>
                    <li><small><i class="fa fa-map-marker fa-2x espacio"></i></small>Riobamba - Ecuador</li>
                    <li><small><i class="fa fa-envelope-o fa-2x espacio"></i></small>{{ Auth::user()->correo_usuario}}</li>
                    <li><small><i class="fa fa-gift fa-2x espacio"></i></small>{{ Auth::user()->fecha_nacimiento_usuario}}</li>
                  </ul>
                </div>
              </div>
            </div>
 					</div>
 				</div>

 			</div>
 		</div>
 	</main>
