@extends('plantilla.plantilla')
@section('metas')
@parent
<!-- You can use Open Graph tags to customize link previews.
    Learn more: https://developers.facebook.com/docs/sharing/webmasters -->
	<meta property="og:url"           content="http://cimogsys.com/public/visualizarNoticia" />
	<meta property="og:type"          content="cimogsys.com" />
	<meta property="og:title"         content="{{$noticia->titulo_noticia}}" />
	<meta property="og:description"   content="{{substr($noticia->contenido_noticia,0,10)}}" />
	<meta property="og:image"         content="img/noticia/{{$noticia->imagen_noticia}}" />
@stop
@section('titulo')
 Noticias
@stop
@section('body')
<body class=" visualizarNoticia">
  <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.5";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


@parent
  @section('header')
    <header class="ed-container full">
      <div class="ed-item web-30 tablet-35 movil-30 cross-center">
      <a href="{{ URL::Route('inicio')}}">{{ HTML::image('img/headerLogo.png', 'alt=logo centro CIMOGSYS', array( 'class' => 'logo' )) }}</a>
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
    @stop
  @section('main')
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
            <div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button_count"></div>
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
  @stop
  <script src="js/script.js"></script>
  @section('footer')
    @parent
  @stop
</body>
@stop
