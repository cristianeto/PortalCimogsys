<?php

class AuthController extends BaseController {

	//Función Login
	public function login(){
		//Reglas
    	$rules = array(
    		'iUsuario'=>'required',
    		'iPassword'=>'required'
    	);

    	//Mensajes
    	$messages = array(
    		'required'=>'El campo :attribute es obligatorio'
    	);

    	$validation = Validator::make(Input::all(), $rules, $messages);

    	if ($validation->fails()){
	    	return Redirect::to(URL::previous())->withInput()->withErrors($validation);
	    }else{
            $credenciales = array(
                'nick_usuario' => e(Input::get('iUsuario')),
                'password' => e(Input::get('iPassword'))
            );
            if(Auth::attempt($credenciales,Input::get('remember'))){
                $id_usuario = Auth::User()->id_usuario;
                $user = User::find($id_usuario);
                $user->estado_usuario = 1;
                $user->save();
                switch (Auth::User()->tipo_usuario) {
                    case 6://administrador
                        return Redirect::to('/admin/centro');
                        break;
                    case 2:
                        return Redirect::to('/moderador/index');
                        break;
                    case 3:
                        return Redirect::to('/usuarios/index');
                        break;
                    case 7://Comité académico
                        return Redirect::to('/acad/perfil');
                        break;
                    case 5://Pasante
                        return Redirect::to('/pasante/perfil');
                        break;
                }
            }else{
                return Redirect::to(URL::previous())->with('mensaje','Credenciales Inválidas');
            }
	    }
	}

    //Función Logout
    public function logout(){
        $id = Auth::User()->id_usuario;
        $user = User::find($id);
        $user->estado_usuario = 0;
        $user->save();
        Auth::logout();
        return Redirect::to('/');
    }

}
