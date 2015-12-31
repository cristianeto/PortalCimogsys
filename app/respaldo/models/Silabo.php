<?php 
class Silabo extends Eloquent { 
    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'silabo';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	public $timestamps = false;
	protected $fillable = array('id_silabo','nombre_silabo', 'path_silabo','usuario_silabo','estado_silabo','fec_silabo');
}
