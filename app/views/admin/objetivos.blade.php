
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
 				<li class="ed-item main-start"><a class="menu-lateral-activo" href="{{URL::Route('admObjetivos')}}">{{ HTML::image('img/icono-cimogsys-negro.png', 'alt=icono CIMOGSYS en negro', array( 'class' => 'iconoMenuLateral' )) }}Objetivos</a></li>
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
 						<div class="ed-item movil-1-3 tituloPagina"><h4>Objetivos</h4></div>
 					</div>
 					<div class="ed-container movil-2-3 no-padding main-center">
						
 						@if($centro!=null)
							<!--Objetivo General-->
							{{ Form::label('general','Objetivo General', array('class' => 'ed-item movil main-start no-padding labelCampo'))}}
							{{ Form::open(array('url'=>'/admin/actualizarObjetivoGeneral','files'=>'true','class'=>'ed-container')) }} 
								<div class="ed-item no-padding movil main-end">
									{{ Form::hidden('id_centro', $centro->id_centro, array('readonly')) }}
									{{ Form::textarea('objetivo_general_centro',$centro->objetivo_general_centro, ['size' => '90x2'],['class' => 'ed-item']) }}
								</div>
								<div class="ed-item no-padding movil main-end">
									{{ Form::submit('Actualizar', array('class'=>'btnIniciar')) }}	
								</div>
							{{ Form::close() }}
							<!--Objetivos Específicos-->
							{{ Form::label('especifico','Objetivos Específicos', array('class' => 'ed-item movil main-start no-padding labelCampo'))}}
							{{ Form::open(array('url'=>'/admin/guardarObjetivoEspecifico','files'=>'true','class'=>'ed-container')) }} 
								<div class="ed-item no-padding movil main-end">
								{{ Form::hidden('id_centro', $centro->id_centro, array('readonly')) }}
								{{ Form::textarea('descripcion_objetivos',	'Ingrese un objetivo específico', ['size' => '90x2'],['class' => 'ed-item']) }}
								</div>
								<div class="ed-item no-padding movil main-end">
									<div class="ed-container">
										<!--<div class="ed-item movil-50 main-center">
											<a href="{{ URL::Route('admEliminarObjetivoE')}}" class="main-start btnCRUD"><i class="fa fa-trash-o"></i></a>
										</div>-->
										<div class="ed-item movil main-end no-padding">
											{{ Form::submit('Guardar', array('class'=>'btnIniciar')) }}	
										</div>
									</div>
								</div>
							{{ Form::close() }}
							<small>Lista de registros</small>
 							@if(count($objetivos)>0)
 								@foreach($objetivos as $objetivo)
 								{{ Form::open(array('url'=>'/admin/actualizarObjetivos','class'=>'ed-container')) }}
									{{ Form::textarea('descripcion_objetivos',	$objetivo->descripcion_objetivos, ['size' => '90x2'],['class' => 'ed-item']) }}<br>
									<div class="ed-item movil main-end no-padding">
											{{ Form::submit('Actualizar', array('class'=>'btnIniciar')) }}	
									</div>
								{{ Form::close() }}		
 								@endforeach
							@else
								<div class="ed-item main-start">
									<p>No existen objetivos específicos en el centro.</p>
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
