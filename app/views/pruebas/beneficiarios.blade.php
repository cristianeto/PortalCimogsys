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
			<h1>Tabla Beneficiarios</h1>
			<div class="ed-item main-start">
				{{ Form::open(array('url'=>'/pruebas/guardarBeneficiarios')) }}
					<label for="nombre_beneficiario">Nombre</label>
					{{ Form::text('nombre_beneficiarios') }}
					<label for="descripcion_beneficiarios">Descripción</label>
					{{ Form::text('descripcion_beneficiarios') }}
					<span> {{ Form::text('centro_beneficiarios', $centro, array('readonly')) }} </span>
					<br>
					{{ Form::submit('Agregar',array('class'=>'submit')) }}
				{{ Form::close() }}
			</div>
		</div>
		<div class="ed-container">
				@if(count($beneficiarios)>0)
					@foreach($beneficiarios as $beneficiario)   
					<div class="ed-item main-start">
						{{ Form::open(array('url'=>'/pruebas/actualizarBeneficiarios','class'=>'ed-container')) }}
							<p>
								{{ Form::text('id_beneficiarios', $beneficiario->id_beneficiarios, array('readonly')) }} 
								{{ Form::text('nombre_beneficiarios', $beneficiario->nombre_beneficiarios) }}
								{{ Form::text('descripcion_beneficiarios', $beneficiario->descripcion_beneficiarios) }}
								{{ Form::text('centro_beneficiarios', $centro, array('readonly')) }} 
							</p>
							&nbsp; {{ Form::submit('Modificar') }}
						{{ Form::close() }}
						{{ Form::open(array('url'=>'/pruebas/eliminarBeneficiarios','class'=>'ed-container')) }}
							{{ Form::text('id_beneficiarios', $beneficiario->id_beneficiarios, array('readonly','style'=>'display:none')) }}
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
				{{ Form::open(array('url'=>'/pruebas/buscarBeneficiarios')) }}
					{{ Form::text('id_beneficiarios') }}
					{{ Form::submit('Buscar') }}
				{{ Form::close() }}
			</div>
		</div>
	</body>
	</html>
@endif

