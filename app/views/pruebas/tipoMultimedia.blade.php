<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ingreso Tipo Multimedia</title>
	{{ HTML::style('css/styles.css') }}
</head>
<body>
	@if (Session::has('mensaje'))		
		<div>
			<span>{{ Session::get('mensaje') }}</span>
		</div>
	@endif
	<div class="ed-container">
		<h1>Tabla Tipo Multimedia</h1>
		<div class="ed-item main-start">
			{{ Form::open(array('url'=>'/pruebas/guardarTipoMultimedia')) }}
				<label for="descripcion_tipo_multimedia">Descripcion</label>
				{{ Form::text('descripcion') }}
				<br>
				{{ Form::submit('Agregar',array('class'=>'submit')) }}
			{{ Form::close() }}
		</div>
	</div>
	<div class="ed-container">
			@if(count($tiposMultimedia)>0)
				@foreach($tiposMultimedia as $TipoMultimedia)   
				<div class="ed-item main-start">
					{{ Form::open(array('url'=>'/pruebas/actualizarTipoMultimedia','class'=>'ed-container')) }}
						<p>
							<span> {{ Form::text('id', $TipoMultimedia->id_tipo_multimedia, array('readonly')) }} </span>
							{{ Form::text('descripcion', $TipoMultimedia->descripcion_tipo_multimedia) }}
						</p>
						&nbsp; {{ Form::submit('Modificar') }}
					{{ Form::close() }}
					{{ Form::open(array('url'=>'/pruebas/eliminarTipoMultimedia','class'=>'ed-container')) }}
						{{ Form::text('id', $TipoMultimedia->id_tipo_multimedia, array('readonly','style'=>'display:none')) }}
						&nbsp; {{ Form::submit('Eliminar') }}
					{{ Form::close() }}
				</div>
				@endforeach
			@else
				<div class="ed-item main-start">
					<p>no hay tipos de multimedia registrados</p>
				</div>
			@endif
	</div>
	<div class="ed-container">
		<div class="ed-item">
			{{ Form::open(array('url'=>'/pruebas/buscarTipoMultimedia')) }}
				{{ Form::text('id') }}
				{{ Form::submit('Buscar') }}
			{{ Form::close() }}
		</div>
	</div>
</body>
</html>