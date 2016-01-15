<?php

use Symfony\Component\HttpFoundation\JsonResponse;

class InformesController  extends BaseController{


	public function visualizarAdminInformes(){
		$response = 0;
		$response = Centro::buscar_centro(3);
		if(count($response)!=0){
				return View::make('admin.informes')->withInformes(Informe::listar_informes_todos(3));
		}else{
			return View::make('admin.informes')->withError('No existe un Centro de investigación válido');
		}
	}
	public function visualizarPasanReportes(){
		$response = 0;
		$response = Centro::buscar_centro(3);
		if(count($response)!=0){
			$areas = AreaGestion::listar_area_gestion(3,3);
			if(count($areas)>0){
				$usuarios=User::listar_usuarios(3);
				if(count($usuarios)>0){
					$informes=DB::table('informe')
						->join('usuario', 'informe.usuario_id_usuario', '=', 'usuario.id_usuario')
						->join('area_gestion', 'usuario.area_gestion_usuario', '=', 'area_gestion.id_area_gestion')
						->join('tipo_usuario', 'usuario.tipo_usuario', '=', 'tipo_usuario.id_tipo_usuario')
						->where('id_usuario','=',Auth::user()->id_usuario)
						->select('informe.id_informe', 'informe.descripcion_informe', 'informe.codigo_informe', 'informe.archivo_informe', 'informe.fecha_entrega_informe', 'informe.fecha_modificacion_informe', 'informe.usuario_id_usuario','usuario.nombres_usuario','usuario.apellidos_usuario', 'area_gestion.nombre_area_gestion','tipo_usuario.descripcion_tipo_usuario')
						->get();
						//return json_encode($informes);
					return View::make('pasante.reportes')->withInformes($informes)->withAreas($areas)->withUsuarios($usuarios);
				}else{
					return View::make('pasante.reportes')->withError('No existen Usuarios en el centro de investigación');
				}
			}else{
				return View::make('pasante.reportes')->withError('No existen areas en el centro de investigación');
			}
		}else{
			return View::make('pasante.reportes')->withError('No existe un Centro de investigación válido');
		}
	}
	public function visualizarAcadReportes(){
		$response = 0;
		$response = Centro::buscar_centro(3);
		if(count($response)!=0){
			$areas = AreaGestion::listar_area_gestion(3,3);
			if(count($areas)>0){
				$usuarios=User::listar_usuarios(3);
				if(count($usuarios)>0){
					$informes=DB::table('informe')
						->join('usuario', 'informe.usuario_id_usuario', '=', 'usuario.id_usuario')
						->join('area_gestion', 'usuario.area_gestion_usuario', '=', 'area_gestion.id_area_gestion')
						->join('tipo_usuario', 'usuario.tipo_usuario', '=', 'tipo_usuario.id_tipo_usuario')
						->select('informe.id_informe', 'informe.descripcion_informe', 'informe.codigo_informe', 'informe.archivo_informe', 'informe.fecha_entrega_informe', 'informe.fecha_modificacion_informe', 'informe.usuario_id_usuario','usuario.nombres_usuario','usuario.apellidos_usuario', 'area_gestion.nombre_area_gestion','tipo_usuario.descripcion_tipo_usuario')
						->get();
					//return json_encode($informes);
					return View::make('acad.reportes')->withInformes($informes)->withAreas($areas)->withUsuarios($usuarios);
				}else{
					return View::make('acad.reportes')->withError('No existen Usuarios en el centro de investigación');
				}
			}else{
				return View::make('acad.reportes')->withError('No existen areas en el centro de investigación');
			}
		}else{
			return View::make('acad.reportes')->withError('No existe un Centro de investigación válido');
		}
	}
}
