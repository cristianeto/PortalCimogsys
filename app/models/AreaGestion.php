<?php
/**
* 
*/
class AreaGestion extends Eloquent
{
	protected $table = 'area_gestion';
	public $timestamps = false; 
	protected $fillable = array('id_area_gestion','nombre_area_gestion','descripcion_area_gestion','color_area_gestion','centro_area_gestion');

	public static function insertar_area_gestion($nombre_area_gestion, $descripcion_area_gestion, $color_area_gestion, $centro_area_gestion){
		$response = DB::table('area_gestion')
					->insert([
						'nombre_area_gestion'=>$nombre_area_gestion,
						'descripcion_area_gestion'=>$descripcion_area_gestion,
						'color_area_gestion'=>$color_area_gestion,
						'centro_area_gestion'=>$centro_area_gestion
						]);
		return $response;
	}

	public static function buscar_area_gestion($id_area_gestion){
		$response = DB::table('area_gestion')->where('id_area_gestion',$id_area_gestion)->first();
		return $response;
	}

	public static function eliminar_area_gestion($id_area_gestion){
		$query = DB::table('area_gestion')->where('id_area_gestion', '=', $id_area_gestion)->delete();
		return $query;
	}

	public static function listar_area_gestion($opcion,$centro_area_gestion){
		switch ($opcion) {
			case 1:
				//listar todos 
				$response = DB::table('area_gestion')
							->where('centro_area_gestion',$centro_area_gestion)
							->get();
				break;
			case 2:
				//listar todos ascendente 
				$response = DB::table('area_gestion')
							->where('centro_area_gestion',$centro_area_gestion)
							->orderBy('id_area_gestion','asc')
							->get();
				break;
			case 3:
				//listar todos descendente
				$response = DB::table('area_gestion')
							->where('centro_area_gestion',$centro_area_gestion)
							->orderBy('id_area_gestion','desc')
							->get();
				break;
			default :
				$response = -1;
				break;
		}
		return $response;
	}

	public static function actualizar_area_gestion($id_area_gestion, $nombre_area_gestion, $descripcion_area_gestion,$color_area_gestion, $centro_area_gestion){
		$response= DB::table('area_gestion')
	        ->where('id_area_gestion', $id_area_gestion)
	        ->where('centro_area_gestion',$centro_area_gestion)
	        ->update(array(
	        	'nombre_area_gestion'=>$nombre_area_gestion,
				'color_area_gestion'=>$color_area_gestion,
				'descripcion_area_gestion'=>$descripcion_area_gestion,
	        	));
	    return $response; 
	}
}