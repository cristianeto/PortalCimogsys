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

//rutas de configuracion
Route::get('/tipoUsuariosCrear',array('uses'=>'TipoUsuarioController@tipoUsuariosCrear'));
Route::get('/estadoSilaboCrear',array('uses'=>'EstadoSilaboController@estadoSilaboCrear'));

//Ruta de Inicio
Route::get('/',array('as'=>'inicio',function(){
	if(Auth::check()){
		 switch (Auth::User()->tipo_usuario) {
	        case 1:
	            return Redirect::to('/administrador/index'); 
	            break;
	        case 2:
	            return Redirect::to('/moderador/index');
	            break;
	        case 3:
	            return Redirect::to('/usuarios/index');    
	            break;
	        default:
				return View::make('inicio');
				break;
		}
	}else{
		return View::make('inicio');
	}
}));

//Rutas Login/Logout

Route::post('/login',['uses'=>'AuthController@login','before'=>'guest']);
Route::get('/logout',['uses'=>'AuthController@logout','before'=>'auth']);

//Rutas de Usuarios
Route::group(array('prefix'=>'usuarios'),function(){

	//Registro
	Route::get('/registro',array('as'=>'registro',function(){
		return View::make('usuario.registro');
	}));

	Route::post('/registrar',array('uses'=>'UserController@registro'));

	//Inicio
	Route::get('/index',array('as'=>'usuarioInicio',function(){
		return View::make('usuario.index');
	}));

	//Perfil
	Route::get('/perfil',array('as'=>'usuarioPerfil',function(){
		return View::make('usuario.perfil');
	})); 

	//Silabos 
	Route::post('/guardarSilabo',array('uses'=>'SilaboController@guardarSilabos'));
	Route::post('/mostrarSilabos',array('uses'=>'SilaboController@mostrarSilabos'));
	Route::get('/mostrarSilabo/{silabo}/{usuario}',array('uses'=>'SilaboController@mostrarSilaboUsuario'));	

	//Comentario
	Route::post('/guardarComentario',array('uses'=>'ComentarioController@guardarComentarioUsuario'));
});

//Rutas Moderador
Route::group(array('prefix'=>'moderador'),function(){
	
	//Inicio
	Route::get('/index',array('as'=>'moderadorInicio',function(){
		return View::make('moderador.index');
	}));

	//Perfil
	Route::get('/perfil',array('as'=>'moderadorPerfil',function(){
		return View::make('moderador.perfil');
	}));

	//Silabos
	Route::post('/mostrarTodosSilabos',array('uses'=>'SilaboController@mostrarTodosSilabos'));
	Route::get('/mostrarSilabo/{silabo}/{usuario}',array('uses'=>'SilaboController@mostrarSilaboModerador'));
	Route::post('/mostrarSilabosRevisados',array('uses'=>'SilaboController@mostrarSilabosRevisadosModerador'));
	Route::post('/mostrarSilabosPendientes',array('uses'=>'SilaboController@mostrarSilabosPendientesModerador'));

	//Comentarios
	Route::post('/guardarComentario',array('uses'=>'ComentarioController@guardarComentarioModerador'));
	Route::post('/cerrarActividad',array('uses'=>'SilaboController@cerrarActividad'));
});
 
//Rutas Comunes Usuario
Route::post('/guardarPerfil',array('uses'=>'UserController@guardarPerfil'));
Route::get('/listarComentarios/{silabo}',array('uses'=>'ComentarioController@listarComentarios'));