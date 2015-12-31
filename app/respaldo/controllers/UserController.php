<?php

use Symfony\Component\HttpFoundation\JsonResponse;

class UserController extends BaseController {

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
    		'correo'=>'required|regex:/^([a-zA-Z0-9])+@espoch.edu.ec/|unique:usuario,correo_usuario',
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
                $credenciales = array(
                    'correo_usuario' => $correo,
                    'password' => Input::get('password')
                );

                if(Auth::attempt($credenciales)){
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
                    }
                }else{
                    return Redirect::to(URL::previous())->with('mensaje','Credenciales Inválidas');
                }              
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
            $usuario = User::find(Auth::User()->id);
            $usuario->nombres_usuario = $nombresApellidos;
            $usuario->telefono_usuario = $telefono;
            $usuario->edad_usuario = $edad;
            $usuario->correo_usuario = $correo;
            $usuario->genero_usuario = $genero;
            $usuario->save();
            return Redirect::to(URL::previous())->with('mensaje', 'Perfil Actualizado Corrrectamente');
        }
    }
}