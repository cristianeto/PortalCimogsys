
@extends('plantilla.adminPlantilla')

@section('titulo')
  Líneas
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
 				<li class="ed-item main-start"><a href="{{URL::Route('admin/misionVision')}}">{{ HTML::image('img/icono-cimogsys-negro.png', 'alt=icono CIMOGSYS en negro', array( 'class' => 'iconoMenuLateral' )) }}Misión - Visión - Quiénes somos</a></li>
 				<li class="ed-item main-start"><a href="{{URL::Route('admObjetivos')}}">{{ HTML::image('img/icono-cimogsys-negro.png', 'alt=icono CIMOGSYS en negro', array( 'class' => 'iconoMenuLateral' )) }}Objetivos</a></li>
 				<li class="ed-item main-start"><a href="{{URL::Route('admBeneficiarios')}}">{{ HTML::image('img/icono-cimogsys-negro.png', 'alt=icono CIMOGSYS en negro', array( 'class' => 'iconoMenuLateral' )) }}Beneficiarios</a></li>
 				<li class="ed-item main-start"><a class="menu-lateral-activo" href="{{URL::Route('admLineas')}}">{{ HTML::image('img/icono-cimogsys-negro.png', 'alt=icono CIMOGSYS en negro', array( 'class' => 'iconoMenuLateral' )) }}Líneas de investigación</a></li>
 			</ul>
 		</div>
 		<div class="ed-item movil-75 no-padding">
 			<div class="ed-container movil main-center menuCabecera">
 				<div class="ed-item main-center movil-1-6"><div class="iconoMenuCabecera menu-cabecera-activo"><a href="{{URL::Route('admCentro')}}"><i class="fa fa-building-o fa-3x"></i><small>El Centro</small></a></div></div>
 				<div class="ed-item main-center movil-1-6"><div class="iconoMenuCabecera"><a href="{{URL::Route('admRedesSociales')}}"><i class="fa fa-users fa-3x"></i><small>Redes Sociales</small></a></div></div>
 				<div class="ed-item main-center movil-1-6"><div class="iconoMenuCabecera"><a href="{{URL::Route('admAreas')}}"><i class="fa fa-user fa-3x"></i><small>Área Gestión</small></a></div></div>
 				<div class="ed-item main-center movil-1-6"><div class="iconoMenuCabecera"><a href="{{URL::Route('admProyectos')}}"><i class="fa fa-files-o fa-3x"></i><small>Proyectos</small></a></div></div>
 				<div class="ed-item main-center movil-1-6"><div class="iconoMenuCabecera"><a href="{{URL::Route('admNoticias')}}"><i class="fa fa-newspaper-o fa-3x"></i><small>Noticias</small></a></div></div>
 			</div>
 			<div class="ed-container movil ">
 				<div class="ed-item movil">
 					<div class="ed-container padding-3 ">
 						<div class="ed-item movil-2-3 tituloPagina"><h4>Líneas de investigación</h4></div>
 						<!--<div class="ed-item movil-50 main-center cross-center">
 							{{Form::text('buscar')}}&nbsp{{Form::submit('Buscar', array('class' => 'btnIniciar'))}}
 						</div>-->
 					</div>
 					<div class="ed-container movil-2-3 no-padding main-center">
						
 					@if($centro!=null)
					@if($centro!=null)
						<div class="ed-item">
							{{ Form::open(array('url'=>'/pruebas/guardarLineaInvestigacion', 'class'=>'ed-container')) }}
								<label for="descripcion">Descripción</label>
								{{ Form::text('descripcion_linea_investigacion','',array('class'=>'ed-item base')) }}
								{{ Form::hidden('centro_linea_investigacion', $centro->id_centro, array('readonly')) }} 
								{{Form::label('tipo','Tipo',array('class'=>'ed-item base'))}}
								{{ Form::select('tipo_linea_investigacion', $tipos, array('class'=>'ed-item base')) }}
								{{ Form::submit('Agregar',array('class'=>'submit btnIniciar')) }}
							{{ Form::close() }}
						</div> 						
					@else
						<div class="ed-container main-start">
							<p>No existe el centro de investigación registrado.</p>
						</div>
 						@endif
					<hr>
 						@if(count($lineas)>0)
					@foreach($lineas as $linea)   
					<div class="ed-item main-start">
						{{ Form::open(array('url'=>'/pruebas/actualizarLineaInvestigacion','class'=>'ed-container')) }}
							<p>
								<span> 
									{{ Form::hidden('id_linea_investigacion', $linea->id_linea_investigacion, array('readonly')) }} 
								</span>
								<span> 
									{{ Form::hidden('centro_linea_investigacion', $centro->id_centro, array('readonly')) }} 
								</span>
								<label for="descripcion_linea_investigacion" class="ed-item base">Descripción</label>
								{{ Form::textarea('descripcion_linea_investigacion', $linea->descripcion_linea_investigacion,array('class'=>'ed-item')) }}
								<label for="tipo_linea_investigacion" class="ed-item base">Tipo de Línea</label>
								{{ Form::select('tipo_linea_investigacion', $tipos, $linea->tipo_linea_investigacion) }}
							</p>
							&nbsp; {{ Form::submit('Modificar',array('class'=>'btnIniciar')) }}
						{{ Form::close() }}
						{{ Form::open(array('url'=>'/pruebas/eliminarLineaInvestigacion','class'=>'ed-container')) }}
						{{ Form::hidden('id_linea_investigacion', $linea->id_linea_investigacion) }}
							&nbsp; {{ Form::submit('Eliminar',array('class'=>'btnIniciar')) }}
						{{ Form::close() }}
					</div>
					@endforeach
				@else
					<div class="ed-item main-start">
						<p>no hay lineas de investigacion en el centro de investigación</p>
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
