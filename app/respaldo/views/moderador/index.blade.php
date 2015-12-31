@extends('plantilla.plantilla')

@section('titulo')
	Moderador
@stop
@section('estilos')
	@parent
@stop
@section('scripts')
	@parent
@stop
@section('body')
@parent
<body class="moderadorIndex">
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
						<a class="enlace cross-center main-center" href="{{ URL::to('/moderador/perfil') }}">Perfil</a>	
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
			<div class="ed-item tablet-75 cuerpo padding-2">
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
								<h2> Moderador </h2>
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
							<div class="ed-item opciones pendientes">
								<h3>Documentos en Revisión <i class="fa fa-angle-right fa-2x"></i> </h3>
								<p>Documento</p>
							</div>
							<div class="ed-item opciones revisados">
								<h3>Documentos Revisados <i class="fa fa-angle-right fa-2x"></i> </h3>
								<p>Documento</p>
							</div>
						</div>
					</div>
					<div class="ed-item tablet-2-3 actividades">
						
					</div>
				</div>
			</div>
			<div class="ed-item tablet-25 chat">
				
			</div>
		</main>
	@stop
	@section('footer')
	@stop

	<script>
		$(document).on('ready',function(){

			//variables globales

			//funciones
			function noEvaluados(){
				$.ajax({ 
					url: "{{ URL::to('/moderador/mostrarTodosSilabos') }}",
					type: 'POST'
				})
				.done(function(files) {
					$.each (files, function(i,item){
						$('.actividades').append( '<div class="ed-container actividad no-padding"> <div class="ed-item usuario cross-center"> <p>'+ genero(files[i].genero_usuario)+' '+files[i].nombres_usuario+ '</p> </div> <div class="ed-item archivo cross-center"> <form id='+ files[i].id_silabo+' class='+files[i].usuario_silabo+'> <label for="silabo"><i class="fa fa-file-pdf-o fa-lg"></i> &nbsp;'+files[i].nombre_silabo + '</label> <input type="button" value="Abrir Archivo" class="submit"/> </form> </div> </div>' );
					});
				});		
			};
			
			function genero (est){
				switch(est) {
				    case "Masculino":
				        return String('<img src="{{ asset('img/iconoModeradorHombre.png') }}" alt="Contacto">');
				        break;
				    case "Femenino":
				        return String('<img src="{{ asset('img/iconoModeradorMujer.png') }}"" alt="Contacto">');
				        break; 
				};
			};

			function cargaRevisados(){
				$.ajax({ 
					url: "{{ URL::to('/moderador/mostrarSilabosRevisados') }}",
					type: 'POST',
					contentType: 'application/x-www-form-urlencoded'
				})
				.done(function(files) {
					if(files!=false){
						$.each(files, function(i,item){
							$('.revisados').append('<p class="ok"> <i title="Documento Revisado" class="fa fa-check"></i> &nbsp; <a href="../'+ files[i].path_silabo +'" target="blank">'+ files[i].nombre_silabo +'</a> </p>');
						});
					}else{
						$('.revisados').append('<p> no existen silabos revisados </p>');
					}
					contador = files.length;
				});	
			}

			function cargaPendientes(){
				$.ajax({ 
					url: "{{ URL::to('/moderador/mostrarSilabosPendientes') }}",
					type: 'POST',
					contentType: 'application/x-www-form-urlencoded'
				})
				.done(function(files) {
					if(files!=false){
						$.each(files, function(i,item){
							$('.pendientes').append('<p> <a target="blank" href="{{ URL::to("moderador/mostrarSilabo") }}/'+ files[i].id_silabo +'/'+files[i].usuario_silabo+'""> <i title="Documento en Revisión" class="fa fa-cog fa-spin"></i> &nbsp;'+ files[i].nombre_silabo +'</a></p>');
						});
					}else{
						$('.pendientes').append('<p> no existen silabos revisados </p>');
					}
					contador = files.length;
				});	
			}

			//Carga de funciones
			noEvaluados();
			cargaRevisados();
			cargaPendientes();
		});

		$(document).on('click','input.submit',function(e){
			var silabo = $(this).closest('form').attr('id');
			var usuario = $(this).closest('form').attr('class');
			window.open('{{ URL::to("/moderador/mostrarSilabo") }}/'+silabo+'/'+usuario);
		})
</script>
</body>
@stop