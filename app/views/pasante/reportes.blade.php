
@extends('plantilla.adminPlantilla')

@section('titulo')
  Reportes
@stop
@section('body')
<body class=" adminMisionVision">
@parent
@if (Session::has('mensaje'))
		<div>
			<span>{{ Session::get('mensaje') }}</span>
		</div>
@endif
	<div class="ed-container full bannerTop cross-center">
		<div class="ed-item web-50 main-start"><a class="" href="{{URL::Route('inicio')}}">{{ HTML::image('img/logo-en-negativo.png', 'alt=logo CIMOGSYS en negativo', array( 'class' => 'logoBlanco' )) }}</a></div>
		<div class="ed-item web-50 main-end cerrarSesion"><a class="cerrar" href="{{ URL::to('/logout') }}">Cerrar Sesión</a></div>
	</div>
 	<header class="ed-container full cross-center">
 		<div class="ed-item movil-50 tipoUsuario">Pasante</div>
 		<div class="ed-item movil-50 cross-center main-end"> {{ Auth::user()->nombres_usuario}} {{Auth::user()->apellidos_usuario }} &nbsp &nbsp

			@if(Auth::user()->img_formal_usuario=="")
 				{{ HTML::image('img/usuario1.jpg', 'alt=logo centro CIMOGSYS', array( 'class' => 'fotoSesion' )) }}
 			@else
 				{{ HTML::image('img/usuario/'.Auth::user()->img_formal_usuario, 'alt=logo centro CIMOGSYS', array( 'class' => 'fotoSesion' )) }}
			@endif
 		</div>
 	</header>
 	<main class="ed-container full">
 		<div class="ed-item movil-25 lateral no-padding">
 			<h4 class="bienvenido">Bienvenido</h4>

 		</div>
 		<div class="ed-item movil-75 no-padding">
 			<div class="ed-container movil main-center menuCabecera">
 				<div class="ed-item base movil-1-6 main-center"><div class="iconoMenuCabecera"><a href="{{URL::Route('pasantePerfil')}}"><i class="fa fa-user fa-3x"></i><small>Perfil</small></a></div></div>
 				<div class="ed-item base movil-1-6 main-center"><div class="iconoMenuCabecera menu-cabecera-activo"><a href="{{URL::Route('pasanteReportes')}}"><i class="fa fa-files-o fa-3x"></i><small>Reportes</small></a></div></div>
 			</div>
 			<div class="ed-container movil">
 				<div class="ed-item movil">
 					<div class="ed-container padding-3 topPerfil ">
 						<div class="ed-item movil-2-8 cross-center tituloPagina"><h4>Reportes</h4></div>
 					</div>
 					<div class="ed-container base no-padding main-center panel padding-2">
            <div class="ed-item tablet-1-3 ingreso main-center">
      				{{ Form::open(array('url'=>'/pruebas/guardarInforme', 'files'=>'true','class'=>'ed-container')) }}
      					{{ Form::label('codigo_informe','Identificador')}}
      					{{ Form::text('codigo_informe','',array('placeholder'=>'Código único','class'=>'ed-item')) }}<br>
      					{{ Form::label('descripcion_informe','Descripción')}}
      					{{ Form::textarea('descripcion_informe','',array('placeholder'=>'Descripción del informe','class'=>'ed-item')) }}<br>
      					{{ Form::label('archivo_informe','Archivo')}}
      					{{ Form::file('archivo_informe','',array('class'=>'ed-item')) }}<br>
      					{{ Form::hidden('usuario_informe', Auth::user()->id_usuario,array('readonly'))}}<br>
                <div class="ed-item main-end">
      					{{ Form::submit('Agregar',array('class'=>'submit btnIniciar')) }}
                </div>
      				{{ Form::close() }}
      			</div>
            <div class="ed-item  main-start">
            @if(count($informes)>0)
            <?php $cont=1; ?>
    					@foreach($informes as $informe)
    					<div class="ed-container base tablet-2-3">
    						{{ Form::open(array('url'=>'/pruebas/actualizarInforme','files'=>'true','class'=>'')) }}
    								{{ Form::hidden('id_informe', $informe->id_informe, array('readonly')) }}
                    <div class="ed-item">
                      <hr>
                    </div>
                    <?php echo $cont++.'.'; ?>
                    <br>
                    {{ Form::label('codigo_informe','Identificador')}}
    								{{ Form::text('codigo_informe', $informe->codigo_informe, array('readonly','placeholder'=>'Código único','class'=>'ed-item')) }}
    								{{ Form::label('descripcion_informe','Descripción')}}
    								{{ Form::text('descripcion_informe', $informe->descripcion_informe, array('class'=>'ed-item')) }}
    								{{ Form::label('fecha_entrega_informe','FechaEntrega')}}
    								{{ Form::text('fecha_entrega_informe', $informe->fecha_entrega_informe, array('class'=>'ed-item')) }}
    								{{ Form::label('fecha_modificacion_informe','FechaModificacion')}}
    								{{ Form::text('fecha_modificacion_informe', $informe->fecha_modificacion_informe, array('class'=>'ed-item')) }}
    								{{ Form::label('archivo_informe','Archivo')}}
    								{{ link_to_asset('img/informe/'.$informe->archivo_informe, $title='Informe archivo'.$informe->id_informe, $attributes = array('download'=>$informe->archivo_informe));}}
    								{{ Form::file('archivo_informe') }}<br>
    								{{ Form::hidden('usuario', $informe->usuario_id_usuario, array('readonly')) }}
    								&nbsp; {{ Form::submit('Modificar',array('class'=>'btnIniciar')) }}


    						{{ Form::close() }}
    						{{ Form::open(array('url'=>'/pruebas/eliminarInforme','class'=>'ed-container base')) }}
    						{{ Form::hidden('id_informe', $informe->id_informe) }}
    							&nbsp; {{ Form::submit('Eliminar',array('class'=>'btnIniciar')) }}
    						{{ Form::close() }}
    					</div>
    					@endforeach
    				@else
    					<div class="ed-item main-start">
    						<p>No existen informes para este usuario</p>
    					</div>
    				@endif
            </div>
            <!--
            <div class="ed-item base informacion cross-center">Lista de registros</div>
            <div class="ed-item base detalle main-center cross-center">
            <table id="example" class="ed-item display" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Identificador</th>
                        <th>Descripción</th>
                        <th>Fecha Entrega</th>
                        <th>Descargar</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Identificador</th>
                        <th>Descripción</th>
                        <th>Fecha entrega</th>
                        <th>Descargar</th>
                    </tr>
                </tfoot>
                <tbody>
                  @foreach($informes as $informe)
                  <tr>
                      <td></td>
                      <td>{{$informe->codigo_informe}}</td>
                      <td>{{$informe->descripcion_informe}}</td>
                      <td>{{$informe->fecha_entrega_informe}}</td>
                      <td>{{ link_to_asset('img/informe/'.$informe->archivo_informe, $title='Descargar ', $attributes = array('download'=>$informe->archivo_informe));}}<i class="fa fa-cloud-download fa-2x espacio"></i></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>-->
 					</div>
 				</div>

 			</div>
 		</div>
 	</main>
</body>
@stop
