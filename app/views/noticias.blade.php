@extends('plantilla.plantilla')
@section('metas')
@parent
@stop
@section('titulo')
 Inicio
@stop

<body class=" noticias">

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
    <main class="ed-container full">
      <div class="ed-item no-padding base movil-1-8 cuadroNoticias">
        <label class="padding-3 tituloNoticias">Noticias</label>
      </div>
      <div class="ed-item base fondoNoticias cross-center main-end">
        <div class="ed-container movil-1-3"></div>
        <div class="ed-container movil-1-3"></div>
        <div class="ed-container movil-1-3 ">
          <div class="ed-item movil"><h3>Centro de Investigación en Modelos de Gestión y Sistemas Informáticos</h3></div>
          <div class="ed-item movil">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit, quibusdam aliquam assumenda possimus eveniet quaerat soluta molestiae minus placeat reiciendis itaque ea hic ex incidunt tenetur doloremque expedita blanditiis laudantium!</div>
        </div>
      </div>
      <div class="ed-item no-padding base movil">
        <div class="ed-container full redesNoticias">
          <div class="ed-item base movil-50 main-end ">
            <div class="ed-container">
              <div class="ed-item base movil-1-3">
                <a href="https://www.facebook.com/cimogsys">{{ HTML::image('img/logo-fb-noticias.png', 'alt=logo centro CIMOGSYS', array( 'class' => 'logoRedesNoticias' )) }}</a>
              </div>
              <div class="ed-item base movil-2-3 no-padding cross-center">CIMOGSYS EN FACEBOOK</div>
            </div>
          </div>
          <div class="ed-item base movil-50">
            <div class="ed-container">
              <div class="ed-item base movil-1-3">
                <a href="https://twitter.com/Centro_Cimogsys">{{ HTML::image('img/logo-twitter-noticias.png', 'alt=logo centro CIMOGSYS', array( 'class' => 'logoRedesNoticias' )) }}</a>
              </div>
              <div class="ed-item base movil-2-3 no-padding cross-center">CIMOGSYS EN TWITTER</div>
            </div>
          </div>
        </div>
      </div>
      
    </main>
    <div class="ed-container full noticiasDetalles">
      <div class="ed-item base">
        <hr class="lineaSeparadora">
      </div>
      @if(count($noticias)>0)
        @foreach($noticias as $noticia)
          <div class="ed-item base movil-50 tablet-2-8"><img src="img/usuario/2_imgFormal.png" alt=""><h4 class="main-center">{{$noticia->titulo_noticia}}</h4><p class="justify">{{$noticia->contenido_noticia}}</p><a class="base movil-2-8" href="#"><label for="" class=" verMas">Ver más</label></a></div>
          @endforeach
      @else
      <p>No existen Noticias en el centro de investigación.</p>
      @endif
    </div>
  @stop
  @section('footer')
  @parent
  @stop
  <script src="js/script.js"></script>

</body>
