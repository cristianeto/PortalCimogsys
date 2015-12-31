<?php

use Symfony\Component\HttpFoundation\JsonResponse;

class ObjetivosController  extends BaseController{
	public function visualizarObjetivos(){
		$centro = 0;
		$centro = Centro::buscar_centro(3);//Consulto mi centro... en nuestro caso el centro cimogsys con codigo 3
		if(count($centro)!=0){
			//$objetivos = Objetivos::listar_objetivos(3,$centro);
				return View::make('objetivos')->with('objetivos',Objetivos::listar_objetivos(3,3))->with('centro',$centro);
		}else{
			return View::make('objetivos')->withError('No existe el centro...');
		}
	}

	public function visualizarAdminObjetivos(){
		$centro = 0;
		$centro = Centro::buscar_centro(3);//Consulto mi centro... en nuestro caso el centro cimogsys con codigo 3
		if(count($centro)!=0){
			return View::make('admin/objetivos')->withObjetivos(Objetivos::listar_objetivos(3,3))->withCentro($centro);
		}else{
			return View::make('admin/objetivos')->withError('No existe el centro...');
		}
	}

	public function actualizarObjetivoGeneral(){
		$response=0;
		
		$id_centro = e(Input::get('id_centro'));
		$objetivo_general_centro = e(Input::get('objetivo_general_centro'));

		$response = Centro::actualizar_centro_objetivo_general($id_centro,$objetivo_general_centro);
		if($response == 1){ 
			return Redirect::to(URL::previous())->with('mensaje','Objetivo General actualizado Insertado Correctamente');
		}else{
			return Redirect::to(URL::previous())->with('mensaje','Ha ocurrido un error');
		}
	
	}
	public function guardarObjetivoEspecifico(){
		$response=0;
		$centro = e(Input::get('id_centro'));
		$descripcion = e(Input::get('descripcion_objetivos'));
		$response = Centro::buscar_centro($centro);
		if(count($response) == 1){
			$response = 0;
			$response = Objetivos::insertar_objetivos($descripcion,$centro);
			if($response == 1){
				return Redirect::to(URL::previous())->with('mensaje','Objetivo Insertado Correctamente');
			}else{
				return Redirect::to(URL::previous())->with('mensaje','Ha ocurrido un error');
			}
		}else{
			return Redirect::to(URL::previous())->with('mensaje','No ha Seleccionado un Centro de Investigacion Válido');
		}
	}
}