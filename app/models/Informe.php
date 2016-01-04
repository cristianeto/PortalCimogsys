<?php
/**
* @Author: Cristianeto
* 
*/
class Informe extends Eloquent
{
	protected $table = 'informe';
	public $timestamps = false; 
	protected $fillable = array('id_informe', 'descripcion_informe', 'codigo_informe', 'archivo_informe', 'fecha_entrega_informe', 'fecha_modificacion_informe', 'usuario_id_usuario');

	public static function codigo_nuevo_informe(){
		$maximo=0;
		$maximo = (DB::table('informe')->max('id_informe'))+1;
		if(count($maximo)!=0){
			return $maximo;
		}else{
			return 1;
		}
	}
	public static function insertar_informe($id_informe, $descripcion_informe, $codigo_informe, $archivo_informe, $usuario_id_usuario){
		$response = DB::table('informe')
					->insert([
						'id_informe'=>$id_informe,
						'descripcion_informe'=>$descripcion_informe,
						'codigo_informe'=>$codigo_informe,
						'archivo_informe'=>$archivo_informe,
						'usuario_id_usuario'=>$usuario_id_usuario
						]);
		return $response;
	}

		public static function actualizar_informe($id_informe, $descripcion_informe, $codigo_informe, $archivo_informe, $usuario_id_usuario){
		$response= DB::table('informe')
	        ->where('id_informe', $id_informe)
	        ->update(array(
	        	'descripcion_informe'=>$descripcion_informe,
				'codigo_informe'=>$codigo_informe,
				'archivo_informe'=>$archivo_informe,
				'usuario_id_usuario'=>$usuario_id_usuario
	        	));
	    return $response; 
	}

	public static function buscar_informe($id_informe){
		$response = DB::table('informe')->where('id_informe',$id_informe)->first();
		return $response;
	}

	public static function eliminar_informe($id_informe){
		$query = DB::table('informe')->where('id_informe', '=', $id_informe)->delete();
		return $query;
	}

	public static function listar_informes($opcion,$usuario_id_usuario){
		switch ($opcion) {
			case 1:
				//listar todos 
				$response = DB::table('informe')
							->where('usuario_id_usuario',$usuario_id_usuario)
							->get();
				break;
			case 2:
				//listar todos ascendente 
				$response = DB::table('informe')
							->where('usuario_id_usuario',$usuario_id_usuario)
							->orderBy('id_informe','asc')
							->get();
				break;
			case 3:
				//listar todos descendente
				$response = DB::table('informe')
							->where('usuario_id_usuario',$usuario_id_usuario)
							->orderBy('id_informe','desc')
							->get();
				break;
			default :
				$response = -1;
				break;
		}
		return $response;
	}

	public static function listar_informes_todos($opcion){
		switch ($opcion) {
			case 1:
				//listar todos 
				$response = DB::table('informe')
							->get();
				break;
			case 2:
				//listar todos ascendente 
				$response = DB::table('informe')
							->orderBy('id_informe','asc')
							->get();
				break;
			case 3:
				//listar todos descendente
				$response = DB::table('informe')
							->orderBy('id_informe','desc')
							->get();
				break;
			default :
				$response = -1;
				break;
		}
		return $response;
	}	
}