@if(isset($error))
	{{ $error }}
@else
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Usuarios</title>
		{{ HTML::style('css/styles.css') }}
	</head>
	<body>
		@if (Session::has('mensaje'))	
			<div>
				<span>{{ Session::get('mensaje') }}</span>
			</div>
		@endif
		<div class="ed-container">
			<h1>Tabla Usuarios</h1>
			<div class="ed-item main-start">
				{{ Form::open(array('url'=>'/pruebas/guardarUsuario', 'files'=>'true')) }}
					<label for="cedula_usuario">Cédula</label>
					{{ Form::text('cedula_usuario') }}<br>
					<label for="nick_usuario">Nick</label>
					{{ Form::text('nick_usuario') }}<br>
					<label for="nombres_usuario">Nombres</label>
					{{ Form::text('nombres_usuario') }}<br>
					<label for="apellidos_usuario">Apellido</label>
					{{ Form::text('apellidos_usuario') }}<br>
					<label for="contrasena">Contraseña</label>
					{{ Form::password('contrasena') }}<br>
					<label for="correo">E-Mail</label>
					{{ Form::text('correo_usuario') }}<br>
					<label for="telefono">Teléfono</label>
					{{ Form::text('telefono_usuario') }}<br>
					<label for="sexo">Sexo</label>
					{{ Form::select('genero_usuario', array('H'=>'Hombre', 'M'=>'Mujer')) }}<br>
					<label for="imagen_formal">Imagen Formal</label>
					{{ Form::file('imagen_formal') }}<br>
					<label for="imagen_informal">Imagen Informal</label>
					{{ Form::file('imagen_informal') }}<br>
					<label for="fecha_nacimiento">Fecha Nacimiento</label>
					{{ Form::text('fecha_nacimiento') }}<br>
					Area<span>
						{{ Form::select('area_gestion', $areas) }}
					</span> 
					<br>
					Tipo<span>
						{{ Form::select('tipo_usuario', $tipos) }}
					</span> 
					<br>
					{{ Form::submit('Agregar',array('class'=>'submit')) }}
				{{ Form::close() }}
			</div>
		</div>
		<div class="ed-container">
				@if(count($usuarios)>0)
					@foreach($usuarios as $usuario)   
					<div class="ed-item main-start">
						{{ Form::open(array('url'=>'/pruebas/actualizarUsuario','files'=>'true','class'=>'ed-container')) }}
							<p>
								{{ Form::label('codigo','Código')}}
								{{ Form::text('id_usuario', $usuario->id_usuario, array('readonly')) }} 
								{{ Form::label('cedula','Cédula')}}
								{{ Form::text('cedula', $usuario->ci_usuario, array('readonly')) }} 
								{{ Form::label('nick','Nick')}}
								{{ Form::text('nick_usuario', $usuario->nick_usuario) }}
								{{ Form::label('nombres','Nombres')}}
								{{ Form::text('nombres_usuario', $usuario->nombres_usuario) }}
								{{ Form::label('apellidos','Apellidos')}}
								{{ Form::text('apellidos_usuario', $usuario->apellidos_usuario) }}
								{{ Form::label('contrasena','Contraseña')}}
								{{ Form::text('contrasena', $usuario->password) }}
								{{ Form::label('email', 'Correo', array('class' => 'awesome')); }}
								{{ Form::text('correo_usuario', $usuario->correo_usuario) }}
								{{ Form::label('telefono', 'Teléfono', array('class' => 'someoneClass')); }}
								{{ Form::text('telefono', $usuario->telefono_usuario) }}
								{{ Form::label('sexo', 'Sexo:', array('class' => 'someoneClass')); }}
								{{ Form::select('genero_usuario', array('H'=>'Hombre', 'M'=>'Mujer'), $usuario->genero_usuario) }}
								{{ Form::label('imagenFormal','Formal')}}
								{{ HTML::image('img/usuario/'.$usuario->img_formal_usuario, 'alt', array( 'width' => 70, 'height' => 70 )) }}
								<!--<img src=" {{ asset('img/'.$usuario->img_formal_usuario) }}" alt="">-->
								{{ Form::file('img_formal_usuario') }}
								{{ Form::label('imagenInformal','Informal')}}
								{{ HTML::image('img/usuario/'.$usuario->img_informal_usuario, 'alt', array( 'width' => 70, 'height' => 70 )) }}
								<!--<img src=" {{ asset('img/'.$usuario->img_informal_usuario) }}" alt="">-->
								{{ Form::file('img_informal_usuario') }}
								{{ Form::label('fecha_nacimiento_usuario','Fecha Nacimiento')}}
								{{ Form::text('fecha_nacimiento', $usuario->fecha_nacimiento_usuario) }}
								{{ Form::select('area_usuario', $areas, $usuario->area_gestion_usuario)}}
								{{ Form::select('tipo_usuario', $tipos, $usuario->tipo_usuario)}}
								&nbsp; {{ Form::submit('Modificar') }}
							</p>
							
						{{ Form::close() }}
						{{ Form::open(array('url'=>'/pruebas/eliminarUsuario','class'=>'ed-container')) }}
						{{ Form::text('id_usuario', $usuario->id_usuario) }}
							&nbsp; {{ Form::submit('Eliminar') }}
						{{ Form::close() }}
					</div>
					@endforeach
				@else
					<div class="ed-item main-start">
						<p>No existen usuarios en el centro</p>
					</div>
				@endif
		</div>
		<div class="ed-container">
			<div class="ed-item">
				{{ Form::open(array('url'=>'/pruebas/buscarUsuario')) }}
					{{ Form::text('id_usuario') }}
					{{ Form::submit('Buscar') }}
				{{ Form::close() }}
			</div>
		</div>
	</body>
	</html>
@endif