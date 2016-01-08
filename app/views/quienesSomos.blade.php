@extends('plantilla.plantilla')

@section('titulo')
  Quiénes Somos?
@stop
<body class="quienesSomos">
  <header class="ed-container full">
    <div class="ed-item web-30 tablet-35 movil-30 cross-center"><a href="{{ URL::Route('inicio') }}">{{ HTML::image('img/headerLogo.png', 'alt=logo centro CIMOGSYS', array( 'class' => 'logo' )) }}</a></div>
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
  <main class="ed-container full">
    <div class="ed-item tablet-50 main-center cross-center">
    {{ HTML::image('img/'.$centro->img_centro) }}
    </div>
    <div class="ed-item tablet-50 main-center">
      <h1>¿Quiénes Somos?</h1>
      <p>
        {{ $centro->quienes_somos_centro}}
      </p>
    </div>
  </main>
  <script src="js/script.js"></script>
</body>