
@extends('plantilla.adminPlantilla')

@section('titulo')
  Perfil
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
 		<div class="ed-item movil-50 tipoUsuario ">Comité Académico</div>
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
 				<div class="ed-item base movil-1-6 main-center"><div class="iconoMenuCabecera"><a href="{{URL::Route('acadPerfil')}}"><i class="fa fa-user fa-3x"></i><small>Perfil</small></a></div></div>
 				<div class="ed-item base movil-1-6 main-center"><div class="iconoMenuCabecera menu-cabecera-activo"><a href="#"><i class="fa fa-files-o fa-3x"></i><small>Reportes</small></a></div></div>
 			</div>
 			<div class="ed-container movil ">
 				<div class="ed-item movil">
 					<div class="ed-container padding-3 topPerfil ">
 						<div class="ed-item movil-2-8 cross-center tituloPagina"><h4>Reportes</h4></div>
 					</div>
 					<div class="ed-container base no-padding main-center panel padding-2">
            <div class="ed-item base informacion cross-center">Lista de registros</div>
            <div class="ed-item base detalle main-center cross-center">
            <table id="example" class="ed-item display" cellspacing="0" width="100%">
              <thead>
                  <tr>
                      <th>#</th>
                      <th>Identificador</th>
                      <th>Descripción</th>
                      <th>Responsable</th>
                      <th>Descargar</th>
                  </tr>
              </thead>
              <tfoot>
                  <tr>
                      <th>#</th>
                      <th>Identificador</th>
                      <th>Descripción</th>
                      <th>Responsable</th>
                      <th>Descargar</th>
                  </tr>
              </tfoot>
              <tbody>
                @foreach($informes as $informe)
                <tr>
                    <td></td>
                    <td>{{$informe->id_informe}}</td>
                    <td>{{$informe->descripcion_informe}}</td>
                    @foreach ($usuarios as $usuario)
                      @if($usuario->id_usuario==$informe->usuario_id_usuario)
                        <td>{{$usuario->nombres_usuario}} {{$usuario->apellidos_usuario}}</td>
                      @else

                      @endif
                    @endforeach
                    <td>{{ link_to_asset('img/informe/'.$informe->archivo_informe, $title='Descargar ', $attributes = array('download'=>$informe->archivo_informe));}}<i class="fa fa-cloud-download fa-2x espacio"></i></td>

                </tr>
                @endforeach

                </tbody>
              </table>
            </div>
 					</div>
 				</div>

 			</div>
 		</div>
 	</main>
  <script type="text/javascript">
  $(document).ready(function() {
  var t = $('#example').DataTable( {
    "language": {
        "url": "/cimogsys/public/dataTables/DataTablesSpanish.json"

    },
    "order": [[0, "asc"]],
    "paging": false
  } );

  t.on( 'order.dt search.dt', function () {
      t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
          cell.innerHTML = i+1;
      } );
  } ).draw();
} );
  </script>
</body>
@stop
