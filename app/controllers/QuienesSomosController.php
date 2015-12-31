<?php

use Symfony\Component\HttpFoundation\JsonResponse;

class QuienesSomosController  extends BaseController{
	public function visualizarQuienesSomos(){
		$centro = 0;
		$centro = Centro::buscar_centro(3);//Consulto mi centro... en nuestro caso el centro cimogsys con codigo 3
		if(count($centro)!=0){
				return View::make('quienesSomos')->withCentro($centro);
		}else{
			return View::make('quienesSomos')->withError('No existe el centro...');
		}
	}
}