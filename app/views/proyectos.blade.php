<!DOCTYPE html>
@extends('plantilla.plantilla')
@section('titulo')
 Proyectos
@stop
@section('body')
<body class="proyectos">
  @parent
  @section('header')
  <header class="ed-container full">
    <div class="ed-item web-30 tablet-35 movil-30 cross-center">
      <a href="{{URL::Route('inicio')}}">{{ HTML::image('img/'.$centro->logo_centro, 'alt=logo centro CIMOGSYS', array( 'class' => 'logo' )) }}</a>
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
    <div class="ed-item">
      <h1>Proyectos</h1>
      <div class="ed-container full descripcion">
        @if(count($proyectos)!=0)
          @foreach($proyectos as $proyecto)
            <div class="ed-item fie web-1-3 main-center"><a class="cross-center" target="_blank" href="{{$proyecto->enlace_proyectos}}">{{ HTML::image('img/'.$proyecto->imagen_min_proyectos, 'alt=logo proyecto', array('class'=>'')) }}</a>
              <p> {{ $proyecto->descripcion_proyectos }}</p>
            </div>

            @endforeach
            <div id="normas" class="ed-item fie web-1-3 main-center"><a href="">Normas de publicación de la Revista.</a>
              <p>
              Para descargar el documento con las políticas de publicación de nuestra revista dar clic {{ link_to_asset('img/noticia/'.$noticia->imagen_noticia, $title='aquí', $attributes = array('download'=>$noticia->imagen_noticia));}} ...!
              </p>
            </div>
          @endif

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
