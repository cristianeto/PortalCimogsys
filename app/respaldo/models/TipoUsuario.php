<?php 
class TipoUsuario extends Eloquent { 
    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'tipo_usuario';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	public $timestamps = false;
	protected $fillable = array('id_tipo_usuario','descripcion_tipo_usuario');
}
