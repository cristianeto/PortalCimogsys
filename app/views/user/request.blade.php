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
				Restablecer Datos
			</div>
			<div class="ed-container main-center">
				@foreach($errors->all() as $message)
				    <div class="ed-item main-center error">
					    <span>
					    	<i class='fa fa-exclamation-triangle'></i>&nbsp;{{ $message }}
					    </span>
				    </div>
			    @endforeach
				<div class="ed-item base-1-3 main-center"><img class="foto" src="img/usuario1.jpg" alt="usuario"></div>
				<div class="ed-item main-center form-group">
					<p>Para restablecer su contraseña complete el formulario</p>
					{{ Form::open(array('route'=>'user/request', 'files'=>'true')) }}
					{{ Form::label('correo','Correo Electrónico')}}<br>
					<i class="fa fa-envelope fa-input"></i>
					{{ Form::email('correo',null,array('placeholder'=>'usuario@cimogsys.com','required')) }}<br>
				</div>
				@if (Session::has('mensaje'))		
					<div class="ed-item main-end cross-center">
						<i class='fa fa-exclamation-triangle'></i>&nbsp;<span class="error">{{ Session::get('mensaje') }}</span>
						&nbsp;
						{{ Form::submit('Iniciar Sesión',array('class'=>'btnIniciar')) }}
					</div>
				@else
					<div class="ed-item base main-end">
						{{ Form::submit('Restablecer',array('class'=>'btnIniciar')) }}
					</div>
				@endif
				{{ Form::close() }}
			</div>
		</div>
	</main>
</body>
