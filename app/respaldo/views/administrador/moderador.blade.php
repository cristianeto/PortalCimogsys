@extends('plantilla.plantilla')

@section('titulo')
	Moderadores
@stop
@section('scripts')
	@parent
	{{ HTML::script('js/scripts.js') }}
@stop
@section('body')
@parent
<body class="administradorModerador">
	@section('header')
		<header class="ed-container full">
			<div class="ed-item cross-center main-start movil-50">
				<h1>
					<a href="{{ URL::to('/administrador/index') }}">Red de Conocimiento</a>
				</h1>
			</div>
			<div class="ed-item cross-center main-end movil-50">
				<ul class="ed-menu web-horizontal">
					<li>
						<a href="{{ URL::to('/administrador/perfil') }}">{{ Auth::User()->usuario_nombres }}</a>
					</li>
					<li>
						<a class="cross-center main-center active" href="#">Moderadores</a>
					</li>
					<li>
						<a class="cross-center main-center" href="{{ URL::to('/logout') }}">Salir</a>	
					</li>
				</ul>
			</div>
		</header>
	@stop
	@section('main')
		<main class="ed-container full">
			<div class="ed-item movil-100">
				<h2>Moderadores</h2>
				<a id="agregarModerador"><i class="fa fa-plus"></i>Agregar</a>
				{{ Form::open(array('url'=>'/','class'=>'ed-container full frm','autocomplete'=>'off')) }}
						<div class="ed-item movil-100 main-center">
						@if($errors->has('nombresApellidos'))
							{{ Form::text('nombresApellidos',$value=null,array('placeholder'=>'Nombres y Apellidos','class'=>'error')) }}
						@else
							{{ Form::text('nombresApellidos',$value=null,array('placeholder'=>'Nombres y Apellidos','class'=>'campos')) }}
						@endif
						@if($errors->has('correo'))
							{{ Form::email('correo',$value=null,array('placeholder'=>'correo@espoch.edu.ec','class'=>'error'))}}
						@else
							{{ Form::email('correo',$value=null,array('placeholder'=>'correo@espoch.edu.ec','class'=>'campos'))}}
						@endif
						@if($errors->has('password'))
							{{ Form::text('password',$value=null,array('placeholder'=>'Contraseña','class'=>'error'))}}
						@else
							{{ Form::text('password',$value=null,array('placeholder'=>'Contraseña','class'=>'campos'))}}
						@endif
						</div>
						<div class="ed-item main-center">
						@if($errors->has('genero'))
							{{ Form::radio('genero', 'Masculino',(Input::old('genero') == 'Masculino'), array('class'=>'error')) }}Masculino
							{{ Form::radio('genero', 'Femenino', (Input::old('genero') == 'Femenino'), array()) }}Femenino
						@else
							{{ Form::radio('genero', 'Masculino',(Input::old('genero') == 'Masculino'), array()) }}Masculino
							{{ Form::radio('genero', 'Femenino', (Input::old('genero') == 'Femenino'), array()) }}Femenino
						@endif
						</div>
						<div class="ed-item main-center">
							{{ Form::submit('Guardar',array('class'=>'btnAceptar')) }} &nbsp; {{ Form::submit('Cancelar',array('class'=>'btnCancelar')) }}	
						</div>
				{{ Form::close() }}
			</div>
			<div class="ed-item movil-100">
				<div class="ed-container">
					<div class="ed-item main-center tablet-1-3">
						Nombres y Apellidos
					</div>
					<div class="ed-item main-center tablet-1-3">
						Correo Institucional
					</div>
					<div class="ed-item main-center tablet-1-3">
						Acciones
					</div>
				</div>
			</div>
		</main>
	@stop
	@section('footer')
	@stop
</body>
@stop