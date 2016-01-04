@extends('plantilla.plantilla')

@section('titulo')
LíneasInvestigación
@stop
<body class="lineasInvestigacion">
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
    <article id="mision" style="background-image: url('img/mainFondoInvestigacion.jpg')" class="ed-item">
      <div class="noticia"><span>Líneas de Investigación</span>
        <p>Conforme a los programas de investigación de la ESPOCH, a las Líneas de Investigación de las Facultades de Administración de Empresas y de Informática y Electrónica, y como se registró en los Grupos de Investigación que conforman el Centro de Investigación se declaran las siguientes líneas de investigación:</p>
        <div class="ed-container full">
          @if(count($tipos)>0)
            @foreach($tipos as $tipo)
              <div class="ed-item web-50"> 
                <ul> 
                  <li>{{$tipo->id_tipo_linea_investigacion}}. {{ $tipo->descripcion_tipo_linea_investigacion }}</li>
                  @if(count($lineas)>0)
                    @foreach($lineas as $linea)
                      @if($linea->tipo_linea_investigacion == $tipo->id_tipo_linea_investigacion)
                        <li>*{{$linea->descripcion_linea_investigacion}}</li>
                      @endif
                    @endforeach
                  @endif
                </ul>
              </div>
            @endforeach
          @else
            <li>No existen Tipos Líneas de investigación en este centro. {{$centro->id_centro}}</li>
          @endif
        </div>
      </div>
    </article>
  </main>
  <script src="js/script.js"></script>
</body>