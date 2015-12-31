@if(isset($error))
	{{ $error }}
@else
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Ingreso de Objetivos</title>
		{{ HTML::style('css/styles.css') }}
	</head>
	<body>
		@if (Session::has('mensaje'))		
			<div>
				<span>{{ Session::get('mensaje') }}</span>
			</div>
		@endif
		<div class="ed-container">
			<h1>Tabla Objetivos</h1>
			<div class="ed-item main-start">
				{{ Form::open(array('url'=>'/pruebas/guardarObjetivos')) }}
					<label for="Objetivo">Objetivo</label>
					{{ Form::text('descripcion_objetivos') }}
					<span> {{ Form::text('centro_objetivos', $centro, array('readonly')) }} </span>
					<br>
					{{ Form::submit('Agregar',array('class'=>'submit')) }}
				{{ Form::close() }}
			</div>
		</div>
		<div class="ed-container">
				@if(count($objetivos)>0)
					@foreach($objetivos as $objetivo)   
					<div class="ed-item main-start">
						{{ Form::open(array('url'=>'/pruebas/actualizarObjetivos','class'=>'ed-container')) }}
							<p>
								<span> {{ Form::text('id_objetivos', $objetivo->id_objetivos, array('readonly')) }} </span>
								<span> {{ Form::text('centro_objetivos', $centro, array('readonly')) }} </span>
								{{ Form::text('descripcion_objetivos', $objetivo->descripcion_objetivos) }}
							</p>
							&nbsp; {{ Form::submit('Modificar') }}
						{{ Form::close() }}
						{{ Form::open(array('url'=>'/pruebas/eliminarObjetivos','class'=>'ed-container')) }}
							{{ Form::text('id_objetivos', $objetivo->id_objetivos, array('readonly','style'=>'display:none')) }}
							&nbsp; {{ Form::submit('Eliminar') }}
						{{ Form::close() }}
					</div>
					@endforeach
				@else
					<div class="ed-item main-start">
						<p>no hay objetivos en el centro de investigación</p>
					</div>
				@endif
		</div>
		<div class="ed-container">
			<div class="ed-item">
				{{ Form::open(array('url'=>'/pruebas/buscarObjetivos')) }}
					{{ Form::text('id_objetivos') }}
					{{ Form::submit('Buscar') }}
				{{ Form::close() }}
			</div>
		</div>
	</body>
	</html>
@endif

