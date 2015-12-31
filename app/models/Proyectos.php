<?php
/**
* 
*/
class Proyectos extends Eloquent
{
	protected $table = 'proyectos';
	public $timestamps = false; 
	protected $fillable = array(
		'id_proyectos','nombre_proyectos','enlace_proyectos','descripcion_proyectos',
		'imagen_banner_proyectos','imagen_min_proyectos','area_gestion_proyectos'
		);

	public static function insertar_proyectos($nombre_proyectos,$enlace_proyectos,$descripcion_proyectos,$imagen_banner_proyectos,
		$imagen_min_proyectos,$area_gestion_proyectos){
		$response = DB::table('proyectos')
					->insert([
						'nombre_proyectos'=>$nombre_proyectos,
						'enlace_proyectos'=>$enlace_proyectos,
						'descripcion_proyectos'=>$descripcion_proyectos,
						'imagen_banner_proyectos'=>$imagen_banner_proyectos,
						'imagen_min_proyectos'=>$imagen_min_proyectos,
						'area_gestion_proyectos'=>$area_gestion_proyectos
						]);
		return $response;
	}

	public static function buscar_proyectos($id_proyectos){
		$response = DB::table('proyectos')->where('id_proyectos',$id_proyectos)->first();
		return $response;
	}

	public static function eliminar_proyectos($id_proyectos){
		$query = DB::table('proyectos')->where('id_proyectos', '=', $id_proyectos)->delete();
		return $query;
	}

	public static function listar_proyectos($opcion,$area_gestion_proyectos){
		switch ($opcion) {
			case 1:
				//listar todos 
				$response = DB::table('proyectos')
							->where('area_gestion_proyectos',$area_gestion_proyectos)
							->get();
				break;
			case 2:
				//listar todos ascendente 
				$response = DB::table('proyectos')
							->where('area_gestion_proyectos',$area_gestion_proyectos)
							->orderBy('id_proyectos','asc')
							->get();
				break;
			case 3:
				//listar todos descendente
				$response = DB::table('proyectos')
							->where('area_gestion_proyectos',$area_gestion_proyectos)
							->orderBy('id_proyectos','desc')
							->get();
				break;
			default :
				$response = -1;
				break;
		}
		return $response;
	}

	public static function actualizar_proyectos($id_proyectos,$nombre_proyectos,$enlace_proyectos,$descripcion_proyectos,$imagen_banner_proyectos,
		$imagen_min_proyectos,$area_gestion_proyectos){
		$response= DB::table('proyectos')
	        ->where('id_proyectos', $id_proyectos)
	        ->update(array(
	        	'nombre_proyectos'=>$nombre_proyectos,
				'enlace_proyectos'=>$enlace_proyectos,
				'descripcion_proyectos'=>$descripcion_proyectos,
				'imagen_banner_proyectos'=>$imagen_banner_proyectos,
				'imagen_min_proyectos'=>$imagen_min_proyectos,
				'area_gestion_proyectos'=>$area_gestion_proyectos
	        	));
	    return $response; 
	}

	public static function listar_todos_proyectos($opcion){
		switch ($opcion) {
			case 1:
				//listar todos 
				$response = DB::table('proyectos')
							->get();
				break;
			case 2:
				//listar todos ascendente 
				$response = DB::table('proyectos')
							->orderBy('id_proyectos','asc')
							->get();
				break;
			case 3:
				//listar todos descendente
				$response = DB::table('proyectos')
							->orderBy('id_proyectos','desc')
							->get();
				break;
			default :
				$response = -1;
				break;
		}
		return $response;
	}
}