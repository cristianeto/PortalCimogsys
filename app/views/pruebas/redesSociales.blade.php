@if(isset($error))
	{{ $error }}
@else
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Ingreso de Cuentas de Redes Sociales</title>
		{{ HTML::style('css/styles.css') }}
	</head>
	<body>
		@if (Session::has('mensaje'))		
			<div>
				<span>{{ Session::get('mensaje') }}</span>
			</div>
		@endif
		<div class="ed-container">
			<h1>Tabla Redes Sociales</h1>
			<div class="ed-item main-start">
				{{ Form::open(array('url'=>'/pruebas/guardarRedesSociales')) }}
					<label for="nombre_redes_sociales">Nombre Red</label>
					{{ Form::text('nombre_redes_sociales') }}
					<span> 
					<label for="enlace_redes_sociales">Enlace Red</label>
					{{ Form::text('enlace_redes_sociales') }}
					<label for="usuario_redes_sociales">Usuario Red</label>
					{{ Form::text('usuario_redes_sociales') }}
					<span> 
					<span> 
						{{ Form::text('centro_redes_sociales', $centro, array('readonly')) }} 
					</span>
					<br>
					{{ Form::submit('Agregar',array('class'=>'submit')) }}
				{{ Form::close() }}
			</div>
		</div> 
		<div class="ed-container">
				@if(count($redes)>0)
					@foreach($redes as $red)   
					<div class="ed-item main-start">
						{{ Form::open(array('url'=>'/pruebas/actualizarRedesSociales','class'=>'ed-container')) }}
							<p>
								<span> {{ Form::text('id_redes_sociales', $red->id_redes_sociales, array('readonly')) }} </span>
								{{ Form::text('nombre_redes_sociales', $red->nombre_redes_sociales) }}
								{{ Form::text('enlace_redes_sociales', $red->enlace_redes_sociales) }}
								{{ Form::text('usuario_redes_sociales', $red->usuario_redes_sociales) }}
								<span> {{ Form::text('centro_redes_sociales', $red->centro_redes_sociales, array('readonly')) }} </span>
							</p>
							&nbsp; {{ Form::submit('Modificar') }}
						{{ Form::close() }}
						{{ Form::open(array('url'=>'/pruebas/eliminarRedesSociales','class'=>'ed-container')) }}
							{{ Form::text('id_redes_sociales', $red->id_redes_sociales, array('readonly','style'=>'display:none')) }}
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
				{{ Form::open(array('url'=>'/pruebas/buscarRedesSociales')) }}
					{{ Form::text('id_redes_sociales') }}
					{{ Form::submit('Buscar') }}
				{{ Form::close() }}
			</div>
		</div>
	</body>
	</html>
@endif

