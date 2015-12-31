<?php
	/**
	* 
	*/
class TipoMultimedia extends Eloquent{
	protected $table = 'tipo_multimedia';
	public $timestamps = false; 
	protected $fillable = array('id_tipo_multimedia','descripcion_tipo_multimedia');

	public static function insertar_tipo_multimedia($descripcion_tipo_multimedia){
		$response = DB::table('tipo_multimedia')->insert(['descripcion_tipo_multimedia'=>$descripcion_tipo_multimedia]);
		return $response;
	}

	public static function buscar_tipo_multimedia($id_tipo_multimedia){
		$response = DB::table('tipo_multimedia')->where('id_tipo_multimedia',$id_tipo_multimedia)->first();
		return $response;
	}

	public static function eliminar_tipo_multimedia($id_tipo_multimedia){
		$query = DB::table('tipo_multimedia')->where('id_tipo_multimedia', '=', $id_tipo_multimedia)->delete();
		return $query;
	}

	public static function listar_tipo_multimedia($opcion){
		switch ($opcion) {
			case 1:
				//listar todos
				$response = DB::table('tipo_multimedia')->get();
				break;
			case 2:
				//listar todos ascendente
				$response = DB::table('tipo_multimedia')
									->orderBy('id_tipo_multimedia','asc')
									->get();
				break;
			case 3:
				//listar todos descendente
				$response = DB::table('tipo_multimedia')
									->orderBy('id_tipo_multimedia','desc')
									->get();
				break;
			default :
				$response = -1;
				break;
		}
		return $response;
	}

	public static function actualizar_tipo_multimedia($id_tipo_multimedia,$descripcion_tipo_multimedia){
		$response= DB::table('tipo_multimedia')
	        ->where('id_tipo_multimedia', $id_tipo_multimedia) 
	        ->update(array('descripcion_tipo_multimedia'=>$descripcion_tipo_multimedia));
	    return $response; 
	}

}