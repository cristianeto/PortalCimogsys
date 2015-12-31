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

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */

	public $timestamps = false; 
	protected $fillable = array('id','nombres_usuario', 'correo_usuario','telefono_usuario','curriculo_usuario','edad_usuario','genero_usuario','estado_usuario','tipo_usuario');
	protected $hidden = array('password', 'remember_token');

	public static function insertar_usuario($nombres,$password,$email,$genero,$edad){
		$query = DB::table('usuario')->insert(array(
		      'nombres_usuario'  => $nombres,
		      'password' => $password,
		      'correo_usuario' => $email,
		      'genero_usuario' => $genero,
		      'edad_usuario'=>$edad,
		      'tipo_usuario'=>3,
		      'estado_usuario'=>1
		));
		return $query;
  	}   

}
