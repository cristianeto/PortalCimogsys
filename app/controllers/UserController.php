b<?php

use Symfony\Component\HttpFoundation\JsonResponse;
use Illuminate\Support\MessageBag,
    Illuminate\Validation\Factory;

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

    public function visualizarIniciarSesion(){
        $centro = 0;
        $centro = Centro::buscar_centro(3);//Consulto mi centro... en nuestro caso el centro cimogsys con codigo 3
        if(count($centro)!=0){
                return View::make('iniciarSesion')->withCentro($centro);
        }else{
            return View::make('iniciarSesion')->withError('No existe el centro...');
        }
    }

    public function requestAction(){
        $centro = Centro::buscar_centro(3);
        $data = ["requested" => Input::old("requested")];
        if (Input::server("REQUEST_METHOD") == "POST"){
            $rules = array('correo' => "required|exists:usuario,correo_usuario" );
            $messages = array('exists' => "No se ha registrado la dirección de correo" );
            $validation = Validator::make(Input::all(),$rules,$messages);
            if ($validation->passes()){
                $credentials = ["correo_usuario" => Input::get("correo")];
                Password::remind($credentials,
                    function($message, $user){
                        $message->subject("CIMOGSYS - Restablecer Contraseña");
                    }
                );
                $data["requested"] = true;
                return Redirect::route("user/request")->withCentro($centro)->withInput($data)->with('mensaje','se ha enviado un mensaje a su correo');
            }else{
                return View::make("user/request", $data)->withCentro($centro)->withErrors($validation);
            }
        }
        return View::make("user/request", $data)->withCentro($centro);
    }

    public function resetAction(){
        $centro = Centro::buscar_centro(3);
        $token = Input::get("token");

        $errors = new MessageBag();

        if ($old = Input::old("errors")){
            $errors = $old;
        }

        $data = ["token" => $token,"errors" => $errors];

        if (Input::server("REQUEST_METHOD") == "POST"){

            $validator = Validator::make(Input::all(), [
                "email" => "required|email",
                "password" => "required|min:6",
                "password_confirmation" => "same:password",
                "token" => "exists:password_reminders,token"
            ]);

            if ($validator->passes()){
                $pass = Input::get("password");
                $pass_confirmation = Input::get("password_confirmation");
                $email = Input::get("email");
                $user = DB::table('usuario')->where('correo_usuario', $email)->first();
                //return new JsonResponse($user);
                $credentials = ["correo_usuario" => $email,"password" => $pass,"password_confirmation"=>$pass_confirmation,'token' => $token];

                //$credentials = Input::only('email', 'password', 'password_confirmation', 'token');

                //return new JsonResponse ($credentials);
                $response = Password::reset($credentials,function($user, $password){
                    $user->password = Hash::make($password);
                    //$user->password = $password;
                    $user->save();
                    /*$user = DB::table('usuario')
                        ->where('correo_usuario', $email)
                        ->update(array('password' => Hash::make($password)));
                    Auth::login($user);*/
                    return Redirect::route("usuarioInicio");
                });

                //reminders.user
                //reminders.password
                //reminders.token
                //reminders.reset

                return $response;
            }

            $data["email"] = Input::get("email");
            $data["errors"] = $validator->errors();
            return Redirect::to(URL::route("user/request").$token)->withInput($data)->withCentro($centro);
        }
        return View::make("user/reset", $data)->withCentro($centro);
    }

    public function visualizarAdminUsuarios(){
        $response = 0;
        $response = Centro::buscar_centro(3);
        if(count($response)!=0){
            $areas = AreaGestion::where('centro_area_gestion',3)->lists('nombre_area_gestion','id_area_gestion');
            //$areas = AreaGestion::listar_area_gestion(3,$centro);
            if(count($areas)!=0){
                $tipos= TipoUsuario::lists('descripcion_tipo_usuario', 'id_tipo_usuario');
                if(count($tipos)!=0){
                    return View::make('admin.usuarios')->with('usuarios',User::listar_usuarios(3))->withAreas($areas)->withTipos($tipos);
                }else{
                    return View::make('admin.usuarios')->with('error', 'No existen tipos de usuario');
                }
            }else{
                return View::make('admin.usuarios')->with('error','No existen áreas de gestión');
            }
        }else{
            return View::make('admin.usuarios')->with('error','No existe un centro de investigacion para ingresar proyectos');
        }
    }

    public function visualizarAcadPerfil(){
      $centro = 0;
  		$centro = Centro::buscar_centro(3);//Consulto mi centro... en nuestro caso el centro cimogsys con codigo 3
  		if(count($centro)!=0){
  				return View::make('acad/perfil')->withCentro($centro);
  		}else{
  			return View::make('acad/perfil')->withError('No existe el centro...');
  		}
    }
    public function visualizarAcadEditar(){
      $centro = 0;
  		$centro = Centro::buscar_centro(3);//Consulto mi centro... en nuestro caso el centro cimogsys con codigo 3
  		if(count($centro)!=0){
          $areas=AreaGestion::lists('nombre_area_gestion','id_area_gestion');
          if(count($areas)>0){
            $tipos = TipoUsuario::lists('descripcion_tipo_usuario','id_tipo_usuario');
            if(count($tipos)>0){
  				    return View::make('acad/editar')->withCentro($centro)->withAreas($areas)->withTipos($tipos);
            }else{
              return View::make('acad/editar')->withError('No existen tipos de usuario en el centro...');
            }
          }else{
              return View::make('acad/editar')->withError('No existen áreas de gestión en el centro...');
          }
  		}else{
  			return View::make('acad/editar')->withError('No existe el centro...');
  		}
    }
    public function visualizarPasanPerfil(){
      $centro = 0;
  		$centro = Centro::buscar_centro(3);//Consulto mi centro... en nuestro caso el centro cimogsys con codigo 3
  		if(count($centro)!=0){
  				return View::make('pasante/perfil')->withCentro($centro);
  		}else{
  			return View::make('pasante/perfil')->withError('No existe el centro...');
  		}
    }
    public function visualizarPasanEditar(){
      $centro = 0;
  		$centro = Centro::buscar_centro(3);//Consulto mi centro... en nuestro caso el centro cimogsys con codigo 3
  		if(count($centro)!=0){
          $areas=AreaGestion::lists('nombre_area_gestion','id_area_gestion');
          if(count($areas)>0){
            $tipos = TipoUsuario::lists('descripcion_tipo_usuario','id_tipo_usuario');
            if(count($tipos)>0){
  				    return View::make('pasante/editar')->withCentro($centro)->withAreas($areas)->withTipos($tipos);
            }else{
              return View::make('pasante/editar')->withError('No existen tipos de usuario en el centro...');
            }
          }else{
              return View::make('pasante/editar')->withError('No existen áreas de gestión en el centro...');
          }
  		}else{
  			return View::make('pasante/editar')->withError('No existe el centro...');
  		}
    }
}
