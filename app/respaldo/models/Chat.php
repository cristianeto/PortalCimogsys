<?php 
class Chat extends Eloquent { 
    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'chat';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	public $timestamps = false; 
	protected $fillable = array('id_chat','de_chat','para_chat','mensaje_chat','enviado_chat','recibido_chat');
}
