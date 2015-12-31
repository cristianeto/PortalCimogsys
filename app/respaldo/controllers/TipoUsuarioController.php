<?php

use Symfony\Component\HttpFoundation\JsonResponse;

class TipoUsuarioController extends BaseController {

	public function tipoUsuariosCrear(){
		$input = array(
		    'id_tipo_usuario' =>1,
		    'descripcion_tipo_usuario' => 'Administrador'
		);

		TipoUsuario::create($input);

		$input = array(
		    'id_tipo_usuario' =>2,
		    'descripcion_tipo_usuario' => 'Moderador'
		);

		TipoUsuario::create($input);

		$input = array(
		    'id_tipo_usuario' =>3,
		    'descripcion_tipo_usuario' => 'Docente'
		);

		TipoUsuario::create($input);
		
		$response['resultado'] = 'ok';
		Return new JsonResponse($response);
	}

}