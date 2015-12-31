<?php

use Symfony\Component\HttpFoundation\JsonResponse;

class SilaboController extends BaseController {


	public function guardarSilabos(){

        Input::file('silabo');
        $response['respuesta']=false;
        $file = Input::file('silabo');
        $extension = $file->getClientOriginalExtension();
        $extension_validas = array("pdf");

        if (in_array($extension, $extension_validas)) {

            $path = "silabos/" . $file->getClientOriginalName();
            Input::file('silabo')->move('silabos', $file->getClientOriginalName());
        
            $input = array(
                'nombre_silabo' => $file->getClientOriginalName(),
                'path_silabo' => $path,
                'usuario_silabo' => Auth::User()->id,
                'estado_silabo' => 1,
                'fec_silabo' => date('Y-m-d G:i:s')
            );

            Silabo::create($input);

            return Redirect::to(URL::previous())->with('mensaje1', 'Archivo Subido Corrrectamente');
        }else{
            return Redirect::to(URL::previous())->with('mensaje2', 'Formato de Archivo no Válido');
        }
    } 

	public function mostrarSilabos(){
        $cont = Input::get('cont');
        $indice = DB::table('silabo')->count();
        if($cont<$indice){
        	$usuario_silabo = Auth::User()->id;
            $files = DB::select('SELECT id_silabo,nombre_silabo,path_silabo,estado_silabo,usuario_silabo from silabo where (id_silabo >'.$cont.') and (usuario_silabo ='.Auth::User()->id.') order by id_silabo desc');
            Return new JsonResponse($files);
        }else{
            $files = false;
            Return new JsonResponse($files);
        }
    }

    public function mostrarTodosSilabos(){
        $files = DB::select('SELECT id_silabo,nombre_silabo,path_silabo,usuario_silabo,estado_silabo,nombres_usuario,genero_usuario from silabo join usuario on usuario.id = usuario_silabo where (estado_silabo = 1)');
        Return new JsonResponse($files);
    }

    public function mostrarSilaboUsuario($silabo,$usuario){
        if(Auth::check())
        {
            $estado = DB::select('SELECT estado_silabo, nombre_silabo from silabo where id_silabo = '.$silabo);
            $estado = json_encode($estado);
            $estado = json_decode($estado,true);
            $est = $estado[0]['estado_silabo'];
            $est1 = $estado[0]['nombre_silabo'];
            
            if($est == 2){
                return View::make('usuario.blog')->with(array('silabo'=>$silabo,'path'=>$est1)); 
            }else{
                $response['actividad']="Cerrada";
                Return new JsonResponse($response); 
            }

        } 
    }

    public function mostrarSilaboModerador($silabo,$usuario){
        if(Auth::check())
        {
            $estado = DB::select('SELECT estado_silabo, nombre_silabo from silabo where id_silabo = '.$silabo);
            $estado = json_encode($estado);
            $estado = json_decode($estado,true);
            $est = $estado[0]['estado_silabo'];
            $est1 = $estado[0]['nombre_silabo'];
            if((Auth::User()->tipo_usuario==2)and($est==1)){
                DB::table('silabo')->where('id_silabo', $silabo)->update(array('estado_silabo' => 2));
                                
                $input = array(
                    'de_comentario'=>Auth::User()->id,
                    'para_comentario'=>$usuario,
                    'detalle_comentario'=> "Sesión de Revisión Iniciada por el Moderador",
                    'fecha_comentario'=> date('Y-m-d G:i:s'),
                    'silabo_comentario'=> $silabo,
                    'moderador_comentario' => Auth::User()->id
                );
                
                Comentario::create($input);

                return View::make('moderador.blog')->with(array('silabo'=>$silabo,'path'=>$est1)); 
            }else{
                if($est==3){
                    $response['actividad']="Cerrada";
                    Return new JsonResponse($response); 
                }else{
                    return View::make('moderador.blog')->with(array('silabo'=>$silabo,'path'=>$est1)); 
                }
            }
        }
    }

    public function cerrarActividad(){
        if(Auth::user()->tipo_usuario==2){
            $silabo = e(Input::get('silabo'));
            DB::table('silabo')->where('id_silabo', $silabo)->update(array('estado_silabo' => 3));
            $response['respuesta'] = true;
            Return new JsonResponse($response);
        }else{
            $respone['respuesta'] = false;
            Return new JsonResponse($response);
        }
    }

    public function mostrarSilabosRevisadosModerador(){
        $files = DB::select('SELECT id_silabo,nombre_silabo,path_silabo,usuario_silabo,
            estado_silabo,nombres_usuario 
            from silabo join usuario on usuario.id = usuario_silabo
            where (estado_silabo = 3)');
        Return new JsonResponse($files);
    }


    public function mostrarSilabosPendientesModerador(){
        $files = DB::select('SELECT id_silabo,nombre_silabo,path_silabo,usuario_silabo,
            estado_silabo,nombres_usuario from silabo join usuario on usuario.id = usuario_silabo where (estado_silabo = 2)');
        $control = DB::select('SELECT COUNT(id_comentario) form comentario where silabo_comentario = 1');
        Return new JsonResponse($files);
    }

}