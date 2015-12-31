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
		<h1>Tabla Tipo Línea Investigación</h1>
		<div class="ed-item main-start">
			{{ Form::open(array('url'=>'/pruebas/guardarTipoLineaInvestigacion')) }}
				<label for="descripcion_tipo_linea_investigacion">Descripcion</label>
				{{ Form::text('descripcion') }}
				<br>
				{{ Form::submit('Agregar',array('class'=>'submit')) }}
			{{ Form::close() }}
		</div>
	</div>
	<div class="ed-container">
			@if(count($tiposLineaInvestigacion)>0)
				@foreach($tiposLineaInvestigacion as $TipoLineaInvestigacion)   
				<div class="ed-item main-start">
					{{ Form::open(array('url'=>'/pruebas/actualizarTipoLineaInvestigacion','class'=>'ed-container')) }}
						<p>
							<span> {{ Form::text('id', $TipoLineaInvestigacion->id_tipo_linea_investigacion, array('readonly')) }} </span>
							{{ Form::text('descripcion', $TipoLineaInvestigacion->descripcion_tipo_linea_investigacion) }}
						</p>
						&nbsp; {{ Form::submit('Modificar') }}
					{{ Form::close() }}
					{{ Form::open(array('url'=>'/pruebas/eliminarTipoLineaInvestigacion','class'=>'ed-container')) }}
						{{ Form::text('id', $TipoLineaInvestigacion->id_tipo_linea_investigacion, array('readonly','style'=>'display:none')) }}
						&nbsp; {{ Form::submit('Eliminar') }}
					{{ Form::close() }}
				</div>
				@endforeach
			@else
				<div class="ed-item main-start">
					<p>no hay tipos de linea de investigacion registrados</p>
				</div>
			@endif
	</div>
	<div class="ed-container">
		<div class="ed-item">
			{{ Form::open(array('url'=>'/pruebas/buscarTipoLineaInvestigacion')) }}
				{{ Form::text('id') }}
				{{ Form::submit('Buscar') }}
			{{ Form::close() }}
		</div>
	</div>
</body>
</html>