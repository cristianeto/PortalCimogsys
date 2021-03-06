
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
 			
 		</div>
 		<div class="ed-item movil-75 no-padding">
 			<div class="ed-container movil main-center menuCabecera">
 				<div class="ed-item main-center movil-1-6"><div class="iconoMenuCabecera"><a href="{{URL::Route('admCentro')}}"><i class="fa fa-building-o fa-3x"></i><small>El Centro</small></a></div></div>
 				<div class="ed-item main-center movil-1-6"><div class="iconoMenuCabecera"><a href="{{URL::Route('admRedesSociales')}}"><i class="fa fa-users fa-3x"></i><small>Redes Sociales</small></a></div></div>
 				<div class="ed-item main-center movil-1-6"><div class="iconoMenuCabecera"><a href="{{URL::Route('admAreas')}}"><i class="fa fa-user fa-3x"></i><small>Área Gestión</small></a></div></div>
 				<div class="ed-item main-center movil-1-6"><div class="iconoMenuCabecera menu-cabecera-activo"><a href="{{URL::Route('admProyectos')}}"><i class="fa fa-files-o fa-3x"></i><small>Proyectos</small></a></div></div>
 				<div class="ed-item main-center movil-1-6"><div class="iconoMenuCabecera"><a href="{{URL::Route('admNoticias')}}"><i class="fa fa-newspaper-o fa-3x"></i><small>Noticias</small></a></div></div>
 			</div>
 			<div class="ed-container movil ">
 				<div class="ed-item movil">
 					<div class="ed-container padding-3 ">
 						<div class="ed-item movil-2-3 tituloPagina"><h4>Proyectos</h4></div>
 						<!--<div class="ed-item movil-50 main-center cross-center">
 							{{Form::text('buscar')}}&nbsp{{Form::submit('Buscar', array('class' => 'btnIniciar'))}}
 						</div>-->
 					</div>
 					<div class="ed-container movil-2-3 no-padding main-center">
 						@if($areas!=null)
			 				{{ Form::open(array('url'=>'/pruebas/guardarProyectos','files'=>'true')) }}
								<label for="nombre_proyectos">Nombre</label>
								{{ Form::text('nombre_proyectos', '', array('class'=>'ed-item base')) }}
								<br>
								<label for="enlace_proyectos">Enlace</label>
								{{ Form::text('enlace_proyectos', '', array('class'=>'ed-item base')) }}
								<br>
								<label for="descripcion_proyectos">Descripción</label>
								{{ Form::textarea('descripcion_proyectos', '', array('class'=>'ed-item base')) }}
								<br>
								<label for="imagen_banner_proyectos">Imagen banner</label>
								{{ Form::file('imagen_banner_proyectos') }}
								<br>
								<label for="imagen_min_proyectos">Imagen miniatura</label>
								{{ Form::file('imagen_min_proyectos') }}
								<br>
								<label for="area_gestion_proyectos">Área gestión</label>
								{{ Form::select('area_gestion_proyectos',$areas, '', array('class'=>'ed-item base')) }}
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
					<div class="ed-container base movil-2-3">
							@if(count($proyectos)>0)
								<?php $cont=1?>
								@foreach($proyectos as $proyecto)   
								<div class="ed-item main-start">
									{{ Form::open(array('url'=>'/pruebas/actualizarProyectos','files'=>'true','class'=>'ed-container')) }}
									<!--<label for="id_proyectos">id</label>-->
									{{ Form::hidden('id_proyectos',$proyecto->id_proyectos,array('readonly')) }}
									<label class="ed-item base" for="nombre_proyectos">{{$cont++}}. Nombre</label>
									{{ Form::text('nombre_proyectos',$proyecto->nombre_proyectos, array('class'=>'ed-item base')) }}
									<br>
									<label class="ed-item base" for="enlace_proyectos">Enlace</label>
									{{ Form::text('enlace_proyectos',$proyecto->enlace_proyectos, array('class'=>'ed-item base')) }}
									<br>
									<label class="ed-item base" for="descripcion_proyectos">Descripción</label>
									{{ Form::textarea('descripcion_proyectos',$proyecto->descripcion_proyectos, array('class'=>'ed-item base')) }}
									<br>
									<label class="ed-item base" for="imagen_banner_proyectos">Imagen banner</label>
									<img class="ed-item base imagenNoticia" src=" {{ asset('img/'.$proyecto->imagen_banner_proyectos) }}" alt="">
									{{ Form::file('imagen_banner_proyectos', array('class'=>'ed-item base')) }}
									<br>
									<label class="ed-item base" for="imagen_min_proyectos">Imagen miniatura</label>
									 <img class="ed-item base imagenNoticia" src=" {{ asset('img/'.$proyecto->imagen_min_proyectos) }}" alt="">
									{{ Form::file('imagen_min_proyectos', array('class'=>'ed-item base')) }}
									<br>
									<label class="ed-item base" for="area_gestion_proyectos">Área de gestión</label>
									{{ Form::select('area_gestion_proyectos',$areas,$proyecto->area_gestion_proyectos) }}
									<br> <div class="ed-item base main-end">{{ Form::submit('Modificar', array('class'=>'btnIniciar')) }}</div>
									{{ Form::close() }}
									{{ Form::open(array('url'=>'/pruebas/eliminarProyectos','class'=>'ed-container')) }}
									{{ Form::text('id_proyectos', $proyecto->id_proyectos,array('style'=>'display:none')) }}
										&nbsp; <div class="ed-item base main-end">{{ Form::submit('Eliminar', array('class'=>'btnIniciar')) }}</div>
									{{ Form::close() }}
								</div>
								@endforeach
							@else
								<div class="ed-item main-start">
									<p>no hay proyectos en el centro de investigación.</p>
								</div>
							@endif
					</div>
 				</div>
 			</div>
 		</div>
 	</main>
