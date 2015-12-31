<?php

class AuthController extends BaseController {

	//Función Login
	public function login(){
		//Reglas
    	$rules = array(
    		'iCorreo'=>'required|regex:/^([a-zA-Z0-9])+@espoch.edu.ec/',
    		'iPassword'=>'required'
    	);

    	//Mensajes
    	$messages = array(
    		'required'=>'El campo :attribute es obligatorio',
    		'correo'=>'El campo :attribute debe ser un email institucional'
    	);

    	$validation = Validator::make(Input::all(), $rules, $messages);

    	if ($validation->fails()){
	    	return Redirect::to(URL::previous())->withInput()->withErrors($validation);
	    }else{
            $credenciales = array(
                'correo_usuario' => e(Input::get('iCorreo')),
                'password' => e(Input::get('iPassword'))
            );
            if(Auth::attempt($credenciales)){
                $id = Auth::User()->id;
                $user = User::find($id);
                $user->estado_usuario = 1;
                $user->save();
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
	    }
	}

    //Función Logout
    public function logout(){
        
        $id = Auth::User()->id;
        $user = User::find($id);
        $user->estado_usuario = 0;
        $user->save();

        Auth::logout();
        return Redirect::to('/');
    }

}