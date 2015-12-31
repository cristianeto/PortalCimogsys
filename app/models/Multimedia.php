<?php
/**
* @Author: Cristianeto 
*
*/
class Multimedia extends Eloquent
{
	protected $table = 'multimedia';
	public $timestamps = false; 
	protected $fillable = array(
		'id_multimedia','enlace_multimedia','descripcion_multimedia',
		'tipo_multimedia','noticia_multimedia'
		);

	public static function insertar_multimedia($enlace_multimedia,$descripcion_multimedia,$tipo_multimedia,$noticia_multimedia){
		$response = DB::table('multimedia')
					->insert([
						'enlace_multimedia'=>$enlace_multimedia,
						'descripcion_multimedia'=>$descripcion_multimedia,
						'tipo_multimedia'=>$tipo_multimedia,
						'noticia_multimedia'=>$noticia_multimedia,
						]);
		return $response;
	}

	public static function buscar_multimedia($id_multimedia){
		$response = DB::table('multimedia')->where('id_multimedia',$id_multimedia)->first();
		return $response;
	}

	public static function eliminar_multimedia($id_multimedia){
		$query = DB::table('multimedia')->where('id_multimedia', '=', $id_multimedia)->delete();
		return $query;
	}

	public static function listar_multimedias($opcion, $noticia_multimedia){
		switch ($opcion) {
			case 1:
				//listar todos 
				$response = DB::table('multimedia')
							->where('noticia_multimedia',$noticia_multimedia)
							->get();
				break;
			case 2:
				//listar todos ascendente 
				$response = DB::table('multimedia')
							->where('noticia_multimedia',$noticia_multimedia)
							->orderBy('id_multimedia','asc')
							->get();
				break;
			case 3:
				//listar todos descendente
				$response = DB::table('multimedia')
							->where('noticia_multimedia',$noticia_multimedia)
							->orderBy('id_multimedia','desc')
							->get();
				break;
			default :
				$response = -1;
				break;
		}
		return $response;
	}

	public static function actualizar_multimedia($id_multimedia,$enlace_multimedia,$descripcion_multimedia,$tipo_multimedia,$noticia_multimedia){
		$response= DB::table('multimedia')
	        ->where('id_multimedia', $id_multimedia)
	        ->update(array(
	        	'enlace_multimedia'=>$enlace_multimedia,
				'descripcion_multimedia'=>$descripcion_multimedia,
				'tipo_multimedia'=>$tipo_multimedia,
				'noticia_multimedia'=>$noticia_multimedia
	        	));
	    return $response; 
	}
}