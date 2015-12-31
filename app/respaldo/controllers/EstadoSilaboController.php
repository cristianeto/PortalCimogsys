<?php

use Symfony\Component\HttpFoundation\JsonResponse;

class EstadoSilaboController extends BaseController {

	public function estadoSilaboCrear(){
		$input = array(
		    'id_estado_silabo' =>1,
		    'descripcion_estado_silabo' => 'Pendiente'
		);

		EstadoSilabo::create($input);

		$input = array(
		    'id_estado_silabo' =>2,
		    'descripcion_estado_silabo' => 'En Revisión'
		);

		EstadoSilabo::create($input);

		$input = array(
		    'id_estado_silabo' =>3,
		    'descripcion_estado_silabo' => 'Revisado'
		);

		EstadoSilabo::create($input);
		
		$response['resultado'] = 'ok';
		Return new JsonResponse($response);
	}

}