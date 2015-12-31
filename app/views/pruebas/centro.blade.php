<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ingreso Datos de Centro</title>
	{{ HTML::style('css/styles.css') }}
</head>
<body>
	@if (Session::has('mensaje'))		
		<div>
			<span>{{ Session::get('mensaje') }}</span>
		</div>
	@endif
	<div class="ed-container">
		<h1>Tabla Centro</h1>
		<div class="ed-item main-start">
			{{ Form::open(array('url'=>'/pruebas/guardarCentro','files'=>'true','class'=>'ed-container')) }}
				<div class="ed-item web-50">
				<label for="nombre_centro">Nombre</label>
				{{ Form::text('nombre_centro') }}
				</div>
				<div class="ed-item web-50">
				<label for="logo_centro">Logo Centro</label>
				{{ Form::file('logo_centro') }}
				</div>
				<div class="ed-item web-50">
				<label for="descripcion_centro">Descripción</label>
				{{ Form::text('descripcion_centro') }}
				</div>
				<div class="ed-item web-50">
				<label for="mision_centro">Misión</label>
				{{ Form::text('mision_centro') }}
				</div>
				<div class="ed-item web-50">
				<label for="vision_centro">Visión</label>
				{{ Form::text('vision_centro') }}
				</div>
				<div class="ed-item web-50">
				<label for="telefono_centro">Telefono</label>
				{{ Form::text('telefono_centro') }}
				</div>
				<div class="ed-item web-50">
				<label for="direccion_centro">Direccion</label>
				{{ Form::text('direccion_centro') }}
				</div>
				<div class="ed-item web-50">
				<label for="codigo_postal_centro">Codigo Postal</label>
				{{ Form::text('codigo_postal_centro') }}
				</div>
				<div class="ed-item web-50">
				<label for="objetivo_general_centro">Objetivo General</label>
				{{ Form::text('objetivo_general_centro') }}
				</div>
				<div class="ed-item web-50">
				<label for="quienes_somos_centro">Quienes Somos</label>
				{{ Form::text('quienes_somos_centro') }}
				</div>
				<div class="ed-item web-50">
				<label for="img_centro">Imagen Quienes Somos</label>
				{{ Form::file('img_centro') }}
				</div>
				<br>
				{{ Form::submit('Agregar',array('class'=>'submit')) }}
			{{ Form::close() }}
		</div>
	</div>
	<div class="ed-container">
			@if(count($centros)>0)
				@foreach($centros as $centro)   
				<div class="ed-item main-start">
					{{ Form::open(array('url'=>'/pruebas/actualizarCentro','files'=>'true','class'=>'ed-container')) }} 
						<p>
							<span> {{ Form::text('id_centro', $centro->id_centro, array('readonly')) }} </span>
							{{ Form::text('nombre_centro',$centro->nombre_centro) }}
							{{ Form::file('logo_centro') }}
							<img src='{{ asset("img/$centro->logo_centro") }}' alt="">
							{{ Form::text('descripcion_centro',$centro->descripcion_centro) }}
							{{ Form::text('mision_centro',$centro->mision_centro) }}
							{{ Form::text('vision_centro',$centro->vision_centro) }}
							{{ Form::text('telefono_centro',$centro->telefono_centro) }}
							{{ Form::text('direccion_centro',$centro->direccion_centro) }}
							{{ Form::text('codigo_postal_centro',$centro->codigo_postal_centro) }}
							{{ Form::text('objetivo_general_centro',$centro->objetivo_general_centro) }}
							{{ Form::text('quienes_somos_centro',$centro->quienes_somos_centro) }}
							{{ Form::file('img_centro') }}
							<img src='{{ asset("img/$centro->img_centro") }}' alt="">
						</p>
						&nbsp; {{ Form::submit('Modificar') }}
					{{ Form::close() }}
					{{ Form::open(array('url'=>'/pruebas/eliminarCentro','class'=>'ed-container')) }}
						{{ Form::text('id', $centro->id_centro, array('readonly','style'=>'display:none')) }}
						&nbsp; {{ Form::submit('Eliminar') }}
					{{ Form::close() }}
				</div>
				@endforeach
			@else
				<div class="ed-item main-start">
					<p>no hay centros de investigacion registrados</p>
				</div>
			@endif
	</div>
	<div class="ed-container">
		<div class="ed-item">
			{{ Form::open(array('url'=>'/pruebas/buscarCentro')) }}
				{{ Form::text('id') }}
				{{ Form::submit('Buscar') }}
			{{ Form::close() }}
		</div>
	</div>
</body>
</html>