
@extends('plantilla.adminPlantilla')

@section('titulo')
  Editar
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
 		<div class="ed-item movil-50 tipoUsuario ">Comité Académico</div>
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
 				<li class="ed-item main-start"><a href="{{URL::Route('acadPerfil')}}">{{ HTML::image('img/icono-cimogsys-negro.png', 'alt=icono CIMOGSYS en negro', array( 'class' => 'iconoMenuLateral' )) }}Perfil</a></li>
 				<li class="ed-item main-start"><a class="menu-lateral-activo" href="{{URL::Route('acadEditar')}}">{{ HTML::image('img/icono-cimogsys-negro.png', 'alt=icono CIMOGSYS en negro', array( 'class' => 'iconoMenuLateral' )) }}Editar perfil</a></li>
 			</ul>
 		</div>
 		<div class="ed-item movil-75 no-padding">
 			<div class="ed-container movil main-center menuCabecera">
 				<div class="ed-item base movil-1-6 main-center"><div class="iconoMenuCabecera menu-cabecera-activo"><a href="{{URL::Route('acadPerfil')}}"><i class="fa fa-user fa-3x"></i><small>Perfil</small></a></div></div>
 				<div class="ed-item base movil-1-6 main-center"><div class="iconoMenuCabecera"><a href="{{URL::Route('acadReportes')}}"><i class="fa fa-files-o fa-3x"></i><small>Reportes</small></a></div></div>
 			</div>
 			<div class="ed-container movil ">
 				<div class="ed-item movil">
 					<div class="ed-container padding-3 topPerfil ">
 						<div class="ed-item movil-2-8 cross-center tituloPagina"><h4>Editar Perfil</h4></div>


 					</div>
 					<div class="ed-container base tablet-2-3 base no-padding main-center panel padding-2">
            <div class="ed-item">
              {{ Form::open(array('url'=>'/pruebas/actualizarUsuario','files'=>'true','class'=>'ed-container')) }}
  								{{ Form::hidden('id_usuario', Auth::user()->id_usuario, array('readonly','class'=>'ed-item')) }}
  								{{ Form::label('cedula','Cédula')}}
  								{{ Form::text('cedula', Auth::user()->ci_usuario, array('class'=>'ed-item')) }}
  								{{ Form::label('nick','Nick')}}
  								{{ Form::text('nick_usuario', Auth::user()->nick_usuario, array('class'=>'ed-item')) }}
  								{{ Form::label('nombres','Nombres')}}
  								{{ Form::text('nombres_usuario', Auth::user()->nombres_usuario, array('class'=>'ed-item')) }}
  								{{ Form::label('apellidos','Apellidos')}}
  								{{ Form::text('apellidos_usuario', Auth::user()->apellidos_usuario, array('class'=>'ed-item')) }}
  								{{ Form::label('contrasena','Contraseña')}}
  								{{ Form::text('contrasena', '', array('class'=>'ed-item')) }}
  								{{ Form::label('email', 'Correo', array('class' => 'awesome')); }}
  								{{ Form::text('correo_usuario', Auth::user()->correo_usuario, array('class'=>'ed-item')) }}
  								{{ Form::label('telefono', 'Teléfono', array('class' => 'someoneClass')); }}
  								{{ Form::text('telefono', Auth::user()->telefono_usuario, array('class'=>'ed-item')) }}
  								{{ Form::label('sexo', 'Sexo:', array('class' => 'someoneClass')); }}
  								{{ Form::select('genero_usuario', array('H'=>'Hombre', 'M'=>'Mujer'), Auth::user()->genero_usuario, array('class'=>'ed-item')) }}
  								{{ Form::label('imagenFormal','Imagen Formal',array('class'=>'ed-item'))}}
  								{{ HTML::image('img/usuario/'.Auth::user()->img_formal_usuario, 'alt', array('class'=>'ed-item imagenNoticia')) }}
  								<!--<img src=" {{ asset('img/'.Auth::user()->img_formal_usuario) }}" alt="">-->
  								{{ Form::file('img_formal_usuario') }}
  								{{ Form::label('imagenInformal','Imagen Informal',array('class'=>'ed-item'))}}
  								{{ HTML::image('img/usuario/'.Auth::user()->img_informal_usuario, 'alt', array('class'=>'ed-item imagenNoticia')) }}
  								<!--<img src=" {{ asset('img/'.Auth::user()->img_informal_usuario) }}" alt="">-->
  								{{ Form::file('img_informal_usuario', array('class'=>'ed-item')) }}
  								{{ Form::label('fecha_nacimiento_usuario','Fecha Nacimiento')}}
  								{{ Form::text('fecha_nacimiento', Auth::user()->fecha_nacimiento_usuario, array('class'=>'ed-item')) }}
                  <div class="ed-item no-padding main-end">{{ Form::submit('Modificar', array('class'=>'btnIniciar')) }}</div>
  						{{ Form::close() }}
            </div>
 					</div>
 				</div>

 			</div>
 		</div>
 	</main>
