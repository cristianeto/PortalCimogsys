@if(isset($error))
	{{ $error }}
@else
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Noticias</title>
		{{ HTML::style('css/styles.css') }}
	</head>
	<body>
		@if (Session::has('mensaje'))		
			<div>
				<span>{{ Session::get('mensaje') }}</span>
			</div>
		@endif
		<div class="ed-container">
			<h1>Tabla Noticias</h1>
			<div class="ed-item main-start">
				{{ Form::open(array('url'=>'/pruebas/guardarNoticia', 'files'=>'true')) }}
					<span>	
						{{ Form::text('centro_linea_investigacion', $centro, array('readonly')) }} 
					</span>
					<label for="titulo">Título</label>
					{{ Form::text('titulo_noticia') }}
					<label for="contenido">Contenido</label>
					{{ Form::text('contenido_noticia') }}
					<label for="enlace">Enlace</label>
					{{ Form::text('enlace_noticia') }}
					<label for="area">Area</label>
					<span>
						{{ Form::text('area_gestion_notica', $area, array('readonly')) }}
					</span> 
					<label for="imagen_noticia">Imagen</label>
					{{ Form::file('imagen_noticia') }}<br>
					<br>
					{{ Form::submit('Agregar',array('class'=>'submit')) }}
				{{ Form::close() }}
			</div>
		</div>
		<div class="ed-container">
				@if(count($noticias)>0)
					@foreach($noticias as $noticia)   
					<div class="ed-item main-start">
						{{ Form::open(array('url'=>'/pruebas/actualizarNoticia','class'=>'ed-container', 'files'=>'true')) }}
							<p>
								<span> 
									{{ Form::text('id_noticia', $noticia->id_noticia, array('readonly')) }} 
								</span>
								<span> 
								{{ Form::text('centro_linea_investigacion', $centro, array('readonly')) }} 
								</span>
								{{ Form::text('titulo_noticia', $noticia->titulo_noticia) }}
								{{ Form::text('contenido_noticia', $noticia->contenido_noticia) }}
								{{ Form::text('enlace_noticia', $noticia->enlace_noticia) }}

								{{ Form::text('area_gestion_notica', $area, array('readonly')) }}
								{{ Form::label('imagen_noticia','Imagen')}}
								{{ HTML::image('img/noticia/'.$noticia->imagen_noticia, 'alt', array( 'width' => 70, 'height' => 70 )) }}
								{{ Form::file('imagen_noticia') }}
							</p>
							&nbsp; {{ Form::submit('Modificar') }}
						{{ Form::close() }}
						{{ Form::open(array('url'=>'/pruebas/eliminarNoticia','class'=>'ed-container')) }}
						{{ Form::text('id_noticia', $noticia->id_noticia) }}
							&nbsp; {{ Form::submit('Eliminar') }}
						{{ Form::close() }}
					</div>
					@endforeach
				@else
					<div class="ed-item main-start">
						<p>no hay noticias en el centro de investigación</p>
					</div>
				@endif
		</div>
		<div class="ed-container">
			<div class="ed-item">
				{{ Form::open(array('url'=>'/pruebas/buscarNoticia')) }}
					{{ Form::text('id_noticia') }}
					{{ Form::submit('Buscar') }}
				{{ Form::close() }}
			</div>
		</div>
	</body>
	</html>
@endif