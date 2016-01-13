@extends('plantilla.adminPlantilla')
@section('titulo')
  Usuarios
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
 				<li class="ed-item main-start"><a class="menu-lateral-activo" href="{{URL::Route('admUsuarios')}}">{{ HTML::image('img/icono-cimogsys-negro.png', 'alt=icono CIMOGSYS en negro', array( 'class' => 'iconoMenuLateral' )) }}Usuarios</a></li>
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
 						<div class="ed-item movil-2-3 tituloPagina"><h4>Áreas de Gestión: Usuarios</h4></div>
 						<!--<div class="ed-item movil-50 main-center cross-center">
 							{{Form::text('buscar')}}&nbsp{{Form::submit('Buscar', array('class' => 'btnIniciar'))}}
 						</div>-->
 					</div>
 					<div class="ed-container movil-2-3 no-padding main-center">
					 		{{ Form::open(array('url'=>'/pruebas/guardarUsuario', 'files'=>'true')) }}
								<label for="cedula_usuario">Cédula</label>
								{{ Form::text('cedula_usuario','',array('placeholder'=>'Ejem: 1234567890')) }}<br>
								<label for="nick_usuario">Nick</label>
								{{ Form::text('nick_usuario','',array('placeholder'=>'Ejem: miNick')) }}<br>
								<label for="nombres_usuario">Nombres</label>
								{{ Form::text('nombres_usuario','',array('placeholder'=>'Ejem: José Luis')) }}<br>
								<label for="apellidos_usuario">Apellido</label>
								{{ Form::text('apellidos_usuario','',array('placeholder'=>'Ejem: Martínez Ulloa')) }}<br>
								<label for="contrasena">Contraseña</label>
								{{ Form::password('contrasena') }}<br>
								<label for="correo">E-Mail</label>
								{{ Form::text('correo_usuario','',array('placeholder'=>'Ejem: j_martinez@outlook.es')) }}<br>
								<label for="telefono">Teléfono</label>
								{{ Form::text('telefono_usuario','',array('placeholder'=>'Ejem: 2900999')) }}<br>
								<label for="sexo">Sexo</label>
								{{ Form::select('genero_usuario', array('H'=>'Hombre', 'M'=>'Mujer')) }}<br>
								<label for="imagen_formal">Imagen Formal</label>
								{{ Form::file('imagen_formal') }}<br>
								<label for="imagen_informal">Imagen Informal</label>
								{{ Form::file('imagen_informal') }}<br>
								<label for="fecha_nacimiento">Fecha Nacimiento</label>
								{{ Form::text('fecha_nacimiento','',array('placeholder'=>'Ejem: 2000-06-25')) }}<br>
								Area<span>
									{{ Form::select('area_gestion', $areas) }}
								</span> 
								<br>
								Tipo<span>
									{{ Form::select('tipo_usuario', $tipos) }}
								</span> 
								<br>
								<div class="ed-item main-end">{{ Form::submit('Agregar',array('class'=>'submit btnIniciar')) }}</div>
								
							{{ Form::close() }}
 					</div>
 					<hr>
 					
 					<div class="ed-container movil-2-3 no-padding main-center">
		 				@if(count($usuarios)>0)
		 				<?php $cont=1 ?>
							@foreach($usuarios as $usuario)   
							<div class="ed-item main-start">
								{{ Form::open(array('url'=>'/pruebas/actualizarUsuario','files'=>'true','class'=>'ed-container')) }}
										{{$cont++;}}.<br>
										{{ Form::hidden('id_usuario', $usuario->id_usuario, array('readonly')) }} <br>
										{{ Form::label('cedula','Cédula')}}
										{{ Form::text('cedula', $usuario->ci_usuario, array('class'=>'ed-item')) }} <br>
										{{ Form::label('nick','Nick')}}
										{{ Form::text('nick_usuario', $usuario->nick_usuario,array('class'=>'ed-item')) }}<br>
										{{ Form::label('nombres','Nombres')}}
										{{ Form::text('nombres_usuario', $usuario->nombres_usuario,array('class'=>'ed-item')) }}<br>
										{{ Form::label('apellidos','Apellidos')}}
										{{ Form::text('apellidos_usuario', $usuario->apellidos_usuario,array('class'=>'ed-item')) }}<br>
										{{ Form::label('contrasena','Contraseña')}}
										{{ Form::text('contrasena', '',array( 'class'=>'ed-item')) }}<br>
										{{ Form::label('email', 'Correo', array('class' => 'awesome')); }}
										{{ Form::text('correo_usuario', $usuario->correo_usuario,array( 'class'=>'ed-item')) }}<br>
										{{ Form::label('telefono', 'Teléfono', array('class' => 'someoneClass')); }}
										{{ Form::text('telefono', $usuario->telefono_usuario,array('class'=>'ed-item')) }}<br>
										{{ Form::label('sexo', 'Sexo:', array('class' => 'someoneClass')); }}
										{{ Form::select('genero_usuario', array('H'=>'Hombre', 'M'=>'Mujer'), $usuario->genero_usuario,array('class'=>'ed-item')) }}<br>
										{{ Form::label('imagenFormal','Imagen Formal')}}
										{{ HTML::image('img/usuario/'.$usuario->img_formal_usuario, 'alt', array('class' => 'ed-item imagenNoticia')) }}
										<!--<img src=" {{ asset('img/'.$usuario->img_formal_usuario) }}" alt="">-->
										{{ Form::file('img_formal_usuario', array('class'=>'ed-item')) }}<br>
										{{ Form::label('imagenInformal','Imagen Informal')}}
										{{ HTML::image('img/usuario/'.$usuario->img_informal_usuario, 'alt', array('class' => 'ed-item imagenNoticia')) }}
										<!--<img src=" {{ asset('img/'.$usuario->img_informal_usuario) }}" alt="">-->
										{{ Form::file('img_informal_usuario', array('class'=>'ed-item')) }}<br>
										{{ Form::label('fecha_nacimiento_usuario','Fecha Nacimiento')}}
										{{ Form::text('fecha_nacimiento', $usuario->fecha_nacimiento_usuario, array('class'=>'ed-item')) }}<br>
										{{ Form::label('area_usuario','Area de Gestión')}}
										{{ Form::select('area_usuario', $areas, $usuario->area_gestion_usuario, array('class'=>'ed-item'))}}<br>
										{{ Form::label('tipo_usuario','Tipo de Usuario')}}
										{{ Form::select('tipo_usuario', $tipos, $usuario->tipo_usuario, array('class'=>'ed-item'))}}<br>
										&nbsp; {{ Form::submit('Modificar', array('class'=>'btnIniciar')) }}																
								{{ Form::close() }}
								{{ Form::open(array('url'=>'/pruebas/eliminarUsuario','class'=>'ed-container')) }}
								{{ Form::hidden('id_usuario', $usuario->id_usuario) }}
									&nbsp; {{ Form::submit('Eliminar', array('class'=>'btnIniciar')) }}
								{{ Form::close() }}
							</div>
							@endforeach
						@else
							<div class="ed-item main-start">
								<p>No existen usuarios en el centro</p>
							</div>
						@endif				
 					</div>
 				</div>
 				
 			</div>
 		</div>
 	</main>
