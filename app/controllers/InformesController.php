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
}