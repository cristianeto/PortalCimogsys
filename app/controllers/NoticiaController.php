<?php

use Symfony\Component\HttpFoundation\JsonResponse;

class NoticiaController  extends BaseController{
	public function visualizarNoticias(){
		$response = 0;
		$response = Centro::buscar_centro(3);
		if(count($response)!=0){
			//$response = 0;
				$areas = AreaGestion::where('centro_area_gestion',3)->lists('nombre_area_gestion','id_area_gestion');
				if(count($areas)!=0){
					return View::make('noticias')->with('noticias',Noticia::listar_noticias_todas(3))->with('centro',$response)->with('areas',$areas);
				}else{
					return View::make('noticias')->with('error','No existen áreas de gestión');
				}

		}else{
			return View::make('pruebas.noticia')->with('error','No existe un centro de investigacion para ingresar proyectos');
		}
	}

	public function visualizarAdminNoticias(){
		$response = 0;
		$response = Centro::buscar_centro(3);
		if(count($response)!=0){
				$areas = AreaGestion::where('centro_area_gestion',3)->lists('nombre_area_gestion','id_area_gestion');
				if(count($areas)!=0){
					return View::make('admin.noticias')->with('noticias',Noticia::listar_noticias_todas(3))->with('centro',$response)->with('areas',$areas);
				}else{
					return View::make('admin.noticias')->with('error','No existen áreas de gestión');
				}

		}else{
			return View::make('pruebas.noticia')->with('error','No existe un centro de investigación para visualizar noticias');
		}
	}

	public function visualizarNoticia(){
		$response = 0;
		$response = Centro::buscar_centro(3);
		if(count($response)!=0){
				$noticia = Noticia::buscar_noticia(16); // debe cambiarse por una variable
				if(count($noticia)!=0){
					return View::make('visualizarNoticia')->withNoticia($noticia)->withCentro($response);
				}else{
					return View::make('visualizarNoticia')->withError('No es una noticia vaálida');
				}

		}else{
			return View::make('visualizarNoticia')->withError('No existe un centro de investigación para visualizar la noticia');
		}
	}
}
