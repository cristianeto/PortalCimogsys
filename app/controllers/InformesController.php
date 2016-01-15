<?php

use Symfony\Component\HttpFoundation\JsonResponse;

class InformesController  extends BaseController{


	public function visualizarAdminInformes(){
		$response = 0;
		$response = Centro::buscar_centro(3);
		if(count($response)!=0){
				return View::make('admin.informes')->withInformes(Informe::listar_informes_todos(3));
		}else{
			return View::make('admin.informes')->withError('No existe un Centro de investigación válido');
		}
	}
	public function visualizarAcadReportes(){
		$response = 0;
		$response = Centro::buscar_centro(3);
		if(count($response)!=0){
			$areas = AreaGestion::listar_area_gestion(3,3);
			if(count($areas)>0){
				$usuarios=User::listar_usuarios(3);
				if(count($usuarios)>0){
					return View::make('acad.reportes')->withInformes(Informe::listar_informes_todos(3))->withAreas($areas)->withUsuarios($usuarios);

				}else{
					return View::make('acad.reportes')->withError('No existen Usuarios en el centro de investigación');

				}
			}else{
				return View::make('acad.reportes')->withError('No existen areas en el centro de investigación');
			}
		}else{
			return View::make('acad.reportes')->withError('No existe un Centro de investigación válido');
		}
	}


}
