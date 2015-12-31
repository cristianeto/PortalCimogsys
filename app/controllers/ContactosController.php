<?php

use Symfony\Component\HttpFoundation\JsonResponse;

class ContactosController  extends BaseController{
		public function visualizarContactos(){
		$centro = 0;
		$centro = Centro::buscar_centro(3);//Consulto mi centro... en nuestro caso el centro cimogsys con codigo 3
		if(count($centro)!=0){
			$areas=0;
			$areas = AreaGestion::listar_area_gestion(2,$centro->id_centro);
				if(count($areas)>0){
					$usuarios=0;
					$usuarios=User::listar_usuarios(3);
					if(count($usuarios)>0){
						$tipos=0;
						$tipos=TipoUsuario::listar_tipo_usuario(3);
						if(count($tipos)>0){
							return View::make('contactos')->withCentro($centro)->withAreas($areas)->withUsuarios($usuarios)->withTipos($tipos);
						}else{
							return View::make('contactos')->withError('No existen tipos de usuario en el centro!');			
						}
					}else{
						return View::make('contactos')->withError('No existen usuarios en el centro!');		
					}
				}else{
					return View::make('contactos')->withError('No existen areas en el centro!');		
				}
		}else{
			return View::make('contactos')->withError('No existe el centro!');
		}
	}
}