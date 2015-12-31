<?php

use Symfony\Component\HttpFoundation\JsonResponse;

class LineasInvestigacionController  extends BaseController{
		public function visualizarLineas(){
		$response = 0;
		$idCentro = 3;
		$centro = Centro::buscar_centro($idCentro);
		if(count($centro)!=0){
			$tipos = TipoLineaInvestigacion::listar_tipo_linea_investigacion(2);
			if(count($tipos)!=0){
				return View::make('lineasInvestigacion')->withLineas(LineaInvestigacion::listar_linea_investigacion(3,$idCentro))->withCentro($centro)->with('tipos',$tipos);
			}else{
				return View::make('lineasInvestigacion')->withError('No existen tipos de lineas de investigacion');
			}
		}else{
			return View::make('lineasInvestigacion')->withError('No existe un centro de investigacion para ingresar objetivos');
		}
	}

	public function visualizarAdminLineas(){
		$response = 0;
		$response = Centro::buscar_centro(3);
		if(count($response)!=0){
			$tipos = TipoLineaInvestigacion::lists('descripcion_tipo_linea_investigacion','id_tipo_linea_investigacion');
			if(count($tipos)!=0){
				return View::make('admin.lineasInvestigacion')->with('lineas',LineaInvestigacion::listar_linea_investigacion(3,3))->with('centro',$response)->with('tipos',$tipos);
			}else{
				return View::make('admin.lineasInvestigacion')->with('error','No existen tipos de lineas de investigacion');
			}
		}else{
			return View::make('admin.lineasInvestigacion')->with('error','No existe un centro de investigacion para ingresar objetivos');
		}
	}
}