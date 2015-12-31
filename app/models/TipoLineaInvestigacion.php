<?php
	/**
	* 
	*/
class TipoLineaInvestigacion extends Eloquent
{
	protected $table = 'tipo_linea_investigacion';
	public $timestamps = false; 
	protected $fillable = array('id_tipo_linea_investigacion','descripcion_tipo_linea_investigacion');

	public static function insertar_tipo_linea_investigacion($descripcion_tipo_linea_investigacion){
		$response = DB::table('tipo_linea_investigacion')->insert(['descripcion_tipo_linea_investigacion'=>$descripcion_tipo_linea_investigacion]);
		return $response;
	}

	public static function buscar_tipo_linea_investigacion($id_tipo_linea_investigacion){
		$response = DB::table('tipo_linea_investigacion')->where('id_tipo_linea_investigacion',$id_tipo_linea_investigacion)->first();
		return $response;
	}

	public static function eliminar_tipo_linea_investigacion($id_tipo_linea_investigacion){
		$query = DB::table('tipo_linea_investigacion')->where('id_tipo_linea_investigacion', '=', $id_tipo_linea_investigacion)->delete();
		return $query;
	}

	public static function listar_tipo_linea_investigacion($opcion){
		switch ($opcion) {
			case 1:
				//listar todos
				$response = DB::table('tipo_linea_investigacion')->get();
				break;
			case 2:
				//listar todos ascendente
				$response = DB::table('tipo_linea_investigacion')
									->orderBy('id_tipo_linea_investigacion','asc')
									->get();
				break;
			case 3:
				//listar todos descendente
				$response = DB::table('tipo_linea_investigacion')
									->orderBy('id_tipo_linea_investigacion','desc')
									->get();
				break;
			default :
				$response = -1;
				break;
		}
		return $response;
	}

	public static function actualizar_tipo_linea_investigacion($id_tipo_linea_investigacion,$descripcion_tipo_linea_investigacion){
		$response= DB::table('tipo_linea_investigacion')
	        ->where('id_tipo_linea_investigacion', $id_tipo_linea_investigacion) 
	        ->update(array('descripcion_tipo_linea_investigacion'=>$descripcion_tipo_linea_investigacion));
	    return $response; 
	}
}