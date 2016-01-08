@extends('plantilla.adminPlantilla')
@section('titulo')
  Misión Visión
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
 		<div class="ed-item movil-50 tipoUsuario ">Administrador</div>	
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
 			<!--<ul class="ed-container cross-start menuLateral">
 				<li class="ed-item main-start"><a href="{{URL::Route('admin/misionVision')}}">{{ HTML::image('img/icono-cimogsys-negro.png', 'alt=icono CIMOGSYS en negro', array( 'class' => 'iconoMenuLateral' )) }}Misión - Visión - Quiénes somos</a></li>
 				<li class="ed-item main-start"><a href="{{URL::Route('admObjetivos')}}">{{ HTML::image('img/icono-cimogsys-negro.png', 'alt=icono CIMOGSYS en negro', array( 'class' => 'iconoMenuLateral' )) }}Objetivos</a></li>
 				<li class="ed-item main-start"><a href="{{URL::Route('admBeneficiarios')}}">{{ HTML::image('img/icono-cimogsys-negro.png', 'alt=icono CIMOGSYS en negro', array( 'class' => 'iconoMenuLateral' )) }}Beneficiarios</a></li>
 				<li class="ed-item main-start"><a class="menu-lateral-activo" href="{{URL::Route('admLineas')}}">{{ HTML::image('img/icono-cimogsys-negro.png', 'alt=icono CIMOGSYS en negro', array( 'class' => 'iconoMenuLateral' )) }}Líneas de investigación</a></li>
 			</ul>
 			-->
 		</div>
 		<div class="ed-item movil-75 no-padding">
 			<div class="ed-container movil main-center menuCabecera">
 				<div class="ed-item main-center movil-1-6"><div class="iconoMenuCabecera"><a href="{{URL::Route('admCentro')}}"><i class="fa fa-building-o fa-3x"></i><small>El Centro</small></a></div></div>
 				<div class="ed-item main-center movil-1-6"><div class="iconoMenuCabecera menu-cabecera-activo"><a href="#"><i class="fa fa-users fa-3x"></i><small>Redes Sociales</small></a></div></div>
 				<div class="ed-item main-center movil-1-6"><div class="iconoMenuCabecera"><a href="{{URL::Route('admAreas')}}"><i class="fa fa-user fa-3x"></i><small>Área Gestión</small></a></div></div>
 				<div class="ed-item main-center movil-1-6"><div class="iconoMenuCabecera"><a href="{{URL::Route('admProyectos')}}"><i class="fa fa-files-o fa-3x"></i><small>Proyectos</small></a></div></div>
 				<div class="ed-item main-center movil-1-6"><div class="iconoMenuCabecera"><a href="{{URL::Route('admNoticias')}}"><i class="fa fa-newspaper-o fa-3x"></i><small>Noticias</small></a></div></div>
 			</div>
 			<div class="ed-container movil ">
 				<div class="ed-item movil">
 					<div class="ed-container padding-3 ">
 						<div class="ed-item movil-2-3 tituloPagina"><h4>Redes Sociales</h4></div>
 						<!--<div class="ed-item movil-50 main-center cross-center">
 							{{Form::text('buscar')}}&nbsp{{Form::submit('Buscar', array('class' => 'btnIniciar'))}}
 						</div>-->
 					</div>
 					<div class="ed-container movil-1-3 no-padding main-center">
 						@if($centro!=null)
							{{ Form::open(array('url'=>'/pruebas/guardarRedesSociales')) }}
							
							<label class="ed-item base" for="nombre_redes_sociales">Nombre Red</label>
							{{ Form::text('nombre_redes_sociales', '',array('placeholder'=>'Facebook','class'=>'ed-item base')) }}
							
							<label class="ed-item base" for="enlace_redes_sociales">Enlace Red</label>
							{{ Form::text('enlace_redes_sociales', '',array('placeholder'=>'https://www.facebook.com/centro.cimogsys','class'=>'ed-item base')) }}
							<label class="ed-item base" for="usuario_redes_sociales">Usuario Red</label>
							{{ Form::text('usuario_redes_sociales', '',array('placeholder'=>'centro.cimogsys','class'=>'ed-item base')) }}
							
								{{ Form::hidden('centro_redes_sociales', $centro->id_centro, array('readonly')) }} 
							<br>
							{{ Form::submit('Agregar',array('class'=>'submit btnIniciar')) }}
						{{ Form::close() }}

 						@else
 						<div class="ed-item main-start">
							<p>No existe el centro de investigación registrado.</p>
						</div>
 						@endif
 					</div>
					<hr>
 					<div class="ed-container movil-2-3 no-padding main-center">
 						@if($centro!=null)
							@if(count($redes)>0)
							<?php $cont=0 ?>
					@foreach($redes as $red)   
					<div class="ed-item main-start">
						{{ Form::open(array('url'=>'/pruebas/actualizarRedesSociales','class'=>'ed-container')) }}
								{{ Form::hidden('id_redes_sociales', $red->id_redes_sociales, array('readonly')) }}
								{{(++$cont)}}.
								<label class="ed-item base" for="nombre_redes_sociales">Nombre</label>
								{{ Form::text('nombre_redes_sociales', $red->nombre_redes_sociales, array('placeholder'=>'Facebook','class'=>'ed-item base')) }}
								<label class="ed-item base" for="enlace_redes_sociales">Enlace</label>
								{{ Form::text('enlace_redes_sociales', $red->enlace_redes_sociales, array('placeholder'=>'https://www.facebook.com/centro.cimogsys','class'=>'ed-item base')) }}
								<label class="ed-item base" for="usuario_redes_sociales">Usuario</label>
								{{ Form::text('usuario_redes_sociales', $red->usuario_redes_sociales, array('placeholder'=>'centro.cimogsys','class'=>'ed-item base')) }}
								 {{ Form::hidden('centro_redes_sociales', $red->centro_redes_sociales, array('readonly')) }} 
							&nbsp; <div class="ed-item base movil main-end no-padding">{{ Form::submit('Modificar', array('class'=>'main-end btnIniciar')) }}</div>
						{{ Form::close() }}
						{{ Form::open(array('url'=>'/pruebas/eliminarRedesSociales','class'=>'ed-container')) }}
							{{ Form::hidden('id_redes_sociales', $red->id_redes_sociales, array('readonly','style'=>'display:none')) }}
							&nbsp; 
							<div class="ed-item movil main-end no-padding">{{ Form::submit('Eliminar', array('class'=>'btnIniciar')) }}</div>
							
						{{ Form::close() }}
					</div>
					@endforeach
				@else
					<div class="ed-item main-start">
						<p>no hay redes sociales en el centro de investigación</p>
					</div>
				@endif

 						@else
 						<div class="ed-item main-start">
							<p>No existe el centro de investigación registrado.</p>
						</div>
 						@endif
 					</div>
 				</div>
 				
 			</div>
 		</div>
 	</main>
