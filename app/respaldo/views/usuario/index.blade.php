@extends('plantilla.plantilla')

@section('titulo')
	Usuario
@stop
@section('estilos')
	@parent
@stop
@section('scripts')
	@parent
@stop
@section('body')
@parent
<body class="usuarioIndex">
	
	@section('header')
		<header class="ed-container full">
			<div class="ed-item cross-center main-start movil-50">
				<h1>
					<a>Red de Conocimiento</a>
				</h1>
			</div>
			<div class="ed-item cross-center main-end movil-50">
				<ul class="ed-menu tablet-horizontal">
					<li>
						<a class="enlace cross-center main-center active">{{ Auth::User()->nombres_usuario}}</a>	
					</li>
					<li>
						<a class="enlace cross-center main-center" href="{{ URL::to('usuarios/perfil') }}">Perfil</a>	
					</li>
					<li>
						<a class="enlace cross-center main-center" href="{{ URL::to('/logout') }}">Salir</a>
					</li>
				</ul>
			</div>
		</header>
	@stop
	@section('main')
		<main class="ed-container full">
			<div class="ed-item tablet-80 cuerpo padding-2">
				<div class="ed-container tarjeta">
					<div class="ed-item main-center tablet-1-6">
						@if(Auth::User()->genero_usuario=="Masculino")
							<img src="{{ asset('img/iconoModeradorHombre.png') }}" alt="Contacto">
						@else
							<img src="{{ asset('img/iconoModeradorMujer.png') }}" alt="Contacto">
						@endif
					</div>
					<div class="ed-item tablet-5-6 cross-center">
						<div class="ed-container">
							<div class="ed-item tablet-50 cross-center">
								<h2> Docente </h2>
								<p class="nombre">{{ Auth::User()->nombres_usuario }}</p>
							</div>
							<div class="ed-item tablet-50 cross-center">
								<p>Ing. Comercio Exterior</p>
								<p><i class="fa fa-phone"></i>{{ Auth::User()->telefono_usuario }}</p>
								<p><i class="fa fa-envelope-o"></i>{{ Auth::User()->correo_usuario }}</p>
							</div>
							<div class="ed-item tablet-1-3 main-center cross-center info">
								Mensajes <span>0</span>
							</div>
							<div class="ed-item tablet-1-3 main-center cross-center info">
								Respuestas <span>0</span>
							</div>
							<div class="ed-item tablet-1-3 main-center cross-center info">
								Grupos <span>0</span>		
							</div>
						</div>
					</div>
				</div>
				<div class="ed-container">
					<div class="ed-item tablet-1-3">
						<div class="ed-container">
							<div class="ed-item opciones documentos">
								<h3>Vista del Perfil <i class="fa fa-angle-right"></i> </h3>
								<p>Documento</p>
							</div>
							<div class="ed-item opciones">
								<h3>Chat <i class="fa fa-angle-right"></i> </h3>
								<p>Documento</p>
							</div> 
						</div>
					</div>
					<div class="ed-item tablet-2-3">
						<div class="ed-container actividad no-padding">
							<div class="ed-item usuario cross-center">
								<p> 
									@if(Auth::User()->genero_usuario=="Masculino")
										<img src="{{ asset('img/iconoModeradorHombre.png') }}" alt="Contacto">
									@else
										<img src="{{ asset('img/iconoModeradorMujer.png') }}" alt="Contacto">
									@endif
									{{ Auth::User()->nombres_usuario }}
								</p>
							</div>
							<div class="ed-item archivo cross-center">
								{{ Form::open(array('url'=>'usuarios/guardarSilabo','enctype'=>'multipart/form-data')) }} 
									{{ Form::file('silabo',array('id'=>'archivo','accept'=>'application/pdf','required')) }}
									{{ Form::submit('Subir Archivo',array('class'=>'submit')) }}
								{{ Form::close() }}
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="ed-item tablet-20 chat">
				
			</div>
		</main>
	@stop
	@section('footer')
	@stop
	<script type="text/javascript">
		$(document).on('ready',function(){

			@if (Session::has('mensaje1'))	
				alertify.success("{{ Session::get('mensaje1') }}");
			@endif

			@if (Session::has('mensaje2'))	
				alertify.error("{{ Session::get('mensaje2') }}");
			@endif

			var contador = 0;
			var frm = $('form');
			frm[0].reset();

			
			function carga(contador){
				$.ajax({ 
					url: "{{ URL::to('/usuarios/mostrarSilabos') }}",
					type: 'POST',
					contentType: 'application/x-www-form-urlencoded',
					data: {cont: contador}
				})
				.done(function(files) {
					if(files!=false){
						$.each(files, function(i,item){
							var enlace;
							if(files[i].estado_silabo==1){
								enlace = String('<i title="Documento Pendiente" class="fa fa-hourglass"></i>');
							}
							if(files[i].estado_silabo==2){
								enlace = String('<a target="blank" href="{{ URL::to("usuarios/mostrarSilabo") }}/'+files[i].id_silabo+'/'+files[i].usuario_silabo+'"> <i title="Documento en Revisión" class="fa fa-cog fa-spin"></i>');
							}
							if(files[i].estado_silabo==3){
								enlace = String('<i title="Documento Revisado" class="fa fa-check"></i>');
							}
							
							$('.documentos').append('<p> '+ enlace +' <a href="../'+ files[i].path_silabo +'" target="blank">'+ files[i].nombre_silabo +'</a> </p>');
						});
					}else{
						$('.documentos').append('<p> no existen silabos para revisión </p>');
					}
					contador = files.length;
				});	
			}

			carga(contador);

		});
	</script>
</body>
@stop