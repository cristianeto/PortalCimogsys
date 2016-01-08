@extends('plantilla.plantilla')
@section('metas')
@parent
@stop
@section('titulo')
 Inicio
@stop
@section('body')
<body class="home">
@parent
  @section('header')
    <header class="ed-container full">
      <div class="ed-item web-30 tablet-35 movil-30 cross-center">
      {{ HTML::image('img/headerLogo.png', 'alt=logo centro CIMOGSYS', array( 'class' => 'logo' )) }}
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
      <ul class="ed-item">
        <li id="1" style="background-image: url('img/mainAside.jpg'); background-position: 5%;"><img src="img/mainFlechaI.png" class="prev"/>
          <div class="noticia">
            <h1>Título 1</h1><span>Misión</span>
            <p>
               Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio molestiae vero fugiat commodi tempore natus laudantium corporis, totam consequuntur necessitatibus. Repellat illum vero sint porro iure expedita, ipsam architecto ratione.
               Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium quod facilis non, nisi. Dicta consequatur, facilis laboriosam. Alias eligendi nulla saepe veniam, doloribus. Quae nostrum nam incidunt quam quibusdam eligendi.						
            </p>
          </div><img src="img/mainFlechaD.png" class="next"/>
        </li>
        <li id="1" style="background-image: url('img/mainAside1.jpg')"><img src="img/mainFlechaI.png" class="prev"/>
          <div class="noticia">
            <h1>Título 2</h1><span>Misión</span>
            <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio molestiae vero fugiat commodi tempore natus laudantium corporis, totam consequuntur necessitatibus. Repellat illum vero sint porro iure expedita, ipsam architecto ratione.</p>
          </div><img src="img/mainFlechaD.png" class="next"/>
        </li>
      </ul>
    </main>
  @stop
  <script src="js/script.js"></script>
</body>
@stop