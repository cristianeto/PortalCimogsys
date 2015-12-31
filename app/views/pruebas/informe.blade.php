sub@if(isset($error))
	{{ $error }}
@else
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Informes</title>
		{{ HTML::style('css/styles.css') }}
	</head>
	<body>
		@if (Session::has('mensaje'))
			<div>
				<span>{{ Session::get('mensaje') }}</span>
			</div>
		@endif
		<div class="ed-container">
			<h1>Tabla Informes</h1>
			<div class="ed-item main-start">
				{{ Form::open(array('url'=>'/pruebas/guardarInforme', 'files'=>'true')) }}
					{{ Form::label('codigo_informe','Identificador')}}
					{{ Form::text('codigo_informe') }}<br>
					{{ Form::label('descripcion_informe','Descripción')}}
					{{ Form::text('descripcion_informe') }}<br>
					{{ Form::label('archivo_informe','Archivo')}}
					{{ Form::file('archivo_informe') }}<br>
					{{ Form::label('usuario_informe','Usuario')}}
					{{ Form::text('usuario_informe', $usuario,array('readonly'))}}<br>
					{{ Form::submit('Agregar',array('class'=>'submit')) }}
				{{ Form::close() }}
			</div>
		</div>
		<div class="ed-container">
				@if(count($informes)>0)
					@foreach($informes as $informe)
					<div class="ed-item main-start">
						{{ Form::open(array('url'=>'/pruebas/actualizarInforme','files'=>'true','class'=>'ed-container')) }}
							<p>
								{{ Form::label('id_informe','Código')}}
								{{ Form::text('id_informe', $informe->id_informe, array('readonly')) }}
								{{ Form::label('codigo_informe','Identificador')}}
								{{ Form::text('codigo_informe', $informe->codigo_informe, array('readonly')) }}
								{{ Form::label('descripcion_informe','Descripción')}}
								{{ Form::text('descripcion_informe', $informe->descripcion_informe) }}
								{{ Form::label('fecha_entrega_informe','FechaEntrega')}}
								{{ Form::text('fecha_entrega_informe', $informe->fecha_entrega_informe) }}
								{{ Form::label('fecha_modificacion_informe','FechaModificacion')}}
								{{ Form::text('fecha_modificacion_informe', $informe->fecha_modificacion_informe) }}
								{{ Form::label('archivo_informe','Archivo')}}
								{{ link_to_asset('img/informe/'.$informe->archivo_informe, $title='Informe archivo'.$informe->id_informe, $attributes = array('download'=>$informe->archivo_informe));}}
								{{ Form::file('archivo_informe') }}<br>
								{{ Form::label('usuario','Usuario')}}
								{{ Form::text('usuario', $informe->usuario_id_usuario, array('readonly')) }}
								&nbsp; {{ Form::submit('Modificar') }}
							</p>

						{{ Form::close() }}
						{{ Form::open(array('url'=>'/pruebas/eliminarInforme','class'=>'ed-container')) }}
						{{ Form::text('id_informe', $informe->id_informe) }}
							&nbsp; {{ Form::submit('Eliminar') }}
						{{ Form::close() }}
					</div>
					@endforeach
				@else
					<div class="ed-item main-start">
						<p>No existen informes para este usuario</p>
					</div>
				@endif
		</div>
		<div class="ed-container">
			<div class="ed-item">
				{{ Form::open(array('url'=>'/pruebas/buscarInforme')) }}
					{{ Form::text('id_informe') }}
					{{ Form::submit('Buscar') }}
				{{ Form::close() }}
			</div>
		</div>
	</body>
	</html>
@endif
