@extends('plantilla.plantilla')
@section('titulo')
 Objetivos
@stop
<body class="objetivos">
  <header class="ed-container full">
    <div class="ed-item web-30 tablet-35 movil-30 cross-center"><a href="{{ URL::Route('inicio')}}">{{ HTML::image('img/'.$centro->logo_centro, 'alt=logo centro CIMOGSYS', array( 'class' => 'logo' )) }}</a></div>
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
    <article id="pag1" class="ed-item">
      <div class="noticia"><span>Objetivos</span>
        <div class="ed-container full">
          <div class="ed-item tablet-50">
            <ul>
              <li class="enfasis">A. Objetivo General del Centro de Investigación</li>
              <li>{{ $centro->objetivo_general_centro}}</li>
              <li class="enfasis">B. Objetivos Específicos del Centro de Investigación</li>
              @if(count($objetivos)>0)
                @foreach($objetivos as $objetivo)
                  <li>* {{$objetivo->descripcion_objetivos}}</li>
                @endforeach
              @else
                  <li>* No existen objetivos</li>
              @endif
            </ul>
          </div>
          <div class="ed-item tablet-50">
            <ul>

            </ul>
          </div>
        </div>
      </div><a href="#pag2"><img src="img/mainFlechaA.png" class="desde-tablet"/></a>
    </article>
    <article id="pag2" class="ed-item"><a href="#pag1"><img src="img/mainFlechaAr.png" class="desde-tablet"/></a>
      <div class="noticia"><span class="desde-tablet">Objetivos</span>
        <div class="ed-container full">
          <div class="ed-item tablet-50">
            <ul>
              <li class="desde-tablet enfasis">B. Objetivos Específicos del Centro de Investigación (Contnuación)</li>
              <li>* Implementar del Modelo de Gestión por Procesos en las dependencias y unidades académicas de la Espoch</li>
              <li>* Implementar del modelo de Gestión de la Información en las dependencias y unidades académicas de la Espoch</li>
              <li>* Publicar artículos científicos del trabajo realizado en revistas indexadas</li>
              <li>* Publicar libros</li>
              <li>* Realizar eventos de trasferencia de conocimiento</li>
            </ul>
          </div>
          <div class="ed-item tablet-50">
            <ul>
              <li>* Realizar ponencias sobre la investigación</li>
              <li>* Realizar capacitaciones</li>
              <li>* Realizar cursos</li>
              <li class="enfasis">Beneficiarios Directos</li>
              <li>* La Escuela Superior Politécnica de Chimborazo y sus diferentes áreas y dependencias</li>
              <li>* Las Universidades y Escuelas Politécnicas de país, con principal enfoque aquellas pertenecientes a Proyecto de Excelencia.</li>
            </ul>
          </div>
        </div>
      </div>
    </article>
  </main>
  <script src="js/script.js"></script>
</body>
