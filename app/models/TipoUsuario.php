<?php
	
class TipoUsuario extends Eloquent{
	
	protected $table = 'tipo_usuario';
	public $timestamps = false; 
	protected $fillable = array('id_tipo_usuario','descripcion_tipo_usuario');

	public static function insertar_tipo_usuario($descripcion_tipo_usuario){
		$response = DB::table('tipo_usuario')->insert(['descripcion_tipo_usuario'=>$descripcion_tipo_usuario]);
		return $response;
	}

	public static function buscar_tipo_usuario($id_tipo_usuario){
		$response = DB::table('tipo_usuario')->where('id_tipo_usuario',$id_tipo_usuario)->first();
		return $response;
	}

	public static function eliminar_tipo_usuario($id_tipo_usuario){
		$query = DB::table('tipo_usuario')->where('id_tipo_usuario', '=', $id_tipo_usuario)->delete();
		return $query;
	}

	public static function listar_tipo_usuario($opcion){
		switch ($opcion) {
			case 1:
				//listar todos
				$response = DB::table('tipo_usuario')->get();
				break;
			case 2:
				//listar todos ascendente
				$response = DB::table('tipo_usuario')
									->orderBy('id_tipo_usuario','asc')
									->get();
				break;
			case 3:
				//listar todos descendente
				$response = DB::table('tipo_usuario')
									->orderBy('id_tipo_usuario','desc')
									->get();
				break;
			default :
				$response = -1;
				break;
		}
		return $response;
	}

	public static function actualizar_tipo_usuario($id_tipo_usuario,$descripcion_tipo_usuario){
		$response= DB::table('tipo_usuario')
            ->where('id_tipo_usuario', $id_tipo_usuario) 
            ->update(array('descripcion_tipo_usuario'=>$descripcion_tipo_usuario));
        return $response; 
	}
	
}
