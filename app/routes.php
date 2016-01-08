<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

//Emails
Route::get('mail', function(){
	/*Mail::send('inicio', $data, function($message){
	    $message->to('area_grafica@cimogsys.com', 'John Smith')->subject('Welcome!');
	});*/
	
	$data = array('Saludo' => 'Holi' );

	Mail::send('user/request',$data, function($message){
	    $message->to('faustocevallos@outlook.com', 'Fausto Cevallos')->subject('Welcome!');
	});
});
//Ruta de Inicio
/* INICIO PAGINAS PRINCIPALES*/
//Página Principal Inicio
Route::get('/',array('as'=>'inicio', 'uses'=>'InicioController@visualizarInicio'));
//Página Misión y Visión
Route::get('/misionVision',array('as'=>'misionVision', 'uses'=>'MisionVisionController@visualizarMisionVision'));
//Página Objetivos
Route::get('/objetivos',array('as'=>'objetivos', 'uses'=>'ObjetivosController@visualizarObjetivos'));
//Página Líneas Investigación 
Route::get('/lineasInvestigacion',array('as'=>'lineasInvestigacion','uses'=>'LineasInvestigacionController@visualizarLineas'));
//Página Quienes Somos
Route::get('/quienesSomos',array('as'=>'quienesSomos','uses'=>'QuienesSomosController@visualizarQuienesSomos'));
//Página Proyectos
Route::get('/proyectos',array('as'=>'proyectos','uses'=>'ProyectosController@visualizarProyectos'));
//Página Contactos
Route::get('/contactos',array('as'=>'contactos','uses'=>'ContactosController@visualizarContactos'));
//Página Noticias
Route::get('/noticias',array('as'=>'noticias','uses'=>'NoticiaController@visualizarNoticias'));
//Página Iniciar Sesión
Route::get('/iniciarSesion',array('as'=>'iniciarSesion','uses'=>'UserController@visualizarIniciarSesion'));
Route::post('/login',['uses'=>'AuthController@login','before'=>'guest']);
Route::get('/logout',['uses'=>'AuthController@logout','before'=>'auth']);

//Reestablecer Contraseñas
Route::any("/request",["as"=>"user/request","uses" => "UserController@requestAction"]);
Route::any("/reset",["as"=>"user/reset","uses" => "UserController@resetAction" ]);

/* FIN PAGINAS PRINCIPALES*/ 

/* INICIO PÁGINAS ADMINISTRACIÓN*/
Route::get('/admin/centro',array('as'=>'admCentro','uses'=>'CentroController@visualizarAdminCentro'));
Route::get('/admin/misionVision',array('as'=>'admin/misionVision','uses'=>'MisionVisionController@visualizarAdminMisionVision'));
Route::post('/admin/actualizarMisionVision',array('as'=>'admin/actualizarMisionVision','uses'=>'MisionVisionController@actualizarMisionVision'));
Route::get('/admin/objetivos',array('as'=>'admObjetivos','uses'=>'ObjetivosController@visualizarAdminObjetivos'));
Route::post('/admin/actualizarObjetivoGeneral',array('as'=>'admActualizarObjetivoG','uses'=>'ObjetivosController@actualizarObjetivoGeneral'));
Route::post('/admin/guardarObjetivoEspecifico',array('as'=>'admGuardarObjetivoE','uses'=>'ObjetivosController@guardarObjetivoEspecifico'));
Route::post('/admin/actualizarObjetivoEspecifico',array('as'=>'admActualizarObjetivoE','uses'=>'ObjetivosController@actualizarObjetivoEspecifico'));
Route::post('/admin/eliminarObjetivoEspecifico',array('as'=>'admEliminarObjetivoE','uses'=>'ObjetivosController@eliminarObjetivoEspecifico'));
//beneficiarios	
Route::get('/admin/beneficiarios',array('as'=>'admBeneficiarios','uses'=>'BeneficiariosController@visualizarAdminBeneficiarios'));
//lineas	
Route::get('/admin/lineasInvestigacion',array('as'=>'admLineas','uses'=>'LineasInvestigacionController@visualizarAdminLineas'));
//redes sociales	
Route::get('/admin/redesSociales',array('as'=>'admRedesSociales','uses'=>'RedesSocialesController@visualizarAdminRedes'));
//areas gestion	
Route::get('/admin/areasGestion',array('as'=>'admAreas','uses'=>'AreaGestionController@visualizarAdminAreas'));
//usuarios
 Route::get('/admin/usuarios',array('as'=>'admUsuarios','uses'=>'UserController@visualizarAdminUsuarios'));
//informes
 Route::get('/admin/informes',array('as'=>'admInformes','uses'=>'InformesController@visualizarAdminInformes'));
//proyectos	
Route::get('/admin/proyectos',array('as'=>'admProyectos','uses'=>'ProyectosController@visualizarAdminProyectos'));
//noticias	
Route::get('/admin/noticias',array('as'=>'admNoticias','uses'=>'NoticiaController@visualizarAdminNoticias'));
//multimedia	
Route::get('/admin/multimedia',array('as'=>'admMultimedia','uses'=>'MultimediaController@visualizarAdminMultimedia'));
/* FIN PÁGINAS ADMINISTRACIÓN*/


//Pruebas
Route::group(array('prefix'=>'pruebas'),function(){

	//TipoUsuario
	Route::get('/ingresarTipoUsuario',array('as'=>'ingresarTipoUsuario',function(){
		$response = TipoUsuario::listar_tipo_usuario(1);
		return View::make('pruebas.tipoUsuario',array('tiposUsuario'=>$response));
	}));


	Route::post('/guardarTipoUsuario',array('uses'=>'TestController@guardarTipoUsuario'));
	Route::post('/actualizarTipoUsuario',array('uses'=>'TestController@actualizarTipoUsuario'));
	Route::post('/eliminarTipoUsuario',array('uses'=>'TestController@eliminarTipoUsuario'));
	Route::post('/buscarTipoUsuario',array('uses'=>'TestController@buscarTipoUsuario'));

	//TipoMultimedia
	Route::get('/ingresarTipoMultimedia',array('as'=>'ingresarTipoMultimedia',function(){
		$response = TipoMultimedia::listar_tipo_multimedia(3);
		return View::make('pruebas.tipoMultimedia',array('tiposMultimedia'=>$response));
	}));


	Route::post('/guardarTipoMultimedia',array('uses'=>'TestController@guardarTipoMultimedia'));
	Route::post('/actualizarTipoMultimedia',array('uses'=>'TestController@actualizarTipoMultimedia'));
	Route::post('/eliminarTipoMultimedia',array('uses'=>'TestController@eliminarTipoMultimedia'));
	Route::post('/buscarTipoMultimedia',array('uses'=>'TestController@buscarTipoMultimedia'));

	//TipoLineaInvestigacion
	Route::get('/ingresarTipoLineaInvestigacion',array('as'=>'ingresarTipoLineaInvestigacion',function(){
		$response = TipoLineaInvestigacion::listar_tipo_linea_investigacion(2);
		return View::make('pruebas.tipoLineaInvestigacion',array('tiposLineaInvestigacion'=>$response));
	}));


	Route::post('/guardarTipoLineaInvestigacion',array('uses'=>'TestController@guardarTipoLineaInvestigacion'));
	Route::post('/actualizarTipoLineaInvestigacion',array('uses'=>'TestController@actualizarTipoLineaInvestigacion'));
	Route::post('/eliminarTipoLineaInvestigacion',array('uses'=>'TestController@eliminarTipoLineaInvestigacion'));
	Route::post('/buscarTipoLineaInvestigacion',array('uses'=>'TestController@buscarTipoLineaInvestigacion'));

	//Centro
	Route::get('/ingresarCentro',array('as'=>'ingresarCentro',function(){
		$response = Centro::listar_centro(2);
		return View::make('pruebas.centro',array('centros'=>$response));
	}));


	Route::post('/guardarCentro',array('uses'=>'TestController@guardarCentro'));
	Route::post('/actualizarCentro',array('uses'=>'TestController@actualizarCentro'));
	Route::post('/eliminarCentro',array('uses'=>'TestController@eliminarCentro'));
	Route::post('/buscarCentro',array('uses'=>'TestController@buscarCentro'));

	//Objetivos
	Route::get('/ingresarObjetivos/{centro}',array('uses'=>'TestController@ingresarObjetivos'));
	Route::post('/guardarObjetivos',array('uses'=>'TestController@guardarObjetivos'));
	Route::post('/actualizarObjetivos',array('uses'=>'TestController@actualizarObjetivos'));
	Route::post('/eliminarObjetivos',array('uses'=>'TestController@eliminarObjetivos'));
	Route::post('/buscarObjetivos',array('uses'=>'TestController@buscarObjetivos'));

	//Redes Sociales
	Route::get('/ingresarRedesSociales/{centro}',array('uses'=>'TestController@ingresarRedesSociales'));
	Route::post('/guardarRedesSociales',array('uses'=>'TestController@guardarRedesSociales'));
	Route::post('/actualizarRedesSociales',array('uses'=>'TestController@actualizarRedesSociales'));
	Route::post('/eliminarRedesSociales',array('uses'=>'TestController@eliminarRedesSociales'));
	Route::post('/buscarRedesSociales',array('uses'=>'TestController@buscarRedesSociales'));

	//Beneficiarios
	Route::get('/ingresarBeneficiarios/{centro}',array('uses'=>'TestController@ingresarBeneficiarios'));
	Route::post('/guardarBeneficiarios',array('uses'=>'TestController@guardarBeneficiarios'));
	Route::post('/actualizarBeneficiarios',array('uses'=>'TestController@actualizarBeneficiarios'));
	Route::post('/eliminarBeneficiarios',array('uses'=>'TestController@eliminarBeneficiarios'));
	Route::post('/buscarBeneficiarios',array('uses'=>'TestController@buscarBeneficiarios'));
	
	//Área de Gestión
	Route::get('/ingresarAreaGestion/{centro}',array('uses'=>'TestController@ingresarAreaGestion'));
	Route::post('/guardarAreaGestion',array('uses'=>'TestController@guardarAreaGestion'));
	Route::post('/actualizarAreaGestion',array('uses'=>'TestController@actualizarAreaGestion'));
	Route::post('/eliminarAreaGestion',array('uses'=>'TestController@eliminarAreaGestion'));
	Route::post('/buscarAreaGestion',array('uses'=>'TestController@buscarAreaGestion'));

	//Línea Investigación
	Route::get('/ingresarLineaInvestigacion/{centro}',array('uses'=>'TestController@ingresarLineaInvestigacion'));
	Route::post('/guardarLineaInvestigacion',array('uses'=>'TestController@guardarLineaInvestigacion'));
	Route::post('/actualizarLineaInvestigacion',array('uses'=>'TestController@actualizarLineaInvestigacion'));
	Route::post('/eliminarLineaInvestigacion',array('uses'=>'TestController@eliminarLineaInvestigacion'));
	Route::post('/buscarLineaInvestigacion',array('uses'=>'TestController@buscarLineaInvestigacion'));
 
 	//Proyectos
	Route::get('/ingresarProyectos/{centro}/{area}',array('uses'=>'TestController@ingresarProyectos'));
	Route::post('/guardarProyectos',array('uses'=>'TestController@guardarProyectos'));
	Route::post('/actualizarProyectos',array('uses'=>'TestController@actualizarProyectos'));
	Route::post('/eliminarProyectos',array('uses'=>'TestController@eliminarProyectos'));
	Route::post('/buscarProyectos',array('uses'=>'TestController@buscarProyectos'));

	//Noticia
	Route::get('/ingresarNoticia/{centro}/{area}',array('uses'=>'TestController@ingresarNoticia'));
	Route::post('/guardarNoticia',array('uses'=>'TestController@guardarNoticia'));
	Route::post('/actualizarNoticia',array('uses'=>'TestController@actualizarNoticia'));
	Route::post('/eliminarNoticia',array('uses'=>'TestController@eliminarNoticia'));
	Route::post('/buscarNoticia',array('uses'=>'TestController@buscarNoticia'));


	//Multimedia
	Route::get('/ingresarMultimedia/{noticia}',array('uses'=>'TestController@ingresarMultimedia'));
	Route::post('/guardarMultimedia',array('uses'=>'TestController@guardarMultimedia'));
	Route::post('/actualizarMultimedia',array('uses'=>'TestController@actualizarMultimedia'));
	Route::post('/eliminarMultimedia',array('uses'=>'TestController@eliminarMultimedia'));
	Route::post('/buscarMultimedia',array('uses'=>'TestController@buscarMultimedia'));


	//Usuario
	Route::get('/listarUsuario/{centro}',array('uses'=>'TestController@listarUsuario'));
	Route::post('/guardarUsuario',array('uses'=>'TestController@guardarUsuario'));
	Route::post('/actualizarUsuario',array('uses'=>'TestController@actualizarUsuario'));
	Route::post('/eliminarUsuario',array('uses'=>'TestController@eliminarUsuario'));
	Route::post('/buscarUsuario',array('uses'=>'TestController@buscarUsuario'));

	//Informes
	Route::get('/listarInformes/{Usuario}',array('uses'=>'TestController@listarInformes'));
	Route::post('/guardarInforme',array('uses'=>'TestController@guardarInforme'));
	Route::post('/actualizarInforme',array('uses'=>'TestController@actualizarInforme'));
	Route::post('/eliminarInforme',array('uses'=>'TestController@eliminarInforme'));
	Route::post('/buscarInforme',array('uses'=>'TestController@buscarInforme'));




 
});