@extends('plantilla.plantilla')
@section('metas')
@parent

@stop
@section('titulo')
 Inicio
@stop
@section('body')
<body class=" home">
  @parent
  @section('header')
    <header class="ed-container full">
      <div class="ed-item web-30 tablet-35 movil-30 cross-center">
      {{ HTML::image('img/'.$centro->logo_centro, 'alt=logo centro CIMOGSYS', array( 'class' => 'logo' )) }}
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
      <ul class="ed-item base">
          <li class="imagenBanner" id="1" style="background-image: url('img/PORTADAS-PAGINA/Portada_FADE.jpg');">
            <img src="img/arrow-left.png" class="prev"/>
            <div class="ed-container ">
              <div class="ed-item base movil-1-6 cross-center main-center car">
                  <img class="logoBanner" src="img/PORTADAS-PAGINA/logo_fade_blancoNegro.png" alt="logo_fade">
              </div>
              <div class="ed-item base movil-4-6 car">
                <div class="padding-2">
                  <h1 class="tituloNoticia">Facultad de Administración de Empresas</h1>
                <p>
                   Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio molestiae vero fugiat commodi tempore natus laudantium corporis, totam consequuntur necessitatibus. Repellat illum vero sint porro iure expedita, ipsam architecto ratione.

                </p>
                <label class="main-end verMasNoticia" for=""><a href="http://fade.espoch.edu.ec/" target="_blank">Ver más...</a></label>
                </div>
              </div>
            </div>
            <img src="img/arrow-right.png" class="next"/>
          </li>
          <li class="imagenBanner" id="1" style="background-image: url('img/PORTADAS-PAGINA/Portada_FIE.jpg'); background-position: 5%;">
            <img src="img/arrow-left.png" class="prev"/>
            <div class="ed-container ">
              <div class="ed-item base movil-1-6 cross-center main-center car">
                  <img class="logoBanner" src="img/PORTADAS-PAGINA/logo_FIE_blancoNegro.png" alt="logo_fade">
              </div>
              <div class="ed-item base movil-4-6 car">
                <div class="padding-2">
                  <h1 class="tituloNoticia">Facultad de Informática y Electrónica</h1>
                <p>
                   Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio molestiae vero fugiat commodi tempore natus laudantium corporis, totam consequuntur necessitatibus. Repellat illum vero sint porro iure expedita, ipsam architecto ratione.

                </p>
                <label class="main-end verMasNoticia" for=""><a href="http://fie.cimogsys.com/" target="_blank">Ver más...</a></label>
                </div>
              </div>
            </div>
            <img src="img/arrow-right.png" class="next"/>
          </li>
          <li class="imagenBanner" id="1" style="background-image: url('img/PORTADAS-PAGINA/Portada_INVESTIGAR.jpg'); background-position: 5%;">
            <img src="img/arrow-left.png" class="prev"/>
            <div class="ed-container ">
              <div class="ed-item base movil-1-6 cross-center main-center car">
                  <img class="logoBanner" src="img/PORTADAS-PAGINA/logo_INVESTIGAR_blancoNegro.png" alt="logo_fade">
              </div>
              <div class="ed-item base movil-4-6 car">
                <div class="padding-2">
                  <h1 class="tituloNoticia">Revista Científica: Investigar</h1>
                <p>
                   Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio molestiae vero fugiat commodi tempore natus laudantium corporis, totam consequuntur necessitatibus. Repellat illum vero sint porro iure expedita, ipsam architecto ratione.

                </p>
                <label class="main-end verMasNoticia" for=""><a href="http://revista.cimogsys.com/" target="_blank">Ver más...</a></label>
                </div>
              </div>
            </div>
            <img src="img/arrow-right.png" class="next"/>
          </li>
          <li class="imagenBanner" id="1" style="background-image: url('img/PORTADAS-PAGINA/Portada_RED.jpg'); background-position: 5%;">
            <img src="img/arrow-left.png" class="prev"/>
            <div class="ed-container ">
              <div class="ed-item base movil-1-6 cross-center main-center car">
                  <img class="logoBanner" src="img/PORTADAS-PAGINA/logo_RED_blancoNegro.png" alt="logo_fade">
              </div>
              <div class="ed-item base movil-4-6 car">
                <div class="padding-2">
                  <h1 class="tituloNoticia">Red de Conocimiento</h1>
                <p>
                   Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio molestiae vero fugiat commodi tempore natus laudantium corporis, totam consequuntur necessitatibus. Repellat illum vero sint porro iure expedita, ipsam architecto ratione.

                </p>
                <label class="main-end verMasNoticia" for=""><a href="http://redconocimiento.cimogsys.com/" target="_blank">Ver más...</a></label>
                </div>
              </div>
            </div>
            <img src="img/arrow-right.png" class="next"/>
          </li>
          <li class="imagenBanner" id="1" style="background-image: url('img/PORTADAS-PAGINA/Portada_SGA.jpg'); background-position: 5%;">
              <img src="img/arrow-left.png" class="prev"/>
              <div class="ed-container ">
                <div class="ed-item base movil-1-6 cross-center main-center car">
                    <img class="logoBanner" src="img/PORTADAS-PAGINA/logo_SGA_blancoNegro.png" alt="logo_fade">
                </div>
                <div class="ed-item base movil-4-6 car">
                  <div class="padding-2">
                    <h1 class="tituloNoticia">Sistema de Gestión de Calidad</h1>
                  <p>
                     Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio molestiae vero fugiat commodi tempore natus laudantium corporis, totam consequuntur necessitatibus. Repellat illum vero sint porro iure expedita, ipsam architecto ratione.

                  </p>
                  <label class="main-end verMasNoticia" for=""><a href="http://sgc.fade.cimogsys.com/" target="_blank">Ver más...</a></label>
                  </div>
                </div>
              </div>
              <img src="img/arrow-right.png" class="next"/>
          </li>
      </ul>
    </main>
  @stop
  <script src="js/script.js"></script>
  @section('footer')
    @parent
  @stop
</body>
@stop
