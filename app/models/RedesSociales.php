<?php 
/**
* 
*/
class RedesSociales extends Eloquent
{
	
	protected $table = 'redes_sociales';
	public $timestamps = false; 
	protected $fillable = array('id_redes_sociales','nombre_redes_sociales','enlace_redes_sociales','usuario_redes_sociales','centro_redes_sociales');

	public static function insertar_redes_sociales($nombre_redes_sociales,$enlace_redes_sociales,$usuario_redes_sociales,$centro_redes_sociales){
		$response = DB::table('redes_sociales')
					->insert([
						'nombre_redes_sociales'=>$nombre_redes_sociales,
						'enlace_redes_sociales'=>$enlace_redes_sociales,
						'usuario_redes_sociales'=>$usuario_redes_sociales,
						'centro_redes_sociales'=>$centro_redes_sociales
						]);
		return $response;
	}

	public static function buscar_redes_sociales($id_redes_sociales){
		$response = DB::table('redes_sociales')->where('id_redes_sociales',$id_redes_sociales)->first();
		return $response;
	}

	public static function eliminar_redes_sociales($id_redes_sociales){
		$query = DB::table('redes_sociales')->where('id_redes_sociales', '=', $id_redes_sociales)->delete();
		return $query;
	}

	public static function listar_redes_sociales($opcion,$centro_redes_sociales){
		switch ($opcion) {
			case 1:
				//listar todos 
				$response = DB::table('redes_sociales')
							->where('centro_redes_sociales',$centro_redes_sociales)
							->get();
				break;
			case 2:
				//listar todos ascendente 
				$response = DB::table('redes_sociales')
							->where('centro_redes_sociales',$centro_redes_sociales)
							->orderBy('id_redes_sociales','asc')
							->get();
				break;
			case 3:
				//listar todos descendente
				$response = DB::table('redes_sociales')
							->where('centro_redes_sociales',$centro_redes_sociales)
							->orderBy('id_redes_sociales','desc')
							->get();
				break;
			default :
				$response = -1;
				break;
		}
		return $response;
	}

	public static function actualizar_redes_sociales($id_redes_sociales,$nombre_redes_sociales, $enlace_redes_sociales, $usuario_redes_sociales, $centro_redes_sociales){
		$response= DB::table('redes_sociales')
	        ->where('id_redes_sociales', $id_redes_sociales)
	        ->where('centro_redes_sociales',$centro_redes_sociales)
	        ->update(array(
	        	'nombre_redes_sociales'=>$nombre_redes_sociales,
				'enlace_redes_sociales'=>$enlace_redes_sociales,
				'usuario_redes_sociales'=>$usuario_redes_sociales,
	        	));
	    return $response; 
	}
	
}