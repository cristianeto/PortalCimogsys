<?php

use Symfony\Component\HttpFoundation\JsonResponse;

class UsuarioController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function registro(){
		//Campos
        $nombresApellidos = e(Input::get('nombresApellidos'));
        $edad = e(Input::get('edad'));
        $correo = e(Input::get('correo'));
        $password = Hash::make(e(Input::get('password')));
        $genero = e(Input::get('genero'));

    	//Reglas
    	$rules = array(
    		'nombresApellidos'=>'required|regex:/^([a-zA-z])/',
    		'edad'=>'required|regex:/^([0-9])/',
    		'correo'=>'required|regex:/^([a-zA-Z0-9])+@espoch.edu.ec/|unique:usuario,usuario_correo',
    		'password'=>'required',
    		'genero'=>'required|in:Masculino,Femenino'
    	);

    	//Mensajes
    	$messages = array(
    		'required'=>'El campo :attribute es obligatorio',
    		'correo'=>'El campo :attribute debe ser un email institucional',
    		'in'=>'Seleccione una opción válida',
    		'unique'=>'El correo electrónico ya fue registrado'
    	);

    	$validation = Validator::make(Input::all(), $rules, $messages);

    	if ($validation->fails()){
	    	return Redirect::to(URL::previous())->withInput()->withErrors($validation);
	    }else{
            $insertar = User::insertar_usuario($nombresApellidos,$password,$correo,$genero,$edad);
            if($insertar)
            {
                return Redirect::to(URL::previous())->with('mensaje', 'Usuario Registrado Corrrectamente');
            }else{
                return Redirect::to(URL::previous())->with('mensaje', 'Ha ocurido un error');
            }
	    }
	}

    public function guardarPerfil(){
        //Campos
        $nombresApellidos = e(Input::get('nombresApellidos'));
        $telefono = e(Input::get('telefono'));
        $edad = e(Input::get('edad'));
        $correo = e(Input::get('correo'));
        $genero = e(Input::get('genero'));

        //Reglas
        $rules = array(
            'nombresApellidos'=>'required|regex:/^([a-zA-z])/',
            'edad'=>'regex:/^([0-9])/',
            'telefono'=>'regex:/^([0-9])/',
            'correo'=>'regex:/^([a-zA-Z0-9])+@espoch.edu.ec/',
            'genero'=>'in:Masculino,Femenino'
        );

        //Mensajes
        $messages = array(
            'required'=>'El campo :attribute es obligatorio',
            'correo'=>'El campo :attribute debe ser un email institucional',
            'in'=>'Seleccione una opción válida',
            'unique'=>'El correo electrónico ya fue registrado'
        );

        $validation = Validator::make(Input::all(), $rules, $messages);

        if ($validation->fails()){
            return Redirect::to(URL::previous())->withInput()->withErrors($validation);
        }else{
            $actualizar = User::actualizar_usuario($nombresApellidos,$telefono,$edad,$correo,$genero,Auth::User()->id);
            if($actualizar)
            {
                return Redirect::to(URL::previous())->with('mensaje', 'Perfil Actualizado Corrrectamente');
            }else{
                return Redirect::to(URL::previous())->with('mensaje', 'Ha ocurido un error');
            }   
        }
    }
}