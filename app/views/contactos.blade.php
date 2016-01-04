@extends('plantilla.plantilla')
@section('titulo')
 Contactos
@stop
<body class="contactos">
  <header class="ed-container full">
    <div class="ed-item web-30 tablet-35 movil-30 cross-center"><a href="{{URL::Route('inicio')}}">{{ HTML::image('img/headerLogo.png', 'alt=logo centro CIMOGSYS', array( 'class' => 'logo' )) }}</a></div>
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
    <ul class="ed-container full">

      @if(count($areas)>0)
        @foreach($areas as $area)
          <li class="ed-item web-100" style="background: {{$area->color_area_gestion}}">
            <h1>Área de {{$area->nombre_area_gestion}}</h1>
            <div class="ed-container full main-center">
            @if(count($usuarios)>0)
              @foreach($usuarios as $usuario)
                @if($usuario->area_gestion_usuario == $area->id_area_gestion)
                  <div class="ed-item web-25">
                    <div class="ed-container efecto">
                      <div class="ed-item">
                      {{ HTML::image('img/usuario/'.$usuario->img_formal_usuario, 'alt=img formal', array( 'class' => 'formal' )) }}
                      {{ HTML::image('img/usuario/'.$usuario->img_informal_usuario, 'alt=img Informal', array( 'class' => 'informal' )) }}</div>
                      <div class="ed-item texto">
                        <p>
                          {{$usuario->nombres_usuario.' '.$usuario->apellidos_usuario}}
                          <br><br>
                          <strong>{{$usuario->correo_usuario}}</strong><br>
                          <strong>{{$usuario->nick_usuario}} </strong>
                        </p>
                      </div>
                    </div>
                  </div>
                @endif
              @endforeach
            @endif
            </div>
          </li>
          @endforeach
        @endif  
    </ul>
  </main>
  <script src="js/script.js"></script>
</body>