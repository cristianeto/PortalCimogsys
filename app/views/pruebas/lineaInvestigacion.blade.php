@if(isset($error))
	{{ $error }}
@else
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Líneas de Investigación</title>
		{{ HTML::style('css/styles.css') }}
	</head>
	<body>
		@if (Session::has('mensaje'))		
			<div>
				<span>{{ Session::get('mensaje') }}</span>
			</div>
		@endif
		<div class="ed-container">
			<h1>Tabla Líneas de Investigación</h1>
			<div class="ed-item main-start">
				{{ Form::open(array('url'=>'/pruebas/guardarLineaInvestigacion')) }}
					<label for="descripcion">Descripcion</label>
					{{ Form::text('descripcion_linea_investigacion') }}
					<span>	
						{{ Form::text('centro_linea_investigacion', $centro, array('readonly')) }} 
					</span>
					<span>
						{{ Form::select('tipo_linea_investigacion', $tipos) }}
					</span> 
					<br>
					{{ Form::submit('Agregar',array('class'=>'submit')) }}
				{{ Form::close() }}
			</div>
		</div>
		<div class="ed-container">
				@if(count($lineas)>0)
					@foreach($lineas as $linea)   
					<div class="ed-item main-start">
						{{ Form::open(array('url'=>'/pruebas/actualizarLineaInvestigacion','class'=>'ed-container')) }}
							<p>
								<span> 
									{{ Form::text('id_linea_investigacion', $linea->id_linea_investigacion, array('readonly')) }} 
								</span>
								<span> 
									{{ Form::text('centro_linea_investigacion', $centro, array('readonly')) }} 
								</span>
								{{ Form::text('descripcion_linea_investigacion', $linea->descripcion_linea_investigacion) }}
								{{ Form::select('tipo_linea_investigacion', $tipos, $linea->tipo_linea_investigacion) }}
							</p>
							&nbsp; {{ Form::submit('Modificar') }}
						{{ Form::close() }}
						{{ Form::open(array('url'=>'/pruebas/eliminarLineaInvestigacion','class'=>'ed-container')) }}
						{{ Form::text('id_linea_investigacion', $linea->id_linea_investigacion) }}
							&nbsp; {{ Form::submit('Eliminar') }}
						{{ Form::close() }}
					</div>
					@endforeach
				@else
					<div class="ed-item main-start">
						<p>no hay lineas de investigacion en el centro de investigación</p>
					</div>
				@endif
		</div>
		<div class="ed-container">
			<div class="ed-item">
				{{ Form::open(array('url'=>'/pruebas/buscarLineaInvestigacion')) }}
					{{ Form::text('id_linea_investigacion') }}
					{{ Form::submit('Buscar') }}
				{{ Form::close() }}
			</div>
		</div>
	</body>
	</html>
@endif