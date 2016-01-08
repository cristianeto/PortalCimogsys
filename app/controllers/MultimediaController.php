<?php

use Symfony\Component\HttpFoundation\JsonResponse;

class MultimediaController  extends BaseController{

	public function visualizarAdminMultimedia(){
		$response = 0;
		$noticia = Noticia::buscar_noticia($id_noticia);
		if(count($noticia)!=0){
			$tipos = TipoMultimedia::lists('descripcion_tipo_multimedia', 'id_tipo_multimedia');
			if(count($tipos)!=0){
				return View::make('pruebas.multimedia')->withMultimedias(Multimedia::listar_multimedias(3,$id_noticia))->withTipos($tipos)->withNoticia($noticia);
			}else{
				return View::make('pruebas.multimedia')->with('error','No existen tipos de multimedia');
			}
		}else{
			return View::make('pruebas.multimedia')->with('error','No existe una noticia para ingresar multimedia');
		}
	}
}