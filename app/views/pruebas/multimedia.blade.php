@if(isset($error))
	{{ $error }}
@else
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Multimedia</title>
		{{ HTML::style('css/styles.css') }}
	</head>
	<body>
		@if (Session::has('mensaje'))	
			<div>
				<span>{{ Session::get('mensaje') }}</span>
			</div>
		@endif
		<div class="ed-container">
			<h1>Tabla Multimedia</h1>
			<div class="ed-item main-start">
				{{ Form::open(array('url'=>'/pruebas/guardarMultimedia')) }}
					<label for="descripcion">Descripcion</label>
					{{ Form::text('descripcion_multimedia') }}
					<label for="enlace">Enlace</label>
					{{ Form::text('enlace_multimedia') }}
					<span>	
						{{ Form::text('noticia_multimedia', $noticia->id_noticia, array('readonly')) }} 
					</span>
					<span>
						{{ Form::select('tipo_multimedia', $tipos) }}
					</span> 
					<br>
					{{ Form::submit('Agregar',array('class'=>'submit')) }}
				{{ Form::close() }}
			</div>
		</div>
		<div class="ed-container">
				@if(count($multimedias)>0)
					@foreach($multimedias as $multimedia)   
					<div class="ed-item main-start">
						{{ Form::open(array('url'=>'/pruebas/actualizarMultimedia','class'=>'ed-container')) }}
							<p>
								<label for="codigo">Código</label>
								<span> 
									{{ Form::text('id_multimedia', $multimedia->id_multimedia, array('readonly')) }} 
								</span>
								<label for="noticia">Noticia</label>
								<span> 
									{{ Form::text('noticia_multimedia', $noticia->id_noticia, array('readonly')) }} 
								</span>
								<label for="enlace">Enlace</label>
								<span> 
									 {{ Form::text('enlace_multimedia', $multimedia->enlace_multimedia) }}
								</span>
								<label for="descripcion">Descripción</label>
								{{ Form::text('descripcion_multimedia', $multimedia->descripcion_multimedia) }}
								<label for="tipoMultimedia">TipoMultimedia</label>
								{{ Form::select('tipo_multimedia', $tipos, $multimedia->tipo_multimedia) }}

							</p>
							&nbsp; {{ Form::submit('Modificar') }}
						{{ Form::close() }}
						{{ Form::open(array('url'=>'/pruebas/eliminarMultimedia','class'=>'ed-container')) }}
						{{ Form::text('id_multimedia', $multimedia->id_multimedia) }}
							&nbsp; {{ Form::submit('Eliminar') }}
						{{ Form::close() }}
					</div>
					@endforeach
				@else
					<div class="ed-item main-start">
						<p>no hay multimedia en la noticia seleccionada</p>
					</div>
				@endif
		</div>
		<div class="ed-container">
			<div class="ed-item">
				{{ Form::open(array('url'=>'/pruebas/buscarMultimedia')) }}
					{{ Form::text('id_multimedia') }}
					{{ Form::submit('Buscar') }}
				{{ Form::close() }}
			</div>
		</div>
	</body>
	</html>
@endif