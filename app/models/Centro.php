<?php
	/**
	* 
	*/
class Centro extends Eloquent{

	protected $table = 'centro';
	public $timestamps = false; 
	protected $fillable = array('id_centro', 'nombre_centro','logo_centro', 
		'descripcion_centro', 'mision_centro', 'vision_centro', 'telefono_centro', 'direccion_centro', 
		'codigo_postal_centro', 'objetivo_general_centro', 'quienes_somos_centro', 'img_centro');

	public static function insertar_centro($nombre_centro,$logo_centro,$descripcion_centro,$mision_centro,$vision_centro,
		$telefono_centro,$direccion_centro,$codigo_postal_centro,$objetivo_general_centro,$quienes_somos_centro,$img_centro){
		$response = DB::table('centro')
		->insert(
			['nombre_centro'=>$nombre_centro,
			'logo_centro'=>$logo_centro,
			'descripcion_centro'=>$descripcion_centro,
			'mision_centro'=>$mision_centro,
			'vision_centro'=>$vision_centro,
			'telefono_centro'=>$telefono_centro,
			'direccion_centro'=>$direccion_centro,
			'codigo_postal_centro'=>$codigo_postal_centro,
			'objetivo_general_centro'=>$objetivo_general_centro,
			'quienes_somos_centro'=>$quienes_somos_centro,
			'img_centro'=>$img_centro
			]);
		return $response;
	}

	public static function buscar_centro($id_centro){
		$response = DB::table('centro')->where('id_centro',$id_centro)->first();
		return $response;
	}

	public static function eliminar_centro($id_centro){
		$response = DB::table('centro')->where('id_centro',$id_centro)->first();
		File::delete('img/'.$response->logo_centro);
		File::delete('img/'.$response->img_centro);
		$query = DB::table('centro')->where('id_centro', '=', $id_centro)->delete();
		return $query;
	}

	public static function listar_centro($opcion){
		switch ($opcion) {
			case 1:
				//listar todos
				$response = DB::table('centro')->get();
				break;
			case 2:
				//listar todos ascendente
				$response = DB::table('centro')
									->orderBy('id_centro','asc')
									->get();
				break;
			case 3:
				//listar todos descendente
				$response = DB::table('centro')
									->orderBy('id_centro','desc')
									->get();
				break;
			default :
				$response = -1;
				break;
		}
		return $response;
	}

	public static function actualizar_centro($id_centro,$nombre_centro,$logo_centro,$descripcion_centro,$mision_centro,$vision_centro,
		$telefono_centro,$direccion_centro,$codigo_postal_centro,$objetivo_general_centro,$quienes_somos_centro,$img_centro){
		$response= DB::table('centro')
	        ->where('id_centro', $id_centro) 
	        ->update(array(
	        	'nombre_centro'=>$nombre_centro,
				'logo_centro'=>$logo_centro,
				'descripcion_centro'=>$descripcion_centro,
				'mision_centro'=>$mision_centro,
				'vision_centro'=>$vision_centro,
				'telefono_centro'=>$telefono_centro,
				'direccion_centro'=>$direccion_centro,
				'codigo_postal_centro'=>$codigo_postal_centro,
				'objetivo_general_centro'=>$objetivo_general_centro,
				'quienes_somos_centro'=>$quienes_somos_centro,
				'img_centro'=>$img_centro
	        	));
	    return $response; 
	}
	
public static function actualizar_centro_mision_vision_quienes($id_centro,$mision_centro,$vision_centro,$quienes_somos_centro,$img_centro){
		$response= DB::table('centro')
	        ->where('id_centro', $id_centro) 
	        ->update(array(
				'mision_centro'=>$mision_centro,
				'vision_centro'=>$vision_centro,
				'quienes_somos_centro'=>$quienes_somos_centro,
				'img_centro'=>$img_centro
	        	));
	    return $response; 
	}
public static function actualizar_centro_objetivo_general($id_centro,$objetivo_general_centro){
		$response= DB::table('centro')
	        ->where('id_centro', $id_centro) 
	        ->update(array(
				'objetivo_general_centro'=>$objetivo_general_centro
	        	));
	    return $response; 
	}
			
}