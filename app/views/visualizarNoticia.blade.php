<!DOCTYPE html>
<html lang="es">
<head>
	<!--meta etiquetas-->
  	<meta charset="UTF-8"/>
  	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
  	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
		<!--meta etiquetas sociales-->
		<!--Google-->
		<meta itemprop="name" content="Centro de Investigación CIMOGSYS"/>
		<meta itemprop="description" content="Centro de investigación en modelos de Gestión y Sistemas Informáticos"/> <meta itemprop="image" content="img/headerLogo.png"/>
		<meta itemprop="author" content="CIMOGSYS"/>
		<!--Open Graph data (Facebook)-->
		<meta property="og:url"           content="{{Request::url()}}" />
		<meta property="og:type"          content="article" />
		<meta property="og:title"         content="{{$noticia->titulo_noticia}}" />
		<meta property="og:description"   content="{{substr($noticia->contenido_noticia,0,100)}}" />
		<meta property="og:image"         content="http://cimogsys.com/img/noticia/{{$noticia->imagen_noticia}}" />
		<meta property="og:site_name" 		content="Cimogsys">

	<title> Noticia | CIMOGSYS</title>

    {{ HTML::style('css/estilos.css'); }}
    {{ HTML::style('css/miEstilo.css'); }}
    {{ HTML::style('fonts/font-awesome-4.5.0/css/font-awesome.min.css'); }}
		{{ HTML::script('js/jquery.js'); }}
		{{ HTML::script('js/script.js'); }}
</head>
<body class=" visualizarNoticia">
  <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.5";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


    <header class="ed-container full">
      <div class="ed-item web-30 tablet-35 movil-30 cross-center">
      <a href="{{ URL::Route('inicio')}}">{{ HTML::image('img/'.$centro->logo_centro, 'alt=logo centro CIMOGSYS', array( 'class' => 'logo' )) }}</a>
      </div>
      <div class="ed-item web-70 tablet-65 movil-70 main-end cross-center">
        <div class="menu">&#9776;</div>
        <ul class="ed-menu web-horizontal tablet-horizontal">
          <li><a>El Centro</a>
            <ul>
              <li><a href="{{ URL::Route('misionVision') }}">Misión y Visión</a></li>
              <li><a href="{{ URL::Route('objetivos') }}">Objetivos</a></li>
              <li><a href="{{ URL::Route('lineasInvestigacion')}}">Líneas Investigación</a></li>
            </ul>
          </li>
          <li><a href="{{ URL::Route('proyectos') }}">Proyectos</a></li>
          <li><a href="{{ URL::Route('quienesSomos') }}">¿Quiénes Somos?</a></li>
          <li><a href="{{URL::Route('contactos')}}">El Equipo</a></li>
          <li><a href="{{URL::Route('noticias')}}">Noticias</a></li>
        </ul>
      </div>
    </header>
    <main class="ed-container full noticiasDetalles">
      <div class="ed-item no-padding base cuadroNoticias">
        <label class="padding-3 tituloNoticias">Noticias</label>
      </div>
      <div class="ed-item base tablet-2-3 padding-2 ">
        <div class="ed-container fondoBlanco">
          <div class="ed-item base main-center">
            {{ HTML::image('img/noticia/'.$noticia->imagen_noticia, 'alt='.$noticia->imagen_noticia, array('class'=>'imagenNoticiaVisualizada')) }}
          </div>
          <div class="ed-item base">
            <h3>{{$noticia->titulo_noticia}}</h3>
            <p>
              {{$noticia->contenido_noticia}}
            </p>
            <hr>
            <strong>Elaborado por: </strong>Director <br>
            <strong>Fecha de publicación: </strong>{{$noticia->fecha_publicacion_noticia}} <br>
            <strong>Enlace a esta noticia: </strong>{{$noticia->enlace_noticia}}
          </div>
          <div class="ed-item base main-end">
            <div class="fb-share-button" data-href="{{Request::url()}}" data-layout="button_count"></div>
          </div>
        </div>
      </div>
      <div class="ed-item tablet-1-3 padding-2 ">
        <div class="ed-container ">
          <div class="ed-item base  fondoBlanco"><h3>Redes Sociales</h3>
            <div class="fb-page" data-href="https://www.facebook.com/centro.cimogsys/" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/centro.cimogsys/"><a href="https://www.facebook.com/centro.cimogsys/">Cimogsys</a></blockquote></div></div>
          </div>
          <div class="ed-item base fondoBlanco">
            <a class="twitter-timeline" href="https://twitter.com/Centro_Cimogsys" data-widget-id="689171117659955200">Tweets por el @Centro_Cimogsys.</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
          </div>
        </div>
      </div>
    </main>
	<footer class="ed-container full">
			<div class="logos ed-item web-25 tablet-100 cross-center">
					<div class="ed-container">
						<div class="ed-item web-1-3 movil-1-3"><a href="http://www.espoch.edu.ec" target="blank"><img src="../img/footerEspoch.png" alt="Espoch" class="cross-center"/></a></div>
						<div class="ed-item web-1-3 movil-1-3"><a href="http://fade.espoch.edu.ec" target="blank"><img src="../img/footerFade.png" alt="Espoch" class="cross-center"/></a></div>
						<div class="ed-item web-1-3 movil-1-3"><a href="http://fie.espoch.edu.ec" target="blank"><img src="../img/footerFie.png" alt="Espoch" class="cross-center"/></a></div>
					</div>
			</div>
			<div class="informacion ed-item web-70 tablet-95 cross-center">
					<div class="ed-container">
						<div class="ed-item web-1-3 tablet-1-3 movil-100 cross-center">
								<p>{{ $centro->descripcion_centro}}</p>
						</div>
						<div class="ed-item web-1-3 tablet-1-3 movil-100 cross-center">
								<p>Dirección: {{ $centro->direccion_centro }} </p>
								<p>TELF:{{ $centro->telefono_centro }}</p>
								<p>Código Postal: {{$centro->codigo_postal_centro}}</p>
						</div>
						<div class="ed-item web-1-3 tablet-1-3 movil-100 cross-center">
								<p>Términos de Uso | Políticas de Privacidad</p>
								<p>Acerca de | Créditos | Acceso | <a href="{{URL::Route('iniciarSesion')}}">Iniciar Sesión</a> </p>
						</div>
					</div>
			</div>
			<div class="redes ed-item web-5 tablet-5 main-center">
				<a href="http://www.facebook.com" target="blank" class="cross-center tablet-100 movil-1-3 main-center"><img src="../img/footerFacebook.png" alt=""/></a>
				<a href="http://www.facebook.com" target="blank" class="cross-center tablet-100 movil-1-3 main-center"><img src="../img/footerTwitter.png" alt=""/></a>
				<a href="http://www.facebook.com" target="blank" class="cross-center tablet-100 movil-1-3 main-center"><img src="../img/footerYoutube.png" alt=""/></a>
			</div>
		</footer>
  <script src="../js/script.js"></script>

</body>
</html>
