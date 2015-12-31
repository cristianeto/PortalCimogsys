<?php 
/**
* 
*/
class Beneficiarios extends Eloquent
{
	
	protected $table = 'beneficiarios';
	public $timestamps = false; 
	protected $fillable = array('id_beneficiarios','nombre_beneficiarios','descripcion_beneficiarios','centro_beneficiarios');

	public static function insertar_beneficiarios($nombre_beneficiarios,$descripcion_beneficiarios,$centro_beneficiarios){
		$response = DB::table('beneficiarios')
					->insert([
						'nombre_beneficiarios'=>$nombre_beneficiarios,
						'descripcion_beneficiarios'=>$descripcion_beneficiarios,
						'centro_beneficiarios'=>$centro_beneficiarios
						]);
		return $response;
	}

	public static function buscar_beneficiarios($id_beneficiarios){
		$response = DB::table('beneficiarios')->where('id_beneficiarios',$id_beneficiarios)->first();
		return $response;
	}

	public static function eliminar_beneficiarios($id_beneficiarios){
		$query = DB::table('beneficiarios')->where('id_beneficiarios', '=', $id_beneficiarios)->delete();
		return $query;
	}

	public static function listar_beneficiarios($opcion,$centro_beneficiarios){
		switch ($opcion) {
			case 1:
				//listar todos 
				$response = DB::table('beneficiarios')
							->where('centro_beneficiarios',$centro_beneficiarios)
							->get();
				break;
			case 2:
				//listar todos ascendente 
				$response = DB::table('beneficiarios')
							->where('centro_beneficiarios',$centro_beneficiarios)
							->orderBy('id_beneficiarios','asc')
							->get();
				break;
			case 3:
				//listar todos descendente
				$response = DB::table('beneficiarios')
							->where('centro_beneficiarios',$centro_beneficiarios)
							->orderBy('id_beneficiarios','desc')
							->get();
				break;
			default :
				$response = -1;
				break;
		}
		return $response;
	}

	public static function actualizar_beneficiarios($id_beneficiarios,$nombre_beneficiarios,$descripcion_beneficiarios,$centro_beneficiarios){
		$response= DB::table('beneficiarios')
	        ->where('id_beneficiarios', $id_beneficiarios)
	        ->where('centro_beneficiarios',$centro_beneficiarios)
	        ->update(array(
	        		'nombre_beneficiarios'=>$nombre_beneficiarios,
					'descripcion_beneficiarios'=>$descripcion_beneficiarios
	        	));
	    return $response; 
	}

}