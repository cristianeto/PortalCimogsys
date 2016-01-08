
@extends('plantilla.adminPlantilla')

@section('titulo')
  Area Gestión
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
 				<li class="ed-item main-start"><a href="{{URL::Route('admUsuarios')}}">{{ HTML::image('img/icono-cimogsys-negro.png', 'alt=icono CIMOGSYS en negro', array( 'class' => 'iconoMenuLateral' )) }}Usuarios</a></li>
 				<li class="ed-item main-start"><a href="{{URL::Route('admInformes')}}">{{ HTML::image('img/icono-cimogsys-negro.png', 'alt=icono CIMOGSYS en negro', array( 'class' => 'iconoMenuLateral' )) }}Informes</a></li>
 			</ul>
 		</div>
 		<div class="ed-item movil-75 no-padding">
 			<div class="ed-container movil main-center menuCabecera">
 				<div class="ed-item main-center movil-1-6"><div class="iconoMenuCabecera"><a href="{{URL::Route('admCentro')}}"><i class="fa fa-building-o fa-3x"></i><small>El Centro</small></a></div></div>
 				<div class="ed-item main-center movil-1-6"><div class="iconoMenuCabecera"><a href="{{URL::Route('admRedesSociales')}}"><i class="fa fa-users fa-3x"></i><small>Redes Sociales</small></a></div></div>
 				<div class="ed-item main-center movil-1-6"><div class="iconoMenuCabecera menu-cabecera-activo"><a href="{{URL::Route('admAreas')}}"><i class="fa fa-user fa-3x"></i><small>Área Gestión</small></a></div></div>
 				<div class="ed-item main-center movil-1-6"><div class="iconoMenuCabecera"><a href="{{URL::Route('admProyectos')}}"><i class="fa fa-files-o fa-3x"></i><small>Proyectos</small></a></div></div>
 				<div class="ed-item main-center movil-1-6"><div class="iconoMenuCabecera"><a href="{{URL::Route('admNoticias')}}"><i class="fa fa-newspaper-o fa-3x"></i><small>Noticias</small></a></div></div>
 			</div>
 			<div class="ed-container movil ">
 				<div class="ed-item movil">
 					<div class="ed-container padding-3 ">
 						<div class="ed-item movil-2-3 tituloPagina"><h4>Áreas de Gestión</h4></div>
 						<!--<div class="ed-item movil-50 main-center cross-center">
 							{{Form::text('buscar')}}&nbsp{{Form::submit('Buscar', array('class' => 'btnIniciar'))}}
 						</div>-->
 					</div>
 					<div class="ed-container movil-2-3 no-padding main-center">
		 				{{ Form::open(array('url'=>'/pruebas/guardarAreaGestion')) }}
							<label for="nombre_area_gestion">Nombre</label>
							{{ Form::text('nombre_area_gestion','',array('placeholder'=>'Proyectos','class'=>'ed-item base')) }}<br>
							<label for="descripcion_area_gestion">Descripción</label>
							{{ Form::text('descripcion_area_gestion','',array('placeholder'=>'Esta área es la encargada de gestionar, planificar y documentar los proyectos del centro.','class'=>'ed-item base')) }}<br>
							<label for="color_area_gestion">Color</label>
							{{ Form::text('color_area_gestion','',array('placeholder'=>'#FFF','class'=>'ed-item base')) }}
							<span> {{ Form::hidden('centro_area_gestion', $centro->id_centro, array('readonly')) }} </span>
							<br>
							{{ Form::submit('Agregar',array('class'=>'submit btnIniciar')) }}
						{{ Form::close() }}
 					</div>
 					<hr>

 					<div class="ed-container movil-2-3 no-padding main-center">
						
 						@if($centro!=null)
 								@if(count($areas)>0)
					@foreach($areas as $area)   
					<div class="ed-item main-start">
						{{ Form::open(array('url'=>'/pruebas/actualizarAreaGestion','class'=>'ed-container')) }}
								{{ Form::hidden('id_area_gestion', $area->id_area_gestion, array('readonly')) }} 
								<label class="ed-item base" for="nombre_area_gestion">Nombre</label>
								{{ Form::text('nombre_area_gestion', $area->nombre_area_gestion, array('class'=>'ed-item')) }}
								<label class="ed-item base" for="nombre_area_gestion">Descripción</label>
								{{ Form::textarea('descripcion_area_gestion', $area->descripcion_area_gestion, array('class'=>'ed-item')) }}
								<label class="ed-item base" for="color_area_gestion">Color</label>
								{{ Form::text('color_area_gestion', $area->color_area_gestion, array('class'=>'ed-item')) }}
								{{ Form::hidden('centro_area_gestion', $centro->id_centro, array('readonly')) }} 
							&nbsp; {{ Form::submit('Modificar', array('class'=>'btnIniciar')) }}
						{{ Form::close() }}
						{{ Form::open(array('url'=>'/pruebas/eliminarAreaGestion','class'=>'ed-container')) }}
							{{ Form::hidden('id_area_gestion', $area->id_area_gestion, array('readonly','style'=>'display:none')) }}
							&nbsp; {{ Form::submit('Eliminar', array('class'=>'btnIniciar')) }}
						{{ Form::close() }}
					</div>
					@endforeach
				@else
					<div class="ed-item main-start">
						<p>no hay beneficiarios en el centro de investigación</p>
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
