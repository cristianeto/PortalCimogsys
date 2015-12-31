<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'usuario';
	protected $primaryKey = 'id_usuario';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array 
	 */

	public $timestamps = false; 
	protected $fillable = array('id_usuario', 'ci_usuario', 'nick_usuario', 'nombres_usuario', 'apellidos_usuario', 'correo_usuario', 'telefono_usuario', 'genero_usuario', 'img_formal_usuario', 'img_informal_usuario', 'fecha_nacimiento_usuario', 'area_gestion_usuario', 'tipo_usuario', 'estado_usuario', 'disponible_usuario');
	protected $hidden = array('password', 'remember_token');

	public static function codigo_nuevo_usuario(){
		$maximo=0;
		$maximo = (DB::table('usuario')->max('id_usuario'))+1;
		if(count($maximo)!=0){
			return $maximo;
		}else{
			return 1;
		}
	}

	public static function insertar_usuario($id_usuario, $ci_usuario, $nick_usuario, $nombres_usuario, $apellidos_usuario, $password, $correo_usuario, $telefono_usuario, $genero_usuario, $img_formal_usuario, $img_informal_usuario, $fecha_nacimiento_usuario, $area_gestion_usuario, $tipo_usuario){
		$query = DB::table('usuario')->insert(array(
			'id_usuario' => $id_usuario,
		    'ci_usuario'  => $ci_usuario,
		    'nick_usuario' => $nick_usuario,
		    'nombres_usuario' => $nombres_usuario,
		    'apellidos_usuario' => $apellidos_usuario,
		    'password'=>$password,
		    'correo_usuario'=>$correo_usuario,
		    'telefono_usuario'=>$telefono_usuario,
		    'genero_usuario'=>$genero_usuario,
		    'telefono_usuario'=>$telefono_usuario,
		    'img_formal_usuario'=>$img_formal_usuario,
		    'img_informal_usuario'=>$img_informal_usuario,
		    'fecha_nacimiento_usuario'=>$fecha_nacimiento_usuario,
		    'area_gestion_usuario'=>$area_gestion_usuario,
		    'tipo_usuario'=>$tipo_usuario,
		    'estado_usuario'=>1,
		    'disponible_usuario' => 0
		));

		return $query;
  	} 


  	public static function actualizar_usuario($id_usuario, $ci_usuario, $nick_usuario, $nombres_usuario, $apellidos_usuario, $password, $correo_usuario, $telefono_usuario, $genero_usuario, $img_formal_usuario, $img_informal_usuario, $fecha_nacimiento_usuario, $area_gestion_usuario, $tipo_usuario){
		$response= DB::table('usuario')
	        ->where('id_usuario', $id_usuario)
	        ->update(array(
	        	'ci_usuario'  => $ci_usuario,
		      	'nick_usuario' => $nick_usuario,
		      	'nombres_usuario' => $nombres_usuario,
		      	'apellidos_usuario' => $apellidos_usuario,
		      	'password'=>$password,
		      	'correo_usuario'=>$correo_usuario,
		      	'telefono_usuario'=>$telefono_usuario,
		      	'genero_usuario'=>$genero_usuario,
		      	'telefono_usuario'=>$telefono_usuario,
		      	'img_formal_usuario'=>$img_formal_usuario,
		      	'img_informal_usuario'=>$img_informal_usuario,
		      	'fecha_nacimiento_usuario'=>$fecha_nacimiento_usuario,
		      	'area_gestion_usuario'=>$area_gestion_usuario,
		      	'tipo_usuario'=>$tipo_usuario,
		      	'estado_usuario'=>1
	        	));
	    return $response; 
  	}


  	public static function buscar_usuario($id_usuario){
		$response = DB::table('usuario')->where('id_usuario',$id_usuario)->first();
		return $response;
	}

	public static function eliminar_usuario($id_usuario){
		$query = DB::table('usuario')->where('id_usuario', '=', $id_usuario)->delete();
		return $query;
	}    

	public static function listar_usuarios($opcion){
		switch ($opcion) {
			case 1:
				//listar todos 
				$response = DB::table('usuario')
							->get();
				break;
			case 2:
				//listar todos ascendente 
				$response = DB::table('usuario')
							->orderBy('id_usuario','asc')
							->get();
				break;
			case 3:
				//listar todos descendente
				$response = DB::table('usuario')
							->orderBy('id_usuario','desc')
							->get();
				break;
			default :
				$response = -1;
				break;
		}
		return $response;
	}

	public function getReminderEmail(){
		return $this->correo_usuario;
	}
}
