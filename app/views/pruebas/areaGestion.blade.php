@if(isset($error))
	{{ $error }}
@else
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Ingreso de Beneficiarios</title>
		{{ HTML::style('css/styles.css') }}
	</head>
	<body>
		@if (Session::has('mensaje'))		
			<div>
				<span>{{ Session::get('mensaje') }}</span>
			</div>
		@endif
		<div class="ed-container">
			<h1>Tabla Área Gestión</h1>
			<div class="ed-item main-start">
				{{ Form::open(array('url'=>'/pruebas/guardarAreaGestion')) }}
					<label for="nombre_area_gestion">Nombre</label>
					{{ Form::text('nombre_area_gestion') }}
					<label for="descripcion_area_gestion">Descripción</label>
					{{ Form::text('descripcion_area_gestion') }}
					<label for="color_area_gestion">Color</label>
					{{ Form::text('color_area_gestion') }}
					<span> {{ Form::text('centro_area_gestion', $centro, array('readonly')) }} </span>
					<br>
					{{ Form::submit('Agregar',array('class'=>'submit')) }}
				{{ Form::close() }}
			</div>
		</div>
		<div class="ed-container">
				@if(count($areas)>0)
					@foreach($areas as $area)   
					<div class="ed-item main-start">
						{{ Form::open(array('url'=>'/pruebas/actualizarAreaGestion','class'=>'ed-container')) }}
							<p>
								{{ Form::text('id_area_gestion', $area->id_area_gestion, array('readonly')) }} 
								{{ Form::text('nombre_area_gestion', $area->nombre_area_gestion) }}
								{{ Form::text('descripcion_area_gestion', $area->descripcion_area_gestion) }}
								{{ Form::text('color_area_gestion', $area->color_area_gestion) }}
								{{ Form::text('centro_area_gestion', $centro, array('readonly')) }} 
							</p>
							&nbsp; {{ Form::submit('Modificar') }}
						{{ Form::close() }}
						{{ Form::open(array('url'=>'/pruebas/eliminarAreaGestion','class'=>'ed-container')) }}
							{{ Form::text('id_area_gestion', $area->id_area_gestion, array('readonly','style'=>'display:none')) }}
							&nbsp; {{ Form::submit('Eliminar') }}
						{{ Form::close() }}
					</div>
					@endforeach
				@else
					<div class="ed-item main-start">
						<p>no hay beneficiarios en el centro de investigación</p>
					</div>
				@endif
		</div>
		<div class="ed-container">
			<div class="ed-item">
				{{ Form::open(array('url'=>'/pruebas/buscarAreaGestion')) }}
					{{ Form::text('id_area_gestion') }}
					{{ Form::submit('Buscar') }}
				{{ Form::close() }}
			</div>
		</div>
	</body>
	</html>
@endif

