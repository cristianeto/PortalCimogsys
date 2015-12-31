@extends('plantilla.plantilla')
@section('titulo')
	Registro
@stop
@section('body')
@parent
<body class="registro">
@section('header')
	<header class="ed-container full">
		<div class="ed-item cross-center">
			<h1>
				<a href="{{ URL::Route('inicio') }}">Red de Conocimiento</a>
			</h1>
		</div>
	</header>
@stop
@section('main')
	<main class="ed-container full">
	@if (Session::has('mensaje'))		
		<div class="ed-item movil-100 main-center">
			<span>{{ Session::get('mensaje') }}</span>
		</div>
	@endif
		{{ Form::open(array('url'=>'/login','class'=>'ed-item movil-100','autocomplete'=>'off')) }}
			<div class="ed-container">
				<div class="ed-item movil-65 main-end"> 
				@if($errors->has('iCorreo'))
					{{ Form::email('iCorreo',$value=null,array('placeholder'=>'correo@espoch.edu.ec','class'=>'error')) }}
				@else
					{{ Form::email('iCorreo',$value=null,array('placeholder'=>'correo@espoch.edu.ec','class'=>'campos')) }}
				@endif
				@if($errors->has('iPassword'))
					{{ Form::password('iPassword',array('placeholder'=>'Contraseña','class'=>'error')) }}
				@else
					{{ Form::password('iPassword',array('placeholder'=>'Contraseña','class'=>'campos')) }}
				@endif
				</div>
				<div class="ed-item movil-35 main-center cross-center">
					{{ Form::submit('Iniciar Sesión',array('class'=>'submit')) }}
				</div>
			</div>
		{{ Form::close() }}
		<div class="ed-container">
			<div class="ed-item main-center">
				<p> Únete a la -Red de Conocimientos- para encontrar (¡y guardar!) toda la documentación científica!!! </p>
			</div>
		</div>
		{{ Form::open(array('url'=>'/usuarios/registrar','class'=>'ed-item movil-100','autocomplete'=>'off')) }}
			<div class="ed-container full">
				<div class="ed-item movil-100 main-center">
				@if($errors->has('nombresApellidos'))
					{{ Form::text('nombresApellidos',$value=null,array('placeholder'=>'Nombres y Apellidos','class'=>'error','id'=>'nombresApellidos')) }}
				@else
					{{ Form::text('nombresApellidos',$value=null,array('placeholder'=>'Nombres y Apellidos','class'=>'campos','id'=>'nombresApellidos')) }}
				@endif
				@if($errors->has('edad'))
					{{ Form::number('edad',$value=null,array('placeholder'=>'Edad','id'=>'edad','class'=>'error'))}}
				@else
					{{ Form::number('edad',$value=null,array('placeholder'=>'Edad','id'=>'edad','class'=>'campos'))}}
				@endif
					
				</div>
				<div class="ed-item main-100 main-center">
				@if($errors->has('correo'))
					{{ Form::email('correo',$value=null,array('placeholder'=>'correo@espoch.edu.ec','class'=>'error','id'=>'correo'))}}
				@else
					{{ Form::email('correo',$value=null,array('placeholder'=>'correo@espoch.edu.ec','class'=>'campos','id'=>'correo'))}}
				@endif
					
				</div>
				<div class="ed-item main-100 main-center">
				@if($errors->has('password'))
					{{ Form::text('password',$value=null,array('placeholder'=>'Contraseña','class'=>'error','id'=>'password'))}}
				@else
					{{ Form::text('password',$value=null,array('placeholder'=>'Contraseña','class'=>'campos','id'=>'password'))}}
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
					{{ Form::submit('Registrarse',array('class'=>'submit')) }}	
				</div>
			</div>
		{{ Form::close() }}
	</main>
@stop
@section('footer')
	@parent
@stop
</body>
@stop