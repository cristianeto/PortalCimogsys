<?php

use Symfony\Component\HttpFoundation\JsonResponse;

class InicioController  extends BaseController{
		public function visualizarInicio(){
		$centro = 0;
		$centro = Centro::buscar_centro(3);//Consulto mi centro... en nuestro caso el centro cimogsys con codigo 3
		if(count($centro)!=0){
			$proyectos=Proyectos::listar_todos_proyectos(3);
			if(count($proyectos)>0){
				return View::make('inicio')->withCentro($centro)->withProyectos($proyectos);
			}else{
				return View::make('inicio')->withCentro($centro)->withError('No existen Proyectos');
			}
		}else{
			return View::make('inicio')->withError('No existe el centro...');
		}
	}
}
