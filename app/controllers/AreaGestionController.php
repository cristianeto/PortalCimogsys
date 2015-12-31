<?php

use Symfony\Component\HttpFoundation\JsonResponse;

class AreaGestionController  extends BaseController{


	public function visualizarAdminAreas(){
		$response = 0;
		$response = Centro::buscar_centro(3);
		if(count($response)!=0){
			return View::make('admin.areaGestion')->with('areas',AreaGestion::listar_area_gestion(3,3))->with('centro',$response);
		}else{
			return View::make('admin.areaGestion')->with('error','No existe un centro de investigacion para ingresar objetivos');
		}
	}
}