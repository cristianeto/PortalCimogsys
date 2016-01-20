<?php

use Symfony\Component\HttpFoundation\JsonResponse;

class ProyectosController  extends BaseController{
	public function visualizarProyectos(){
		$centro = 0;
		$centro = Centro::buscar_centro(3);//Consulto mi centro... en nuestro caso el centro cimogsys con codigo 3
		if(count($centro)!=0){
				$proyectos = Proyectos::listar_todos_proyectos(3);
				$noticia=Noticia::buscar_noticia(17);
				return View::make('proyectos')->withCentro($centro)->withProyectos($proyectos)->withNoticia($noticia);
		}else{
			return View::make('proyectos')->withError('No existe el centro...');
		}
	}
	public function visualizarAdminProyectos(){
		$response = 0;
		$response = Centro::buscar_centro(3);
		if(count($response)!=0){
			$response = 0;
			$areas = AreaGestion::where('centro_area_gestion',3)->lists('nombre_area_gestion','id_area_gestion');
			if(count($areas)!=0){
				return View::make('admin.proyectos')->with('proyectos',Proyectos::listar_todos_proyectos(3))->with('areas',$areas);
			}else{
				return View::make('admin.proyectos')->with('error','No existen áreas de gestión');
			}
		}else{
			return View::make('pruebas.proyectos')->with('error','No existe un centro de investigacion para ingresar proyectos');
		}
	}
}
