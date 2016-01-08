@extends('plantilla.adminPlantilla')
@section('titulo')
  Multimedia
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
 			<ul class="ed-container cross-start menuLateral">
 				<li class="ed-item main-start"><a class="menu-lateral-activo" href="#">{{ HTML::image('img/icono-cimogsys-negro.png', 'alt=icono CIMOGSYS en negro', array( 'class' => 'iconoMenuLateral' )) }}Multimedia</a></li>
 			</ul>
 		</div>
 		<div class="ed-item movil-75 no-padding">
 			<div class="ed-container movil main-center menuCabecera">
 				<div class="ed-item main-center movil-1-6"><div class="iconoMenuCabecera"><a href="{{URL::Route('admCentro')}}"><i class="fa fa-building-o fa-3x"></i><small>El Centro</small></a></div></div>
 				<div class="ed-item main-center movil-1-6"><div class="iconoMenuCabecera"><a href="{{URL::Route('admRedesSociales')}}"><i class="fa fa-users fa-3x"></i><small>Redes Sociales</small></a></div></div>
 				<div class="ed-item main-center movil-1-6"><div class="iconoMenuCabecera"><a href="{{URL::Route('admAreas')}}"><i class="fa fa-user fa-3x"></i><small>Área Gestión</small></a></div></div>
 				<div class="ed-item main-center movil-1-6"><div class="iconoMenuCabecera"><a href="{{URL::Route('admProyectos')}}"><i class="fa fa-files-o fa-3x"></i><small>Proyectos</small></a></div></div>
 				<div class="ed-item main-center movil-1-6"><div class="iconoMenuCabecera menu-cabecera-activo"><a href="{{URL::Route('admNoticias')}}"><i class="fa fa-newspaper-o fa-3x"></i><small>Noticias</small></a></div></div>
 			</div>
 			<div class="ed-container movil ">
 				<div class="ed-item movil">
 					<div class="ed-container padding-3 ">
 						<div class="ed-item movil-2-3 tituloPagina"><h4>Noticias</h4></div>
 						<!--<div class="ed-item movil-50 main-center cross-center">
 							{{Form::text('buscar')}}&nbsp{{Form::submit('Buscar', array('class' => 'btnIniciar'))}}
 						</div>-->
 					</div>
 					<div class="ed-container movil-2-3 no-padding main-center">
						
 						@if($centro!=null)
			 				{{ Form::open(array('url'=>'/pruebas/guardarNoticia')) }}
								<span>	
									{{ Form::hidden('centro_linea_investigacion', $centro->id_centro, array('readonly')) }} 
								</span>
								<label for="titulo">Título</label>
								{{ Form::text('titulo_noticia', '', array('class'=>'ed-item base')) }}<br>
								<label for="contenido">Contenido</label>
								{{ Form::textarea('contenido_noticia', '', array('class'=>'ed-item base')) }}<br>
								<label for="enlace">Enlace</label>
								{{ Form::text('enlace_noticia', '', array('class'=>'ed-item base')) }}<br>
								<label for="area">Área</label>
								<span>
									{{ Form::select('area_gestion_notica', $areas, '', array('class'=>'ed-item base')) }}
								</span> 
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
		 				@if(count($noticias)>0)
		 					<?php $cont=0 ?>
							@foreach($noticias as $noticia)   
							<div class="ed-item main-start">
								{{ Form::open(array('url'=>'/pruebas/actualizarNoticia','class'=>'ed-container')) }}
										<span> 
											{{ Form::hidden('id_noticia', $noticia->id_noticia, array('readonly')) }} 
										</span>
										<span> 
										{{ Form::hidden('centro_linea_investigacion', $centro->id_centro, array('readonly')) }} 
										</span>
										<label class="ed-item base" for="titulo_noticia">{{(++$cont)}}. Título</label>
										{{ Form::text('titulo_noticia', $noticia->titulo_noticia, array('class'=>'ed-item base')) }}
										<label class="ed-item base" for="contenido_noticia">Contenido</label>
										{{ Form::textarea('contenido_noticia', $noticia->contenido_noticia, array('class'=>'ed-item base')) }}
										<label class="ed-item base" for="enlace_noticia">Enlace</label>
										{{ Form::text('enlace_noticia', $noticia->enlace_noticia, array('class'=>'ed-item base')) }}
										<label class="ed-item base" for="area_gestion_notica">Área</label>
										{{ Form::select('area_gestion_notica',$areas, $noticia->area_gestion_notica, array('class'=>'ed-item base')) }}
									
									&nbsp; <div class="ed-item base main-end">{{ Form::submit('Modificar', array('class'=>'btnIniciar')) }}</div>
								{{ Form::close() }}
								{{ Form::open(array('url'=>'/pruebas/eliminarNoticia','class'=>'ed-container')) }}
								{{ Form::hidden('id_noticia', $noticia->id_noticia) }}
									&nbsp; <div class="ed-item base main-end">{{ Form::submit('Eliminar', array('class'=>'btnIniciar')) }}</div>
								{{ Form::close() }}
							</div>
							@endforeach
						@else
							<div class="ed-item main-start">
								<p>no hay noticias en el centro de investigación</p>
							</div>
						@endif
 					</div>
 				</div>
 				
 			</div>
 		</div>
 	</main>
