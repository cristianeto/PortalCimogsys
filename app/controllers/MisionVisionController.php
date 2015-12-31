<?php

use Symfony\Component\HttpFoundation\JsonResponse;

class MisionVisionController  extends BaseController{
	public function visualizarMisionVision(){
		$centro = 0;
		$centro = Centro::buscar_centro(3);//Consulto mi centro... en nuestro caso el centro cimogsys con codigo 3
		if(count($centro)!=0){
				return View::make('misionVision')->withCentro($centro);
		}else{
			return View::make('misionVision')->withError('No existe el centro...');
		}
	}

	public function visualizarAdminMisionVision(){
		$centro = 0;
		$centro = Centro::buscar_centro(3);//Consulto mi centro... en nuestro caso el centro cimogsys con codigo 3
		if(count($centro)!=0){
				return View::make('admin/misionVision')->withCentro($centro);
		}else{
			return View::make('admin/misionVision')->withError('No existe el centro...');
		}
	}

	public function actualizarMisionVision(){
		$response=0;
		
		$id_centro = e(Input::get('id_centro'));
		$mision_centro = e(Input::get('mision_centro'));
		$vision_centro = e(Input::get('vision_centro'));
		$quienes_somos_centro = e(Input::get('quienes_somos_centro'));

		$centro = Centro::buscar_centro($id_centro);


		if(!is_null(Input::file('img_centro'))){
			$file_img_vieja = $centro->img_centro;
			$file_img_centro = Input::file('img_centro');	
			$img_centro = $file_img_centro->getClientOriginalName();
		}else{
			$img_centro = $centro->img_centro;
		}

		$response = Centro::actualizar_centro_mision_vision_quienes($id_centro,$mision_centro,$vision_centro,$quienes_somos_centro,$img_centro);
		if($response == 1){ 
			if(!is_null(Input::file('img_centro'))){
				$file_img_centro->move('img',$file_img_centro->getClientOriginalName());	
				File::delete('img/'.$file_img_vieja);			
			}

			return Redirect::to(URL::previous())->with('mensaje','Centro de Investigacion Actualizado Insertado Correctamente');
		}else{
			return Redirect::to(URL::previous())->with('mensaje','Ha ocurrido un error');
		}
	
	}



}