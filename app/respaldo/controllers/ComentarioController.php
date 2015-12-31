<?php

use Symfony\Component\HttpFoundation\JsonResponse;

class ComentarioController extends BaseController {

	public function listarComentarios($silabo){
		$files = DB::select('SELECT id_comentario, de_comentario, para_comentario, detalle_comentario, silabo_comentario, nombres_usuario, genero_usuario, moderador_comentario, silabo.usuario_silabo as usuario from comentario join silabo on comentario.silabo_comentario = silabo.id_silabo join usuario on usuario.id = comentario.moderador_comentario where (silabo_comentario='.$silabo.') order by id_comentario desc');
        Return new JsonResponse($files);
	}

	public function guardarComentarioUsuario(){

		$moderador = Input::get('moderador');
		$silabo = Input::get('silabo'); 
		$contenido = Input::get('contenido');

		$input = array(
            'de_comentario'=>Auth::User()->id,
            'para_comentario'=>$moderador,
            'detalle_comentario'=> $contenido,
            'fecha_comentario'=> date('Y-m-d G:i:s'),
            'silabo_comentario'=> $silabo,
            'moderador_comentario' => Auth::User()->id
        );
        
        Comentario::create($input);
		

		$files = DB::select('SELECT id_comentario, de_comentario, para_comentario, detalle_comentario, silabo_comentario, nombres_usuario, genero_usuario, moderador_comentario, silabo.usuario_silabo as usuario from comentario join silabo on comentario.silabo_comentario = silabo.id_silabo join usuario on usuario.id = comentario.moderador_comentario where silabo_comentario ="'.$silabo.'" and detalle_comentario="'.$contenido.'"');

		Return new JsonResponse($files);		
	}

	public function guardarComentarioModerador(){

		$moderador = Input::get('moderador');
		$silabo = Input::get('silabo'); 
		$contenido = Input::get('contenido');

		$input = array(
            'de_comentario'=>Auth::User()->id,
            'para_comentario'=>$moderador,
            'detalle_comentario'=> $contenido,
            'fecha_comentario'=> date('Y-m-d G:i:s'),
            'silabo_comentario'=> $silabo,
            'moderador_comentario' => $moderador
        );
        
        Comentario::create($input);
		

		$files = DB::select('SELECT id_comentario, de_comentario, para_comentario, detalle_comentario, silabo_comentario, nombres_usuario, genero_usuario, moderador_comentario, silabo.usuario_silabo as usuario from comentario join silabo on comentario.silabo_comentario = silabo.id_silabo join usuario on usuario.id = comentario.moderador_comentario where silabo_comentario ="'.$silabo.'" and detalle_comentario="'.$contenido.'"');

		Return new JsonResponse($files);		
	}
}