<?php

use Symfony\Component\HttpFoundation\JsonResponse;

class CentroController  extends BaseController{

	public function visualizarAdminCentro(){
		$centro = 0;
		$centro = Centro::buscar_centro(3);//Consulto mi centro... en nuestro caso el centro cimogsys con codigo 3
		if(count($centro)!=0){
				return View::make('admin/centro')->withCentro($centro);
		}else{
			return View::make('admin/centro')->withError('No existe el centro...');
		}
	}
}