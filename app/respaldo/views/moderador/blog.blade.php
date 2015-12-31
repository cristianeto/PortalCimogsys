@extends('plantilla.plantilla')

@section('titulo')
	Blog de Ayuda
@stop
@section('estilos')
	@parent
@stop
@section('scripts')
	@parent
	{{ HTML::script('js/scripts.js') }}
@stop
@section('body')
@parent
<body class="blog">
	@section('header')
		<header class="ed-container full">
			<div class="ed-item cross-center main-start movil-50">
				<h1>
					<a>Red de Conocimiento - Moderador</a>
				</h1>
			</div>
		</header>
	@stop
	@section('main')
		<main class="ed-container full">
			<div class="ed-item tablet-25">
				<div class="ed-container cross-center tarjeta">
					<div class="ed-item movil-30 no-padding">
						@if(Auth::User()->genero_usuario=="Masculino")
							<img src="{{ asset('img/iconoModeradorHombre.png') }}" alt="Contacto">
						@else
							<img src="{{ asset('img/iconoModeradorMujer.png') }}" alt="Contacto">
						@endif
					</div>
					<div class="ed-item movil-70 no-padding">
						<p class="nombre">{{ Auth::User()->nombres_usuario }}</p>
					</div>
					<div class="ed-item movil-100 no-padding">
						<p>Ing. Comercio Exterior</p>
						<p><i class="fa fa-phone"></i>{{ Auth::User()->telefono_usuario }}</p>
						<p><i class="fa fa-envelope-o"></i>{{ Auth::User()->correo_usuario }}</p>
					</div>
				</div>
				<div class="ed-container">
					<div class="ed-item opciones documentos">
						<h3>Actividad <i class="fa fa-angle-right"></i> </h3>
						<p>Documento en Revisión</p>
						<p><i class="fa fa-cog fa-spin"></i> &nbsp; {{ $path }}</p>
						<p class="cerrar">Cerrar Actividad</p>
					</div>
				</div>
			</div>
			<div class="ed-item tablet-60 cuerpo padding-2">
				<div class="ed-container frmSilabo">
					<div class="ed-item movil-100">
						<h3> Sílabo Comercio Exterior / {{ $path }} </h3>
						<object data="../../../silabos/{{ $path }}" type="application/pdf">
					        <embed src="../../../silabos/{{ $path }}" type="application/pdf" />
					    </object>
					</div>
				</div>
				<div class="ed-container frmMensajes">
					<div class="ed-item movil-100">
						{{ Form::open(array('url'=>'moderador/guardarComentario')) }}
							{{ Form::textarea('mensaje',$value=null,array('placeholder'=>'añadir descripción..','class'=>'txtMensajes')) }}
							<input type="button" value="Enviar" class="submit">
						{{ Form::close() }}
					</div>
				</div>
				<div class="ed-container frmMensajesEnviados">
					<div class="ed-item mensajes">
						
					</div>
				</div>
			</div>
			<div class="ed-item tablet-15 chat">
			
			</div>
		</main>
	@stop
	@section('footer')
	@stop
	<script language="javascript" type="text/javascript"> 

			$(document).on('ready',function(){
			$.ajax({
				url: '{{ URL::to("/listarComentarios") }}/'+{{ $silabo }},
				type: 'GET'
			})
			.done(function(files) {
				var clase;
				$.each (files, function(i,item){
					moderador = files[i].moderador_comentario;
					usuario = files[i].usuario;
					if(files[i].de_comentario == {{ Auth::User()->id }}){ 
						clase = "main-start";
						flecha = "fa-share";
					}
					else { 
						flecha = "fa-reply";
						clase = "main-end";
					}
					$('.mensajes').append( '<div class="ed-container actividad padding-2"> <div class="ed-item usuario cross-center '+ clase +' "> <p>'+ genero(files[i].genero_usuario)+' '+files[i].nombres_usuario+ '</p> </div> <div class="ed-item archivo cross-center"> <form id='+ files[i].id_comentarios+' class='+files[i].silabo_comentario+'> <label for="silabo"><i class="fa '+flecha+' "></i> &nbsp;'+files[i].detalle_comentario + '</label> </form> </div> </div>' );
				});
			});	

			function genero (est){
				switch(est) {
				    case "Masculino":
				        return String('<img src="{{ asset('img/iconoModeradorHombre.png') }}" alt="Contacto">');
				        break;
				    case "Femenino":
				        return String('<img src="{{ asset('img/iconoModeradorMujer.png') }}"" alt="Contacto">');
				        break; 
				};
			}			
		})

	$(document).on('click','.submit',function(e){
		var data = {
			moderador:moderador,
			usuario:usuario,
			silabo: {{ $silabo }},
			contenido: $('.txtMensajes').val()
		}
		e.preventDefault();
		var frm = $(this).closest('form');
		$.ajax({
			url: frm.attr('action'),
			type: frm.attr('method'),
			data: data
		}) 
		.done(function(files) {
				$.each (files, function(i,item){
					moderador = files[i].moderador_comentario;
					usuario = files[i].usuario;
					if(files[i].de_comentario == {{ Auth::User()->id }}){ 
						clase = "main-start";
						flecha = "fa-share";
					}
					else { 
						flecha = "fa-reply";
						clase = "main-end";
					}
					$('.mensajes').prepend( '<div class="ed-container actividad padding-2"> <div class="ed-item usuario cross-center '+ clase +' "> <p>'+ genero(files[i].genero_usuario)+' '+files[i].nombres_usuario+ '</p> </div> <div class="ed-item archivo cross-center"> <form id='+ files[i].id_comentarios+' class='+files[i].silabo_comentario+'> <label for="silabo"><i class="fa '+flecha+' "></i> &nbsp;'+files[i].detalle_comentario + '</label> </form> </div> </div>' );
				});
				frm.reset();
		});
		function genero (est){
				switch(est) {
				    case "Masculino":
				        return String('<img src="{{ asset('img/iconoModeradorHombre.png') }}" alt="Contacto">');
				        break;
				    case "Femenino":
				        return String('<img src="{{ asset('img/iconoModeradorMujer.png') }}"" alt="Contacto">');
				        break; 
				};
			}	
	});

	$(document).on('click','.cerrar',function(){
		$.ajax({
			url: '{{ URL::to("moderador/cerrarActividad") }}',
			type: 'POST',
			data: {silabo: {{ $silabo }}},
		})
		.done(function(response) {
			if(response.respuesta){
				javascript:window.close();
			}else{
				alertify.error("Error al finalizar la actividad");	
			}
		})
		.fail(function() {
			alertify.error("Error de Conexión");
		})
	});

	</script>
</body>
@stop