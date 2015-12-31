@extends('plantilla.plantilla')

@section('titulo')
	Perfil
@stop

@section('body')
@parent
<body class="administradorPerfil">
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
						<a class="cross-center main-center" href="{{ URL::to('/administrador/moderador') }}">Moderadores</a>
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
			{{ Form::open(array('url'=>'/guardarPerfil','class'=>'ed-item movil-100','autocomplete'=>'off')) }}
				<div class="ed-container full main-center">
					<h2 class="tablet-100 main-center">Editar Perfil</h2>
					<div class="ed-item tablet-50 movil-100 main-end cross-center">
						<label for="nombresApellidos">Nombres y Apellidos: </label>
					</div>
					<div class="ed-item tablet-50 movil-100 main-start cross-center">
						{{ Form::text('nombresApellidos',$value=Auth::User()->usuario_nombres,array('placeholder'=>'Nombres y Apellidos','class'=>'campos')) }}
					</div>
					<div class="ed-item tablet-50 movil-100 main-end cross-center">
						<label for="edadd">Edad: </label>
					</div>
					<div class="ed-item tablet-50 movil-100 main-start cross-center">
						{{ Form::number('edad',$value=Auth::User()->usuario_edad,array('placeholder'=>'Edad','id'=>'edad','class'=>'campos'))}}
					</div>
					<div class="ed-item tablet-50 movil-100 main-end cross-center">
						<label for="telefono">Telefono: </label>
					</div>
					<div class="ed-item tablet-50 movil-100 main-start cross-center">
						{{ Form::text('telefono',$value=Auth::User()->usuario_telefono,array('placeholder'=>'0123456789','class'=>'campos'))}}					
					</div>
					<div class="ed-item tablet-50 movil-100 main-end cross-center">
						<label for="correo">Correo Institucional: </label>
					</div>
					<div class="ed-item tablet-50 movil-100 main-start cross-center">
						{{ Form::email('correo',$value=Auth::User()->usuario_correo,array('placeholder'=>'correo@espoch.edu.ec','class'=>'campos'))}}					
					</div>
					<div class="ed-item tablet-50 movil-100 main-end cross-center">
						<label for="genero">Genero: 	</label>
					</div>
					<div class="ed-item tablet-50 movil-100 main-start cross-center">
						@if (Auth::User()->usuario_genero='Masculino')
							{{ Form::radio('genero', 'Masculino',(Input::old('genero') == 'Masculino'), array('Checked'=>'true')) }}Masculino
							{{ Form::radio('genero', 'Femenino', (Input::old('genero') == 'Femenino'), array()) }}Femenino
						@else
							{{ Form::radio('genero', 'Masculino',(Input::old('genero') == 'Masculino'), array()) }}Masculino
							{{ Form::radio('genero', 'Femenino', (Input::old('genero') == 'Femenino'), array('Checked'=>'true')) }}Femenino
						@endif
					</div>
					<div class="ed-item main-center">
						{{ Form::submit('Guardar Perfil',array('class'=>'submit')) }}	
					</div>
					@if($errors->has())
						<div class="ed-item movil-100 main-center">
							<span>Existe un error en el formulario</span>
						</div>
					@endif
					@if (Session::has('mensaje'))	
						<div class="ed-item movil-100 main-center">
							<span>{{ Session::get('mensaje') }}</span>
						</div>
					@endif
				</div>
			{{ Form::close() }}
		</main>
	@stop
	@section('footer')
		@parent
	@stop
</body>
@stop