<?php

/**
* 
*/
class Objetivos extends Eloquent
{
	protected $table = 'objetivos';
	public $timestamps = false; 
	protected $fillable = array('id_objetivos','descripcion_objetivos','centro_objetivos');

	public static function insertar_objetivos($descripcion_objetivos,$centro_objetivos){
		$response = DB::table('objetivos')
					->insert([
						'descripcion_objetivos'=>$descripcion_objetivos,
						'centro_objetivos'=>$centro_objetivos
						]);
		return $response;
	}

	public static function buscar_objetivos($id_objetivos){
		$response = DB::table('objetivos')->where('id_objetivos',$id_objetivos)->first();
		return $response;
	}

	public static function eliminar_objetivos($id_objetivos){
		$query = DB::table('objetivos')->where('id_objetivos', '=', $id_objetivos)->delete();
		return $query;
	}

	public static function listar_objetivos($opcion,$centro_objetivos){
		switch ($opcion) {
			case 1:
				//listar todos 
				$response = DB::table('objetivos')
							->where('centro_objetivos',$centro_objetivos)
							->get();
				break;
			case 2:
				//listar todos ascendente 
				$response = DB::table('objetivos')
							->where('centro_objetivos',$centro_objetivos)
							->orderBy('id_objetivos','asc')
							->get();
				break;
			case 3:
				//listar todos descendente
				$response = DB::table('objetivos')
							->where('centro_objetivos',$centro_objetivos)
							->orderBy('id_objetivos','desc')
							->get();
				break;
			default :
				$response = -1;
				break;
		}
		return $response;
	}

	public static function actualizar_objetivos($id_objetivos,$descripcion_objetivos,$centro_objetivos){
		$response= DB::table('objetivos')
	        ->where('id_objetivos', $id_objetivos)
	        ->where('centro_objetivos',$centro_objetivos)
	        ->update(array('descripcion_objetivos'=>$descripcion_objetivos));
	    return $response; 
	}
}