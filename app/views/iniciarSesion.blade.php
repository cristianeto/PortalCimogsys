@extends('plantilla.plantilla')

@section('titulo')
  IniciarSesión
@stop
<body class="iniciarSesion">
<header class="ed-container full">
    <div class="ed-item web-30 tablet-35 movil-30 cross-center"><a href="{{ URL::Route('inicio')}}">{{ HTML::image('img/headerLogo.png', 'alt=logo centro CIMOGSYS', array( 'class' => 'logo' )) }}</a></div>
    <div class="ed-item web-70 tablet-65 movil-70 main-end cross-center">
      <div class="menu">&#9776;</div>
      <ul class="ed-menu web-horizontal tablet-horizontal">
        <li><a>El Centro</a>
          <ul>
            <li><a href="{{ URL::Route('misionVision') }}">Misión y Visión</a></li>
            <li><a href="{{ URL::Route('objetivos') }}">Objetivos</a></li>
            <li><a href="{{ URL::Route('lineasInvestigacion')}}">Líneas Investigación</a></li>
          </ul>
        </li>
        <li><a href="{{ URL::Route('proyectos') }}">Proyectos</a></li>
        <li><a href="{{ URL::Route('quienesSomos') }}">¿Quiénes Somos?</a></li>
        <li><a href="contactos.html">El Equipo</a></li>
      </ul>
    </div>
  </header>
	<main class="ed-container full main-center cross-center">
		<div class="ed-item movil-1-3 cuadro main-center">
			<div class="ed-item movil-50 main-center titulo">
				Iniciar Sesión
			</div>
			<div class="ed-container main-center">
				<div class="ed-item base-1-3 main-center"><img class="foto" src="img/usuario1.jpg" alt="usuario"></div>
				<div class="ed-item main-center form-group">
					{{ Form::open(array('url'=>'/login', 'files'=>'true')) }}
					{{ Form::label('Usuario','Usuario')}}<br>
					<i class="fa fa-user fa-input"></i>{{ Form::text('iUsuario', Input::old('username'),  array('placeholder'=>'Ingrese su nombre de usuario','required')) }}<br>
					{{ Form::label('Contrasena','Contraseña')}}<br>
					<i class="fa fa-lock"></i>{{ Form::password('iPassword', array('placeholder'=>'Password','required')) }}<br>
					{{ Form::checkbox('remember',true,true) }}
					{{ Form::label('remenber','Recordarme')}}<br>
					<a class="olvido" href="#">Olvidaste tu contraseña?</a>
					<br>
				</div>
				@if (Session::has('mensaje'))		
					<div class="ed-item main-end cross-center">
						<i class='fa fa-exclamation-triangle'></i>&nbsp;<span class="error">{{ Session::get('mensaje') }}</span>
						&nbsp;
						{{ Form::submit('Iniciar Sesión',array('class'=>'btnIniciar')) }}
					</div>
				@else
					<div class="ed-item base main-end">
						{{ Form::submit('Iniciar Sesión',array('class'=>'btnIniciar')) }}
					</div>
				@endif
				{{ Form::close() }}
			</div>
		</div>
	</main>
</body>
