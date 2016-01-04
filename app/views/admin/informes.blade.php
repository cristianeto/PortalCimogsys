
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
 			<ul class="ed-container cross-start menuLateral">
 				<li class="ed-item main-start"><a href="{{URL::Route('admUsuarios')}}">{{ HTML::image('img/icono-cimogsys-negro.png', 'alt=icono CIMOGSYS en negro', array( 'class' => 'iconoMenuLateral' )) }}Usuarios</a></li>
 				<li class="ed-item main-start"><a class="menu-lateral-activo" href="{{URL::Route('admInformes')}}">{{ HTML::image('img/icono-cimogsys-negro.png', 'alt=icono CIMOGSYS en negro', array( 'class' => 'iconoMenuLateral' )) }}Informes</a></li>
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
 						<div class="ed-item movil-2-3 tituloPagina"><h4>Áreas de Gestión: Informes</h4></div>
 						<!--<div class="ed-item movil-50 main-center cross-center">
 							{{Form::text('buscar')}}&nbsp{{Form::submit('Buscar', array('class' => 'btnIniciar'))}}
 						</div>-->
 					</div>
 					<div class="ed-container movil-2-3 no-padding main-center">
					 		
 					</div>
 					<div class="ed-container movil-2-3 no-padding main-center">
						@if(count($informes)>0)
							@foreach($informes as $informe)
							<div class="ed-item main-start">
								{{ Form::open(array('url'=>'/pruebas/actualizarInforme','files'=>'true','class'=>'ed-container')) }}
									<p>
										<!--{{ Form::label('id_informe','Código')}}-->
										{{ Form::hidden('id_informe', $informe->id_informe, array('readonly')) }}
										{{ Form::label('codigo_informe','Identificador')}}
										{{ Form::text('codigo_informe', $informe->codigo_informe, array('readonly')) }}
										{{ Form::label('descripcion_informe','Descripción')}}
										{{ Form::text('descripcion_informe', $informe->descripcion_informe) }}
										{{ Form::label('fecha_entrega_informe','FechaEntrega')}}
										{{ Form::text('fecha_entrega_informe', $informe->fecha_entrega_informe) }}
										{{ Form::label('fecha_modificacion_informe','FechaModificacion')}}
										{{ Form::text('fecha_modificacion_informe', $informe->fecha_modificacion_informe) }}
										{{ Form::label('archivo_informe','Archivo')}}
										{{ link_to_asset('img/informe/'.$informe->archivo_informe, $title='Informe archivo'.$informe->id_informe, $attributes = array('download'=>$informe->archivo_informe));}}
										{{ Form::file('archivo_informe') }}<br>
										<!--{{ Form::label('usuario','Usuario')}}-->
										{{ Form::hidden('usuario', $informe->usuario_id_usuario, array('readonly')) }}
										&nbsp; {{ Form::submit('Modificar',array('class'=>'btnIniciar')) }}
									</p>

								{{ Form::close() }}
								{{ Form::open(array('url'=>'/pruebas/eliminarInforme','class'=>'ed-container')) }}
								{{ Form::hidden('id_informe', $informe->id_informe) }}
									&nbsp; {{ Form::submit('Eliminar',array('class'=>'btnIniciar')) }}
								{{ Form::close() }}
							</div>
							@endforeach
						@else
							<div class="ed-item main-start">
								<p>No existen informes para este usuario</p>
							</div>
						@endif		 				
 					</div>
 				</div>
 				
 			</div>
 		</div>
 	</main>
