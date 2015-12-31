<?php 
/**
* 
*/
class LineaInvestigacion extends Eloquent
{
	protected $table = 'linea_investigacion';
	public $timestamps = false; 
	protected $fillable = array('id_linea_investigacion','descripcion_linea_investigacion','centro_linea_investigacion','tipo_linea_investigacion');

	public static function insertar_linea_investigacion($descripcion_linea_investigacion, $centro_linea_investigacion, $tipo_linea_investigacion){
		$response = DB::table('linea_investigacion')
					->insert([
						'descripcion_linea_investigacion'=>$descripcion_linea_investigacion,
						'centro_linea_investigacion'=>$centro_linea_investigacion,
						'tipo_linea_investigacion'=>$tipo_linea_investigacion
						]);
		return $response;
	}

	public static function buscar_linea_investigacion($id_linea_investigacion){
		$response = DB::table('linea_investigacion')->where('id_linea_investigacion',$id_linea_investigacion)->first();
		return $response;
	}

	public static function eliminar_linea_investigacion($id_linea_investigacion){
		$query = DB::table('linea_investigacion')->where('id_linea_investigacion', '=', $id_linea_investigacion)->delete();
		return $query;
	}

	public static function listar_linea_investigacion($opcion,$centro_linea_investigacion){
		switch ($opcion) {
			case 1:
				//listar todos 
				$response = DB::table('linea_investigacion')
							->where('centro_linea_investigacion',$centro_linea_investigacion)
							->get();
				break;
			case 2:
				//listar todos ascendente 
				$response = DB::table('linea_investigacion')
							->where('centro_linea_investigacion',$centro_linea_investigacion)
							->orderBy('id_linea_investigacion','asc')
							->get();
				break;
			case 3:
				//listar todos descendente
				$response = DB::table('linea_investigacion')
							->where('centro_linea_investigacion',$centro_linea_investigacion)
							->orderBy('id_linea_investigacion','desc')
							->get();
				break;
			default :
				$response = -1;
				break;
		}
		return $response;
	}

	public static function actualizar_linea_investigacion($id_linea_investigacion, $descripcion_linea_investigacion, $centro_linea_investigacion, $tipo_linea_investigacion){
		$response= DB::table('linea_investigacion')
	        ->where('id_linea_investigacion', $id_linea_investigacion)
	        ->where('centro_linea_investigacion',$centro_linea_investigacion)
	        ->update(array(
	        	'descripcion_linea_investigacion'=>$descripcion_linea_investigacion,
				'tipo_linea_investigacion'=>$tipo_linea_investigacion
	        	));
	    return $response; 
	}
}