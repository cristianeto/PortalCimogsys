
@extends('plantilla.adminPlantilla')

@section('titulo')
  El Centro
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
 				<div class="ed-item main-center movil-1-6"><div class="iconoMenuCabecera"><a href="{{URL::Route('admRedesSociales')}}"><i class="fa fa-users fa-3x"></i><small>Redes Sociales</small></a></div></div>
 				<div class="ed-item main-center movil-1-6"><div class="iconoMenuCabecera"><a href="{{URL::Route('admAreas')}}"><i class="fa fa-user fa-3x"></i><small>Área Gestión</small></a></div></div>
 				<div class="ed-item main-center movil-1-6"><div class="iconoMenuCabecera"><a href="{{URL::Route('admProyectos')}}"><i class="fa fa-files-o fa-3x"></i><small>Proyectos</small></a></div></div>
 				<div class="ed-item main-center movil-1-6"><div class="iconoMenuCabecera"><a href="{{URL::Route('admNoticias')}}"><i class="fa fa-newspaper-o fa-3x"></i><small>Noticias</small></a></div></div>
 			</div>
 			<div class="ed-container movil ">
 				<div class="ed-item movil">
 					<div class="ed-container padding-3 ">
 						<div class="ed-item movil-50 tituloPagina"><h4>El Centro</h4></div>
 					</div>
 					<div class="ed-container base movil-2-3 padding-3">
 						@if($centro!=null)
							<div class="ed-item main-start">
					{{ Form::open(array('url'=>'/pruebas/actualizarCentro','files'=>'true','class'=>'ed-container')) }} 
						<p>
							<span> {{ Form::hidden('id_centro', $centro->id_centro, array('readonly')) }} </span>
							{{ Form::label('nombre_centro','Nombre Centro', array('class'=>'ed-item base')) }}
							{{ Form::text('nombre_centro',$centro->nombre_centro, array('readonly','class'=>'ed-item base movil-1-3')) }}<br>
							{{ Form::label('Logo','Logo Centro', array('class'=>'ed-item base')) }}
							{{ Form::file('logo_centro',array('class'=>'ed-item base')) }}
							<img class="ed-item"style="width:210px;" src='{{ asset("img/$centro->logo_centro") }}' alt=""><br>
							{{ Form::label('descripcion_centro','Descripción centro', array('class'=>'ed-item base')) }}
							{{ Form::textarea('descripcion_centro',$centro->descripcion_centro, array('class'=>'ed-item base')) }}
							{{ Form::label('mision','Misión', array('class'=>'ed-item base')) }}
							{{ Form::textarea('mision_centro',$centro->mision_centro, array('class'=>'ed-item base')) }}
							{{ Form::label('vision','Visión', array('class'=>'ed-item base')) }}
							{{ Form::textarea('vision_centro',$centro->vision_centro, array('class'=>'ed-item base')) }}
							{{ Form::label('telefono','Teléfono', array('class'=>'ed-item base')) }}
							{{ Form::text('telefono_centro',$centro->telefono_centro, array('class'=>'ed-item base')) }}
							{{ Form::label('direccion','Dirección', array('class'=>'ed-item base')) }}
							{{ Form::textarea('direccion_centro',$centro->direccion_centro, array('class'=>'ed-item base')) }}
							{{ Form::label('CodigoPostal','Código Postal', array('class'=>'ed-item base')) }}
							{{ Form::text('codigo_postal_centro',$centro->codigo_postal_centro, array('class'=>'ed-item base')) }}
							{{ Form::label('ObjetivoGeneral','Objetivo General', array('class'=>'ed-item base')) }}
							{{ Form::textarea('objetivo_general_centro',$centro->objetivo_general_centro, array('class'=>'ed-item base')) }}
							{{ Form::label('QuienesSomos','Quienes Somos', array('class'=>'ed-item base')) }}
							{{ Form::textarea('quienes_somos_centro',$centro->quienes_somos_centro, array('class'=>'ed-item base')) }}
							{{ Form::label('ImagenenQ','Imagen Quiénes Somos', array('class'=>'ed-item base')) }}
							{{ Form::file('img_centro') }}
							<img style="width:90px;" src='{{ asset("img/$centro->img_centro") }}' alt="">
						</p>
						&nbsp; 
							<div class="ed-item no-padding main-end">{{ Form::submit('Modificar', array('class'=>'btnIniciar')) }}</div>
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
