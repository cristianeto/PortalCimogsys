<?php
/**
* @Author: Cristianeto
*
*/
class Noticia extends Eloquent
{
	protected $table = 'noticia';
	public $timestamps = false;
	protected $fillable = array('id_noticia','titulo_noticia','contenido_noticia','fecha_publicacion_noticia','fecha_actualizacion_noticia', 'enlace_noticia', 'area_gestion_notica','imagen_noticia');

	public static function codigo_nuevo_noticia(){
		$maximo=0;
		$maximo = (DB::table('noticia')->max('id_noticia'))+1;
		if(count($maximo)!=0){
			return $maximo;
		}else{
			return 1;
		}
	}

	public static function insertar_noticia($id_noticia,$titulo_noticia, $contenido_noticia, $enlace_noticia, $area_gestion_notica, $imagen_noticia){
		$response = DB::table('noticia')
					->insert([
						'id_noticia'=>$id_noticia,
						'titulo_noticia'=>$titulo_noticia,
						'contenido_noticia'=>$contenido_noticia,
						'enlace_noticia'=>$enlace_noticia,
						'area_gestion_notica'=>$area_gestion_notica,
						'imagen_noticia'=>$imagen_noticia
						]);
		return $response;
	}

	public static function buscar_noticia($id_noticia){
		$response = DB::table('noticia')->where('id_noticia',$id_noticia)->first();
		return $response;
	}

	public static function eliminar_noticia($id_noticia){
		$query = DB::table('noticia')->where('id_noticia', '=', $id_noticia)->delete();
		return $query;
	}

	public static function listar_noticias($opcion,$area_gestion_notica){
		switch ($opcion) {
			case 1:
				//listar todos
				$response = DB::table('noticia')
							->where('area_gestion_notica',$area_gestion_notica)
							->get();
				break;
			case 2:
				//listar todos ascendente
				$response = DB::table('noticia')
							->where('area_gestion_notica',$area_gestion_notica)
							->orderBy('id_noticia','asc')
							->get();
				break;
			case 3:
				//listar todos descendente
				$response = DB::table('noticia')
							->where('area_gestion_notica',$area_gestion_notica)
							->orderBy('id_noticia','desc')
							->get();
				break;
			default :
				$response = -1;
				break;
		}
		return $response;
	}

	public static function listar_noticias_todas($opcion){
		switch ($opcion) {
			case 1:
				//listar todos
				$response = DB::table('noticia')
							->where('id_noticia','!=','17')
							->get();
				break;
			case 2:
				//listar todos ascendente
				$response = DB::table('noticia')
							->where('id_noticia','!=','17')
							->orderBy('id_noticia','asc')
							->get();
				break;
			case 3:
				//listar todos descendente
				$response = DB::table('noticia')
							->where('id_noticia','!=','17')
							->orderBy('fecha_publicacion_noticia','desc')
							->get();
				break;
			default :
				$response = -1;
				break;
		}
		return $response;
	}

	public static function actualizar_noticia($id_noticia, $titulo_noticia, $contenido_noticia, $enlace_noticia, $area_gestion_notica, $imagen_noticia){
		$response= DB::table('noticia')
	        ->where('id_noticia', $id_noticia)
	        ->where('area_gestion_notica',$area_gestion_notica)
	        ->update(array(
	        	'titulo_noticia'=>$titulo_noticia,
				'contenido_noticia'=>$contenido_noticia,
				'enlace_noticia'=>$enlace_noticia,
				'area_gestion_notica'=>$area_gestion_notica,
				'imagen_noticia'=>$imagen_noticia
	        	));
	    return $response;
	}
}
