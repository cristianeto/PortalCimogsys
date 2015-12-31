<?php 
class EstadoSilabo extends Eloquent { 
    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'estado_silabo';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	public $timestamps = false; 
	protected $fillable = array('id_estado_silabo','descripcion_estado_silabo');
}
