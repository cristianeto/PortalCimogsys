@if(isset($error))
	{{ $error }}
@else
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Ingreso de Lineas de Investigacion</title>
		{{ HTML::style('css/styles.css') }}
	</head> 
	<body>
		@if (Session::has('mensaje'))		
			<div>
				<span>{{ Session::get('mensaje') }}</span>
			</div>
		@endif
		<div class="ed-container">
			<h1>Tabla Proyectos</h1>
			<div class="ed-item main-start">
				{{ Form::open(array('url'=>'/pruebas/guardarProyectos','files'=>'true')) }}
					<label for="nombre_proyectos">nombre</label>
					{{ Form::text('nombre_proyectos') }}
					<br>
					<label for="enlace_proyectos">enlace</label>
					{{ Form::text('enlace_proyectos') }}
					<br>
					<label for="descripcion_proyectos">descripcion</label>
					{{ Form::text('descripcion_proyectos') }}
					<br>
					<label for="imagen_banner_proyectos">imagen_banner</label>
					{{ Form::file('imagen_banner_proyectos') }}
					<br>
					<label for="imagen_min_proyectos">imagen_min</label>
					{{ Form::file('imagen_min_proyectos') }}
					<br>
					<label for="area_gestion_proyectos">area_gestion</label>
					{{ Form::select('area_gestion_proyectos',$areas) }}
					<br>
					{{ Form::submit('Agregar',array('class'=>'submit')) }}
				{{ Form::close() }}
			</div>
		</div>
		<div class="ed-container">
				@if(count($proyectos)>0)
					@foreach($proyectos as $proyecto)   
					<div class="ed-item main-start">
						{{ Form::open(array('url'=>'/pruebas/actualizarProyectos','files'=>'true','class'=>'ed-container')) }}
						<label for="id_proyectos">id</label>
						{{ Form::text('id_proyectos',$proyecto->id_proyectos,array('readonly')) }}
						<label for="nombre_proyectos">nombre</label>
						{{ Form::text('nombre_proyectos',$proyecto->nombre_proyectos) }}
						<br>
						<label for="enlace_proyectos">enlace</label>
						{{ Form::text('enlace_proyectos',$proyecto->enlace_proyectos) }}
						<br>
						<label for="descripcion_proyectos">descripcion</label>
						{{ Form::text('descripcion_proyectos',$proyecto->descripcion_proyectos) }}
						<br>
						<label for="imagen_banner_proyectos">imagen_banner</label>
						<img src=" {{ asset('img/'.$proyecto->imagen_banner_proyectos) }}" alt="">
						{{ Form::file('imagen_banner_proyectos') }}
						<br>
						<label for="imagen_min_proyectos">imagen_min</label>
						 <img src=" {{ asset('img/'.$proyecto->imagen_min_proyectos) }}" alt="">
						{{ Form::file('imagen_min_proyectos') }}
						<br>
						<label for="area_gestion_proyectos">area_gestion</label>
						{{ Form::select('area_gestion_proyectos',$areas,$proyecto->area_gestion_proyectos) }}
						<br> {{ Form::submit('Modificar') }}
						{{ Form::close() }}
						{{ Form::open(array('url'=>'/pruebas/eliminarProyectos','class'=>'ed-container')) }}
						{{ Form::text('id_proyectos', $proyecto->id_proyectos,array('style'=>'display:none')) }}
							&nbsp; {{ Form::submit('Eliminar') }}
						{{ Form::close() }}
					</div>
					@endforeach
				@else
					<div class="ed-item main-start">
						<p>no hay lineas de proyectos en el area de gestion</p>
					</div>
				@endif
		</div>
		<div class="ed-container">
			<div class="ed-item">
				{{ Form::open(array('url'=>'/pruebas/buscarProyectos')) }}
					{{ Form::text('id_proyectos') }}
					{{ Form::submit('Buscar') }}
				{{ Form::close() }}
			</div>
		</div>
	</body>
	</html>
@endif