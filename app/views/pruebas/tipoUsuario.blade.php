<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ingreso Tipo Usuario</title>
	{{ HTML::style('css/styles.css') }}
</head>
<body>
	@if (Session::has('mensaje'))		
		<div>
			<span>{{ Session::get('mensaje') }}</span>
		</div>
	@endif
	<div class="ed-container">
		<h1>Tabla Tipo Usuario</h1>
		<div class="ed-item main-start">
			{{ Form::open(array('url'=>'/pruebas/guardarTipoUsuario')) }}
				<label for="descripcion_tipo_usuario">Descripcion</label>
				{{ Form::text('descripcion') }}
				<br>
				{{ Form::submit('Agregar',array('class'=>'submit')) }}
			{{ Form::close() }}
		</div>
	</div>
	<div class="ed-container">
			@if(count($tiposUsuario)>0)
				@foreach($tiposUsuario as $TipoUsuario)   
				<div class="ed-item main-start">
					{{ Form::open(array('url'=>'/pruebas/actualizarTipoUsuario','class'=>'ed-container')) }}
						<p>
							<span> {{ Form::text('id', $TipoUsuario->id_tipo_usuario, array('readonly')) }} </span>
							{{ Form::text('descripcion', $TipoUsuario->descripcion_tipo_usuario) }}
						</p>
						&nbsp; {{ Form::submit('Modificar') }}
					{{ Form::close() }}
					{{ Form::open(array('url'=>'/pruebas/eliminarTipoUsuario','class'=>'ed-container')) }}
						{{ Form::text('id', $TipoUsuario->id_tipo_usuario, array('readonly','style'=>'display:none')) }}
						&nbsp; {{ Form::submit('Eliminar') }}
					{{ Form::close() }}
				</div>
				@endforeach
			@else
				<div class="ed-item main-start">
					<p>no hay tipos de usuario registrados</p>
				</div>
			@endif
	</div>
	<div class="ed-container">
		<div class="ed-item">
			{{ Form::open(array('url'=>'/pruebas/buscarTipoUsuario')) }}
				{{ Form::text('id') }}
				{{ Form::submit('Buscar') }}
			{{ Form::close() }}
		</div>
	</div>
</body>
</html>