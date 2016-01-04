@extends('plantilla.plantilla')
@section('metas')
@parent
@stop
@section('titulo')
 Inicio
@stop
@section('body')
<body class="misionVision">
@parent
@section('header')
  <header class="ed-container full">
    <div class="ed-item web-30 tablet-35 movil-30 cross-center"><a href="{{ URL::Route('inicio')}}">{{ HTML::image('img/headerLogo.png', 'alt=logo centro CIMOGSYS', array( 'class' => 'logo' )) }}</a></div>
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
    <article id="mision" style="background-image: url('img/mainFondoMision.png')" class="ed-item">
      <div class="noticia"><span>Misión</span>
        <p> {{ $centro->mision_centro }}</p>
      </div><a href="#vision"><img src="img/mainFlechaA.png" class="desde-tablet"/></a>
    </article>
    <article id="vision" style="background-image: url('img/mainFondoVision.jpg')" class="ed-item"><a href="#mision"><img src="img/mainFlechaAr.png" class="desde-tablet"/></a>
      <div class="noticia"><span>Visión</span>
        <p> {{$centro->vision_centro}}</p>
      </div>
    </article>
  </main>
  @stop
  <script src="js/script.js"></script>
  @section('footer')
    @parent
  @stop
</body>
@stop