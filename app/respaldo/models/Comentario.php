<?php 
class Comentario extends Eloquent { 
    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'comentario';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	public $timestamps = false; 
	protected $fillable = array('id_comentario','de_comentario', 'para_comentario','detalle_comentario','fecha_comentario','silabo_comentario','moderador_comentario');
}
