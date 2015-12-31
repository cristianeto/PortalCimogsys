
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
 				<li class="ed-item main-start"><a href="{{URL::Route('admin/misionVision')}}">{{ HTML::image('img/icono-cimogsys-negro.png', 'alt=icono CIMOGSYS en negro', array( 'class' => 'iconoMenuLateral' )) }}Misión - Visión - Quiénes somos</a></li>
 				<li class="ed-item main-start"><a href="{{URL::Route('admObjetivos')}}">{{ HTML::image('img/icono-cimogsys-negro.png', 'alt=icono CIMOGSYS en negro', array( 'class' => 'iconoMenuLateral' )) }}Objetivos</a></li>
 				<li class="ed-item main-start"><a href="{{URL::Route('admBeneficiarios')}}">{{ HTML::image('img/icono-cimogsys-negro.png', 'alt=icono CIMOGSYS en negro', array( 'class' => 'iconoMenuLateral' )) }}Beneficiarios</a></li>
 				<li class="ed-item main-start"><a href="{{URL::Route('admLineas')}}">{{ HTML::image('img/icono-cimogsys-negro.png', 'alt=icono CIMOGSYS en negro', array( 'class' => 'iconoMenuLateral' )) }}Líneas de investigación</a></li>
 			</ul>
 		</div>
 		<div class="ed-item movil-75 no-padding">
 			<div class="ed-container movil main-center menuCabecera">
 				<div class="ed-item main-center movil-1-6"><div class="iconoMenuCabecera menu-cabecera-activo"><a href="{{URL::Route('admCentro')}}"><i class="fa fa-building-o fa-3x"></i><small>El Centro</small></a></div></div>
 				<div class="ed-item main-center movil-1-6"><div class="iconoMenuCabecera"><a href="#"><i class="fa fa-users fa-3x"></i><small>Redes Sociales</small></a></div></div>
 				<div class="ed-item main-center movil-1-6"><div class="iconoMenuCabecera"><a href="{{URL::Route('admAreas')}}"><i class="fa fa-user fa-3x"></i><small>Área Gestión</small></a></div></div>
 				<div class="ed-item main-center movil-1-6"><div class="iconoMenuCabecera"><a href="#"><i class="fa fa-files-o fa-3x"></i><small>Proyectos</small></a></div></div>
 				<div class="ed-item main-center movil-1-6"><div class="iconoMenuCabecera"><a href="#"><i class="fa fa-newspaper-o fa-3x"></i><small>Noticias</small></a></div></div>
 			</div>
 			<div class="ed-container movil ">
 				<div class="ed-item movil">
 					<div class="ed-container padding-3 ">
 						<div class="ed-item movil-50 tituloPagina"><h4>Centro</h4></div>
 						<div class="ed-item movil-50 main-center"></div>
 					</div>
 					<div class="ed-container padding-3">
 						@if($centro!=null)
							<div class="ed-item main-start">
					{{ Form::open(array('url'=>'/pruebas/actualizarCentro','files'=>'true','class'=>'ed-container')) }} 
						<p>
							<span> {{ Form::text('id_centro', $centro->id_centro, array('readonly')) }} </span>
							{{ Form::text('nombre_centro',$centro->nombre_centro) }}
							{{ Form::file('logo_centro') }}
							<img src='{{ asset("img/$centro->logo_centro") }}' alt="">
							{{ Form::text('descripcion_centro',$centro->descripcion_centro) }}
							{{ Form::text('mision_centro',$centro->mision_centro) }}
							{{ Form::text('vision_centro',$centro->vision_centro) }}
							{{ Form::text('telefono_centro',$centro->telefono_centro) }}
							{{ Form::text('direccion_centro',$centro->direccion_centro) }}
							{{ Form::text('codigo_postal_centro',$centro->codigo_postal_centro) }}
							{{ Form::text('objetivo_general_centro',$centro->objetivo_general_centro) }}
							{{ Form::text('quienes_somos_centro',$centro->quienes_somos_centro) }}
							{{ Form::file('img_centro') }}
							<img src='{{ asset("img/$centro->img_centro") }}' alt="">
						</p>
						&nbsp; {{ Form::submit('Modificar') }}
					{{ Form::close() }}
					{{ Form::open(array('url'=>'/pruebas/eliminarCentro','class'=>'ed-container')) }}
						{{ Form::text('id', $centro->id_centro, array('readonly','style'=>'display:none')) }}
						&nbsp; {{ Form::submit('Eliminar') }}
					{{ Form::close() }}
				</div>

 						@else
 						<div class="ed-item main-start">
							<p>No existe el centro de investigación registrado.</p>
						</div>
 						@endif
 					</div>
 				</div>
 				<div class="ed-item movil">
 					
 				</div>
 			</div>
 		</div>
 	</main>
