
@extends('plantilla.adminPlantilla')

@section('titulo')
  Beneficiarios
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
 				<li class="ed-item main-start"><a class="menu-lateral-activo" href="{{URL::Route('admBeneficiarios')}}">{{ HTML::image('img/icono-cimogsys-negro.png', 'alt=icono CIMOGSYS en negro', array( 'class' => 'iconoMenuLateral' )) }}Beneficiarios</a></li>
 				<li class="ed-item main-start"><a href="{{URL::Route('admLineas')}}">{{ HTML::image('img/icono-cimogsys-negro.png', 'alt=icono CIMOGSYS en negro', array( 'class' => 'iconoMenuLateral' )) }}Líneas de investigación</a></li>
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
 			<div class="ed-container main-center movil ">
 				<div class="ed-item base movil padding-3 tituloPagina">
 					<h4>Beneficiarios</h4>
 				</div>
				<div class="ed-item base movil-2-3  padding-3 ">
					@if($centro!=null)
							{{ Form::open(array('url'=>'/pruebas/guardarBeneficiarios')) }}
					{{ Form::label('nombre_beneficiarios','Nombre', array('class'=>'ed-item base')) }}
					{{ Form::text('nombre_beneficiarios','', array('placeholder'=>'Ejemplo: FIE','class'=>'ed-item base')) }}<br>
					{{ Form::label('descripcion_beneficiarios','Descripción', array('class'=>'ed-item base')) }}
					{{ Form::textarea('descripcion_beneficiarios','' ,array('class'=>'ed-item base')) }}
					<span> {{ Form::hidden('centro_beneficiarios', $centro->id_centro, array('readonly')) }} </span>
					<br>
					{{ Form::submit('Guardar',array('class'=>'main-end submit btnIniciar')) }}
				{{ Form::close() }}
					@else
						<div class="ed-container main-start">
							<p>No existe el centro de investigación registrado.</p>
						</div>
 						@endif
 					</div>
 				
 			</div>
 			<hr class="margin-3">
 			<div class="ed-container main-center movil ">
 				<div class="ed-item  main-center base movil padding-3 tituloPagina">
 					<h4>registros</h4>
 				</div>
				<div class="ed-item base movil-2-3  padding-3 ">
					@if($centro!=null)
						@if(count($beneficiarios)>0)
						
					@foreach($beneficiarios as $beneficiario)   
					<div class="ed-item main-start">
						{{ Form::open(array('url'=>'/pruebas/actualizarBeneficiarios','class'=>'ed-container')) }}
							<p>
								{{ Form::hidden('id_beneficiarios', $beneficiario->id_beneficiarios, array('readonly','class'=>'')) }} 
								{{ Form::label('nombre_beneficiarios','Nombre', array('class'=>'ed-item base')) }}	
								{{ Form::text('nombre_beneficiarios', $beneficiario->nombre_beneficiarios, array('class'=>'ed-item-base')) }}
								{{ Form::label('descripcion_beneficiarios','Descripción', array('class'=>'ed-item base')) }}	
								{{ Form::textarea('descripcion_beneficiarios', $beneficiario->descripcion_beneficiarios, array('class'=>'ed-item base')) }}
								{{ Form::hidden('centro_beneficiarios', $centro->id_centro, array('readonly')) }} 
							</p>
							&nbsp; {{ Form::submit('Modificar', array('class'=>'btnIniciar')) }}
						{{ Form::close() }}
						{{ Form::open(array('url'=>'/pruebas/eliminarBeneficiarios','class'=>'ed-container')) }}
							{{ Form::text('id_beneficiarios', $beneficiario->id_beneficiarios, array('readonly','style'=>'display:none')) }}
							&nbsp; {{ Form::submit('Eliminar', array('class'=>'btnIniciar')) }}
						{{ Form::close() }}
						<hr>
					</div>
					@endforeach
				@else
					<div class="ed-item main-start">
						<p>no hay beneficiarios en el centro de investigación</p>
					</div>
				@endif
					@else
						<div class="ed-container main-start">
							<p>No existe el centro de investigación registrado.</p>
						</div>
 						@endif
 					</div>
 				
 			</div>
 		</div>
 	</main>
