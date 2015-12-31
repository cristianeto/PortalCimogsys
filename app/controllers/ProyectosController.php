<?php

use Symfony\Component\HttpFoundation\JsonResponse;

class ProyectosController  extends BaseController{
	public function visualizarProyectos(){
		$centro = 0;
		$centro = Centro::buscar_centro(3);//Consulto mi centro... en nuestro caso el centro cimogsys con codigo 3
		if(count($centro)!=0){
				$proyectos = Proyectos::listar_todos_proyectos(3); 
				return View::make('proyectos')->withCentro($centro)->withProyectos($proyectos);
		}else{
			return View::make('proyectos')->withError('No existe el centro...');
		}
	}
	public function visualizarAdminProyectos(){
		$centro = 0;
		$centro = Centro::buscar_centro(3);//Consulto mi centro... en nuestro caso el centro cimogsys con codigo 3
		if(count($centro)!=0){
				$proyectos = Proyectos::listar_todos_proyectos(3); 
				return View::make('admin.proyectos')->withCentro($centro)->withProyectos($proyectos);
		}else{
			return View::make('admin.proyectos')->withError('No existe el centro...');
		}
	}
}