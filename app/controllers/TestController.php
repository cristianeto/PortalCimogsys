<?php

use Symfony\Component\HttpFoundation\JsonResponse;

class TestController  extends BaseController{

	//Tipo Usuario

	public function guardarTipoUsuario(){
		$response=0;
		$descripcion = e(Input::get('descripcion'));
		$response = TipoUsuario::insertar_tipo_usuario($descripcion);
		if($response == 1){
			return Redirect::to(URL::previous())->with('mensaje','Tipo de Usuario Insertado Correctamente');
		}else{
			return Redirect::to(URL::previous())->with('mensaje','Ha ocurrido un error');
		}
	}

	public function actualizarTipoUsuario(){
		$response=0;
		$id = e(Input::get('id'));
		$descripcion = e(Input::get('descripcion'));
		$response = TipoUsuario::actualizar_tipo_usuario($id,$descripcion);
		if($response == 1){
			return Redirect::to(URL::previous())->with('mensaje','Tipo de Usuario Actualizado Insertado Correctamente');
		}else{
			return Redirect::to(URL::previous())->with('mensaje','Ha ocurrido un error');
		}
	}

	public function eliminarTipoUsuario(){
		$response=0;
		$id = e(Input::get('id'));
		$response = TipoUsuario::eliminar_tipo_usuario($id);
		if($response == 1){
			return Redirect::to(URL::previous())->with('mensaje','Tipo de Usuario Eliminado Insertado Correctamente');
		}else{
			return Redirect::to(URL::previous())->with('mensaje','Ha ocurrido un error');
		}
	}

	public function buscarTipoUsuario(){
		$response=0;
		$id = e(Input::get('id'));
		$response = TipoUsuario::buscar_tipo_usuario($id);
		if(count($response) == 1){
			return Redirect::to(URL::previous())->with('mensaje',$response->id_tipo_usuario);
		}else{
			return Redirect::to(URL::previous())->with('mensaje','No se ha encontrado el tipo de usuario');
		}
	}

	//Fin Tipo Usuario

	//Tipo Multimedia

	public function guardarTipoMultimedia(){
		$response=0;
		$descripcion = e(Input::get('descripcion'));
		$response = TipoMultimedia::insertar_tipo_multimedia($descripcion);
		if($response == 1){
			return Redirect::to(URL::previous())->with('mensaje','Tipo de multimedia Insertado Correctamente');
		}else{
			return Redirect::to(URL::previous())->with('mensaje','Ha ocurrido un error');
		}
	}

	public function actualizarTipoMultimedia(){
		$response=0;
		$id = e(Input::get('id'));
		$descripcion = e(Input::get('descripcion'));
		$response = TipoMultimedia::actualizar_tipo_multimedia($id,$descripcion);
		if($response == 1){
			return Redirect::to(URL::previous())->with('mensaje','Tipo de multimedia Actualizado Insertado Correctamente');
		}else{
			return Redirect::to(URL::previous())->with('mensaje','Ha ocurrido un error');
		}
	}

	public function eliminarTipoMultimedia(){
		$response=0;
		$id = e(Input::get('id'));
		$response = TipoMultimedia::eliminar_tipo_multimedia($id);
		if($response == 1){
			return Redirect::to(URL::previous())->with('mensaje','Tipo de multimedia Eliminado Insertado Correctamente');
		}else{
			return Redirect::to(URL::previous())->with('mensaje','Ha ocurrido un error');
		}
	}

	public function buscarTipoMultimedia(){
		$response=0;
		$id = e(Input::get('id'));
		$response = TipoMultimedia::buscar_tipo_multimedia($id);
		if(count($response) == 1){
			return Redirect::to(URL::previous())->with('mensaje',$response->id_tipo_multimedia);
		}else{
			return Redirect::to(URL::previous())->with('mensaje','No se ha encontrado el tipo de multimedia');
		}
	}

	//Fin Tipo Multimedia

	//Tipo Multimedia

	public function guardarTipoLineaInvestigacion(){
		$response=0;
		$descripcion = e(Input::get('descripcion'));
		$response = TipoLineaInvestigacion::insertar_tipo_linea_investigacion($descripcion);
		if($response == 1){
			return Redirect::to(URL::previous())->with('mensaje','Tipo de linea investigacion Insertado Correctamente');
		}else{
			return Redirect::to(URL::previous())->with('mensaje','Ha ocurrido un error');
		}
	}

	public function actualizarTipoLineaInvestigacion(){
		$response=0;
		$id = e(Input::get('id'));
		$descripcion = e(Input::get('descripcion'));
		$response = TipoLineaInvestigacion::actualizar_tipo_linea_investigacion($id,$descripcion);
		if($response == 1){
			return Redirect::to(URL::previous())->with('mensaje','Tipo de linea investigacion Actualizado Insertado Correctamente');
		}else{
			return Redirect::to(URL::previous())->with('mensaje','Ha ocurrido un error');
		}
	}

	public function eliminarTipoLineaInvestigacion(){
		$response=0;
		$id = e(Input::get('id'));
		$response = TipoLineaInvestigacion::eliminar_tipo_linea_investigacion($id);
		if($response == 1){
			return Redirect::to(URL::previous())->with('mensaje','Tipo de linea investigacion Eliminado Insertado Correctamente');
		}else{
			return Redirect::to(URL::previous())->with('mensaje','Ha ocurrido un error');
		}
	}

	public function buscarTipoLineaInvestigacion(){
		$response=0;
		$id = e(Input::get('id'));
		$response = TipoLineaInvestigacion::buscar_tipo_linea_investigacion($id);
		if(count($response) == 1){
			return Redirect::to(URL::previous())->with('mensaje',$response->id_tipo_linea_investigacion);
		}else{
			return Redirect::to(URL::previous())->with('mensaje','No se ha encontrado el tipo de linea investigacion');
		}
	}

	//Fin Tipo Multimedia

	//Centro

	public function guardarCentro(){
		$response=0;

		$nombre_centro = e(Input::get('nombre_centro'));
		$descripcion_centro = e(Input::get('descripcion_centro'));
		$mision_centro = e(Input::get('mision_centro'));
		$vision_centro = e(Input::get('vision_centro'));
		$telefono_centro = e(Input::get('telefono_centro'));
		$direccion_centro = e(Input::get('direccion_centro'));
		$codigo_postal_centro = e(Input::get('codigo_postal_centro'));
		$objetivo_general_centro = e(Input::get('objetivo_general_centro'));
		$quienes_somos_centro = e(Input::get('quienes_somos_centro'));

		$file_logo_centro = Input::file('logo_centro');
		$file_img_centro = Input::file('img_centro');

		$logo_centro = $file_logo_centro->getClientOriginalName();
		$img_centro = $file_img_centro->getClientOriginalName();

		$response = Centro::insertar_centro($nombre_centro,$logo_centro,$descripcion_centro,$mision_centro,$vision_centro,
		$telefono_centro,$direccion_centro,$codigo_postal_centro,$objetivo_general_centro,$quienes_somos_centro,$img_centro);
		if($response == 1){
			$file_logo_centro->move('img',$file_logo_centro->getClientOriginalName());
			$file_img_centro->move('img',$file_img_centro->getClientOriginalName());
			return Redirect::to(URL::previous())->with('mensaje','Centro de Investigacion Insertado Correctamente');
		}else{
			return Redirect::to(URL::previous())->with('mensaje','Ha ocurrido un error');
		}
	}

	public function actualizarCentro(){
		$response=0;

		$id_centro = e(Input::get('id_centro'));
		$nombre_centro = e(Input::get('nombre_centro'));
		$descripcion_centro = e(Input::get('descripcion_centro'));
		$mision_centro = e(Input::get('mision_centro'));
		$vision_centro = e(Input::get('vision_centro'));
		$telefono_centro = e(Input::get('telefono_centro'));
		$direccion_centro = e(Input::get('direccion_centro'));
		$codigo_postal_centro = e(Input::get('codigo_postal_centro'));
		$objetivo_general_centro = e(Input::get('objetivo_general_centro'));
		$quienes_somos_centro = e(Input::get('quienes_somos_centro'));

		$centro = Centro::buscar_centro($id_centro);

		if(!is_null(Input::file('logo_centro'))){
			$file_logo_vieja = $centro->logo_centro;
			$file_logo_centro = Input::file('logo_centro');
			$logo_centro = $file_logo_centro->getClientOriginalName();
		}else{
			$logo_centro = $centro->logo_centro;
		}

		if(!is_null(Input::file('img_centro'))){
			$file_img_vieja = $centro->img_centro;
			$file_img_centro = Input::file('img_centro');
			$img_centro = $file_img_centro->getClientOriginalName();
		}else{
			$img_centro = $centro->img_centro;
		}

		$response = Centro::actualizar_centro($id_centro,$nombre_centro,$logo_centro,$descripcion_centro,$mision_centro,$vision_centro,
		$telefono_centro,$direccion_centro,$codigo_postal_centro,$objetivo_general_centro,$quienes_somos_centro,$img_centro);
		if($response == 1){

			if(!is_null(Input::file('logo_centro'))){
				$file_logo_centro->move('img',$file_logo_centro->getClientOriginalName());
				File::delete('img/'.$file_logo_vieja);
			}

			if(!is_null(Input::file('img_centro'))){
				$file_img_centro->move('img',$file_img_centro->getClientOriginalName());
				File::delete('img/'.$file_img_vieja);
			}

			return Redirect::to(URL::previous())->with('mensaje','Centro de Investigacion Actualizado Insertado Correctamente');
		}else{
			return Redirect::to(URL::previous())->with('mensaje','Ha ocurrido un error');
		}
	}

	public function eliminarCentro(){
		$response=0;
		$id = e(Input::get('id'));
		$response = Centro::eliminar_centro($id);
		if($response == 1){
			return Redirect::to(URL::previous())->with('mensaje','Centro de Investigacion Eliminado Insertado Correctamente');
		}else{
			return Redirect::to(URL::previous())->with('mensaje','Ha ocurrido un error');
		}
	}

	public function buscarCentro(){
		$response=0;
		$id = e(Input::get('id'));
		$response = Centro::buscar_centro($id);
		if(count($response) == 1){
			return Redirect::to(URL::previous())->with('mensaje',$response->$id_centro);
		}else{
			return Redirect::to(URL::previous())->with('mensaje','No se ha encontrado el tipo de linea investigacion');
		}
	}
	//Fin Centro

	//Objetivos
	public function ingresarObjetivos($centro){
		$response = 0;
		$response = Centro::buscar_centro($centro);
		if(count($response)!=0){
			return View::make('pruebas.Objetivos')->with('objetivos',Objetivos::listar_objetivos(3,$centro))->with('centro',$centro);
		}else{
			return View::make('pruebas.objetivos')->with('error','No existe un centro de investigacion para ingresar objetivos');
		}
	}

	public function guardarObjetivos(){
		$response=0;
		$centro = e(Input::get('centro_objetivos'));
		$descripcion = e(Input::get('descripcion_objetivos'));
		$response = Centro::buscar_centro($centro);
		if(count($response) == 1){
			$response = 0;
			$response = Objetivos::insertar_objetivos($descripcion,$centro);
			if($response == 1){
				return Redirect::to(URL::previous())->with('mensaje','Objetivo Insertado Correctamente');
			}else{
				return Redirect::to(URL::previous())->with('mensaje','Ha ocurrido un error');
			}
		}else{
			return Redirect::to(URL::previous())->with('mensaje','No ha Seleccionado un Centro de Investigacion Válido');
		}
	}

	public function actualizarObjetivos(){

		$response=0;

		$id = e(Input::get('id_objetivos'));
		$centro = e(Input::get('centro_objetivos'));
		$descripcion = e(Input::get('descripcion_objetivos'));

		$response = Centro::buscar_centro($centro);

		if(count($response)==1){
			$response = 0;
			$response = Objetivos::actualizar_objetivos($id,$descripcion,$centro);
			if(count($response) == 1){
				return Redirect::to(URL::previous())->with('mensaje','Objetivo Actualizado Insertado Correctamente');
			}else{
				return Redirect::to(URL::previous())->with('mensaje','Ha ocurrido un error');
			}
		}else{
			return Redirect::to(URL::previous())->with('mensaje','No ha Seleccionado un Centro de Investigacion Válido 2');
		}

	}

	public function eliminarObjetivos(){
		$response=0;
		$id = e(Input::get('id_objetivos'));
		$response = Objetivos::eliminar_objetivos($id);
		if($response == 1){
			return Redirect::to(URL::previous())->with('mensaje','Objetivo Eliminado Correctamente');
		}else{
			return Redirect::to(URL::previous())->with('mensaje','Ha ocurrido un error');
		}
	}

	public function buscarObjetivos(){
		$response=0;
		$id = e(Input::get('id_objetivos'));
		$response = Objetivos::buscar_objetivos($id);
		if(count($response) == 1){
			return Redirect::to(URL::previous())->with('mensaje',$response->id_objetivos);
		}else{
			return Redirect::to(URL::previous())->with('mensaje','No se ha encontrado el Objetivo');
		}
	}

	//Fin Objetivos

	//Redes Sociales
	public function ingresarRedesSociales($centro){
		$response = 0;
		$response = Centro::buscar_centro($centro);
		if(count($response)!=0){
			return View::make('pruebas.redesSociales')->with('redes',RedesSociales::listar_redes_sociales(3,$centro))->with('centro',$centro);
		}else{
			return View::make('pruebas.redesSociales')->with('error','No existe un centro de investigacion para ingresar objetivos');
		}
	}

	public function guardarRedesSociales(){

		$response=0;

		$nombre = e(Input::get('nombre_redes_sociales'));
		$enlace = e(Input::get('enlace_redes_sociales'));
		$usuario = e(Input::get('usuario_redes_sociales'));
		$centro = e(Input::get('centro_redes_sociales'));

		$response = Centro::buscar_centro($centro);

		if(count($response) == 1){
			$response = 0;
			$response = RedesSociales::insertar_redes_sociales($nombre, $enlace, $usuario, $centro);
			if($response == 1){
				return Redirect::to(URL::previous())->with('mensaje','Red Insertada Correctamente');
			}else{
				return Redirect::to(URL::previous())->with('mensaje','Ha ocurrido un error');
			}
		}else{
			return Redirect::to(URL::previous())->with('mensaje','No ha Seleccionado un Centro de Investigacion Válido');
		}
	}

	public function actualizarRedesSociales(){

		$response=0;

		$id = e(Input::get('id_redes_sociales'));
		$nombre = e(Input::get('nombre_redes_sociales'));
		$enlace = e(Input::get('enlace_redes_sociales'));
		$usuario = e(Input::get('usuario_redes_sociales'));
		$centro = e(Input::get('centro_redes_sociales'));

		$response = Centro::buscar_centro($centro);

		if(count($response)==1){
			$response = 0;
			$response = RedesSociales::actualizar_redes_sociales($id, $nombre, $enlace, $usuario, $centro);
			if(count($response) == 1){
				return Redirect::to(URL::previous())->with('mensaje','Red Social Actualizada Correctamente');
			}else{
				return Redirect::to(URL::previous())->with('mensaje','Ha ocurrido un error');
			}
		}else{
			return Redirect::to(URL::previous())->with('mensaje','No ha Seleccionado un Centro de Investigacion Válido');
		}

	}

	public function eliminarRedesSociales(){
		$response=0;
		$id = e(Input::get('id_redes_sociales'));
		$response = RedesSociales::eliminar_redes_sociales($id);
		if($response == 1){
			return Redirect::to(URL::previous())->with('mensaje','Red Social Eliminada Correctamente');
		}else{
			return Redirect::to(URL::previous())->with('mensaje','Ha ocurrido un error');
		}
	}

	public function buscarRedesSociales(){
		$response=0;
		$id = e(Input::get('id_redes_sociales'));
		$response = RedesSociales::buscar_redes_sociales($id);
		if(count($response) == 1){
			return Redirect::to(URL::previous())->with('mensaje',$response->id_redes_sociales);
		}else{
			return Redirect::to(URL::previous())->with('mensaje','No se ha encontrado la red');
		}
	}

	//Fin Redes Sociales


	//Beneficiarios
	public function ingresarBeneficiarios($centro){
		$response = 0;
		$response = Centro::buscar_centro($centro);
		if(count($response)!=0){
			return View::make('pruebas.beneficiarios')->with('beneficiarios',Beneficiarios::listar_beneficiarios(3,$centro))->with('centro',$centro);
		}else{
			return View::make('pruebas.beneficiarios')->with('error','No existe un centro de investigacion para ingresar objetivos');
		}
	}

	public function guardarBeneficiarios(){
		$response=0;

		$nombre = e(Input::get('nombre_beneficiarios'));
		$descripcion = e(Input::get('descripcion_beneficiarios'));
		$centro = e(Input::get('centro_beneficiarios'));

		$response = Centro::buscar_centro($centro);
		if(count($response) == 1){
			$response = 0;
			$response = Beneficiarios::insertar_beneficiarios($nombre, $descripcion, $centro);
			if($response == 1){
				return Redirect::to(URL::previous())->with('mensaje','Beneficiario Insertado Correctamente');
			}else{
				return Redirect::to(URL::previous())->with('mensaje','Ha ocurrido un error');
			}
		}else{
			return Redirect::to(URL::previous())->with('mensaje','No ha Seleccionado un Centro de Investigacion Válido');
		}
	}

	public function actualizarBeneficiarios(){

		$response=0;

		$id = e(Input::get('id_beneficiarios'));
		$nombre = e(Input::get('nombre_beneficiarios'));
		$descripcion = e(Input::get('descripcion_beneficiarios'));
		$centro = e(Input::get('centro_beneficiarios'));

		$response = Centro::buscar_centro($centro);

		if(count($response)==1){
			$response = 0;
			$response = Beneficiarios::actualizar_beneficiarios($id,$nombre,$descripcion,$centro);
			if(count($response) == 1){
				return Redirect::to(URL::previous())->with('mensaje','Beneficiario Actualizado Correctamente');
			}else{
				return Redirect::to(URL::previous())->with('mensaje','Ha ocurrido un error');
			}
		}else{
			return Redirect::to(URL::previous())->with('mensaje','No ha Seleccionado un Centro de Investigacion Válido');
		}

	}

	public function eliminarBeneficiarios(){
		$response=0;
		$id = e(Input::get('id_beneficiarios'));
		$response = Beneficiarios::eliminar_beneficiarios($id);
		if($response == 1){
			return Redirect::to(URL::previous())->with('mensaje','Beneficiario Eliminado Correctamente');
		}else{
			return Redirect::to(URL::previous())->with('mensaje','Ha ocurrido un error');
		}
	}

	public function buscarBeneficiarios(){
		$response=0;
		$id = e(Input::get('id_beneficiarios'));
		$response = Beneficiarios::buscar_beneficiarios($id);
		if(count($response) == 1){
			return Redirect::to(URL::previous())->with('mensaje',$response->id_beneficiarios);
		}else{
			return Redirect::to(URL::previous())->with('mensaje','No se ha encontrado el Beneficiario');
		}
	}

	//Fin Beneficiarios


	//INICIO Área de Gestión
	public function ingresarAreaGestion($centro){
		$response = 0;
		$response = Centro::buscar_centro($centro);
		if(count($response)!=0){
			return View::make('pruebas.areaGestion')->with('areas',AreaGestion::listar_area_gestion(3,$centro))->with('centro',$centro);
		}else{
			return View::make('pruebas.areaGestion')->with('error','No existe un centro de investigacion para ingresar objetivos');
		}
	}

	public function guardarAreaGestion(){
		$response=0;

		$nombre = e(Input::get('nombre_area_gestion'));
		$descripcion = e(Input::get('descripcion_area_gestion'));
		$color = e(Input::get('color_area_gestion'));
		$centro = e(Input::get('centro_area_gestion'));

		$response = Centro::buscar_centro($centro);
		if(count($response) == 1){
			$response = 0;
			$response = AreaGestion::insertar_area_gestion($nombre, $descripcion, $color, $centro);
			if($response == 1){
				return Redirect::to(URL::previous())->with('mensaje','Area Gestion Insertado Correctamente');
			}else{
				return Redirect::to(URL::previous())->with('mensaje','Ha ocurrido un error');
			}
		}else{
			return Redirect::to(URL::previous())->with('mensaje','No ha Seleccionado un Centro de Investigacion Válido');
		}
	}

	public function actualizarAreaGestion(){

		$response=0;

		$id = e(Input::get('id_area_gestion'));
		$nombre = e(Input::get('nombre_area_gestion'));
		$descripcion = e(Input::get('descripcion_area_gestion'));
		$color = e(Input::get('color_area_gestion'));
		$centro = e(Input::get('centro_area_gestion'));

		$response = Centro::buscar_centro($centro);

		if(count($response)==1){
			$response = 0;
			$response = AreaGestion::actualizar_area_gestion($id,$nombre,$descripcion,$color,$centro);
			if(count($response) == 1){
				return Redirect::to(URL::previous())->with('mensaje','Área de Gestion Actualizado Correctamente');
			}else{
				return Redirect::to(URL::previous())->with('mensaje','Ha ocurrido un error');
			}
		}else{
			return Redirect::to(URL::previous())->with('mensaje','No ha Seleccionado un Centro de Investigacion Válido');
		}

	}

	public function eliminarAreaGestion(){
		$response=0;
		$id = e(Input::get('id_area_gestion'));
		$response = AreaGestion::eliminar_area_gestion($id);
		if($response == 1){
			return Redirect::to(URL::previous())->with('mensaje','Area de Gestion Eliminado Correctamente');
		}else{
			return Redirect::to(URL::previous())->with('mensaje','Ha ocurrido un error');
		}
	}

	public function buscarAreaGestion(){
		$response=0;
		$id = e(Input::get('id_area_gestion'));
		$response = AreaGestion::buscar_area_gestion($id);
		if(count($response) == 1){
			return Redirect::to(URL::previous())->with('mensaje',$response->id_area_gestion);
		}else{
			return Redirect::to(URL::previous())->with('mensaje','No se ha encontrado el Área de Gestión');
		}
	}

	//FIN Área de Gestión

	//Linea Investigación
	public function ingresarLineaInvestigacion($centro){
		$response = 0;
		$response = Centro::buscar_centro($centro);
		if(count($response)!=0){
			$tipos = TipoLineaInvestigacion::lists('descripcion_tipo_linea_investigacion','id_tipo_linea_investigacion');
			if(count($tipos)!=0){
				return View::make('pruebas.lineaInvestigacion')->with('lineas',LineaInvestigacion::listar_linea_investigacion(3,$centro))->with('centro',$centro)->with('tipos',$tipos);
			}else{
				return View::make('pruebas.lineaInvestigacion')->with('error','No existen tipos de lineas de investigacion');
			}
		}else{
			return View::make('pruebas.lineaInvestigacion')->with('error','No existe un centro de investigacion para ingresar objetivos');
		}
	}

	public function guardarLineaInvestigacion(){
		$response=0;

		$descripcion = e(Input::get('descripcion_linea_investigacion'));
		$centro = e(Input::get('centro_linea_investigacion'));
		$tipo = e(Input::get('tipo_linea_investigacion'));

		$response = Centro::buscar_centro($centro);
		if(count($response) == 1){
			$response = 0;
			$response = TipoLineaInvestigacion::buscar_tipo_linea_investigacion($tipo);
			if(count($response) == 1){
				$response = 0;
				$response = LineaInvestigacion::insertar_linea_investigacion($descripcion,$centro,$tipo);
				if($response == 1){
					return Redirect::to(URL::previous())->with('mensaje','Linea de Investigacion Insertada Correctamente');
				}else{
					return Redirect::to(URL::previous())->with('mensaje','Ha ocurrido un error');
				}
			}else{
				return Redirect::to(URL::previous())->with('mensaje','No ha Seleccionado un Tipo de Linea de Investigacion Válida');
			}
		}else{
			return Redirect::to(URL::previous())->with('mensaje','No ha Seleccionado un Centro de Investigacion Válido');
		}
	}

	public function actualizarLineaInvestigacion(){

		$response=0;

		$id = e(Input::get('id_linea_investigacion'));
		$descripcion = e(Input::get('descripcion_linea_investigacion'));
		$centro = e(Input::get('centro_linea_investigacion'));
		$tipo = e(Input::get('tipo_linea_investigacion'));

		echo $id." ".$descripcion." ".$centro." ".$tipo;

		$response = Centro::buscar_centro($centro);

		if(count($response)==1){
			$response = 0;
			$response = TipoLineaInvestigacion::buscar_tipo_linea_investigacion($tipo);
			if(count($response) == 1){
				$response = 0;
				$response = LineaInvestigacion::actualizar_linea_investigacion($id,$descripcion,$centro,$tipo);
				if(count($response) == 1){
					return Redirect::to(URL::previous())->with('mensaje','Área de Gestion Actualizado Correctamente');
				}else{
					return Redirect::to(URL::previous())->with('mensaje','Ha ocurrido un error');
				}
			}else{
				return Redirect::to(URL::previous())->with('mensaje','No ha Seleccionado un Tipo de linea de Investigacion Válido');
			}
		}else{
			return Redirect::to(URL::previous())->with('mensaje','No ha Seleccionado un Centro de Investigacion Válido');
		}

	}

	public function eliminarLineaInvestigacion(){
		$response=0;
		$id = e(Input::get('id_linea_investigacion'));
		$response = LineaInvestigacion::eliminar_linea_investigacion($id);
		if($response == 1){
			return Redirect::to(URL::previous())->with('mensaje','Linea de Investigacion Eliminada Correctamente');
		}else{
			return Redirect::to(URL::previous())->with('mensaje','Ha ocurrido un error');
		}
	}

	public function buscarLineaInvestigacion(){
		$response=0;
		$id = e(Input::get('id_linea_investigacion'));
		$response = LineaInvestigacion::buscar_linea_investigacion($id);
		if(count($response) == 1){
			return Redirect::to(URL::previous())->with('mensaje',$response->id_linea_investigacion);
		}else{
			return Redirect::to(URL::previous())->with('mensaje','No se ha encontrado la línea de Investigacion');
		}
	}

	//Línea Investigación

	//Proyectos
	public function ingresarProyectos($centro,$area){
		$response = 0;
		$response = Centro::buscar_centro($centro);
		if(count($response)!=0){
			$response = 0;
			$response = AreaGestion::buscar_area_gestion($area);
			if((count($response)!=0)and($centro==$response->centro_area_gestion)){
				$areas = AreaGestion::where('centro_area_gestion',$centro)->lists('nombre_area_gestion','id_area_gestion');
				if(count($areas)!=0){
					return View::make('pruebas.proyectos')->with('proyectos',Proyectos::listar_proyectos(3,$area,$centro))->with('areas',$areas);
				}else{
					return View::make('pruebas.proyectos')->with('error','No existen áreas de gestión');
				}
			}else{
				return View::make('pruebas.proyectos')->with('error','No existe el área de gestión');
			}
		}else{
			return View::make('pruebas.proyectos')->with('error','No existe un centro de investigacion para ingresar proyectos');
		}
	}

	public function guardarProyectos(){
		$response=0;

		$id_proyectos = e(Input::get('id_proyectos'));
		$nombre_proyectos = e(Input::get('nombre_proyectos'));
		$enlace_proyectos = e(Input::get('enlace_proyectos'));
		$descripcion_proyectos = e(Input::get('descripcion_proyectos'));
		$imagen_banner_proyectos = Input::file('imagen_banner_proyectos');
		$imagen_min_proyectos = Input::file('imagen_min_proyectos');
		$area_gestion_proyectos = e(Input::get('area_gestion_proyectos'));

		$imagen_banner = $imagen_banner_proyectos->getClientOriginalName();
		$imagen_min = $imagen_min_proyectos->getClientOriginalName();

		$response = Proyectos::insertar_proyectos($nombre_proyectos,$enlace_proyectos,$descripcion_proyectos,
		$imagen_banner,$imagen_min, $area_gestion_proyectos);
		if($response == 1){
			$imagen_banner_proyectos->move('img',$imagen_banner);
			$imagen_min_proyectos->move('img',$imagen_min);
			return Redirect::to(URL::previous())->with('mensaje','Proyecto Insertado Correctamente');
		}else{
			return Redirect::to(URL::previous())->with('mensaje','Ha ocurrido un error');
		}

	}

	public function actualizarProyectos(){

		$response=0;

		$id_proyectos = e(Input::get('id_proyectos'));
		$nombre_proyectos = e(Input::get('nombre_proyectos'));
		$enlace_proyectos = e(Input::get('enlace_proyectos'));
		$descripcion_proyectos = e(Input::get('descripcion_proyectos'));
		$area_gestion_proyectos = e(Input::get('area_gestion_proyectos'));

		$proyecto = Proyectos::buscar_proyectos($id_proyectos);

		if(!is_null(Input::file('imagen_banner_proyectos'))){
			$imagen_banner_vieja = $proyecto->imagen_banner_proyectos;
			$imagen_banner_proyectos = Input::file('imagen_banner_proyectos');
			$imagen_banner = $imagen_banner_proyectos->getClientOriginalName();
		}else{
			$imagen_banner = $proyecto->imagen_banner_proyectos;
		}

		if(!is_null(Input::file('imagen_min_proyectos'))){
			$imagen_min_vieja = $proyecto->imagen_min_proyectos;
			$imagen_min_proyectos = Input::file('imagen_min_proyectos');
			$imagen_min = $imagen_min_proyectos->getClientOriginalName();
		}else{
			$imagen_min = $proyecto->imagen_min_proyectos;
		}

		$response = 0;
		$response = Proyectos::actualizar_proyectos($id_proyectos,$nombre_proyectos,$enlace_proyectos,$descripcion_proyectos,
			$imagen_banner,$imagen_min,$area_gestion_proyectos);

		if(count($response) == 1){

			if(!is_null(Input::file('imagen_banner_proyectos'))){
				$imagen_banner_proyectos->move('img',$imagen_banner);
				File::delete('img/'.$imagen_banner_vieja);
			}

			if(!is_null(Input::file('imagen_min_proyectos'))){
				$imagen_min_proyectos->move('img',$imagen_min);
				File::delete('img/'.$imagen_min_vieja);
			}

			return Redirect::to(URL::previous())->with('mensaje','Proyecto Actualizado Correctamente');
		}else{
			return Redirect::to(URL::previous())->with('mensaje','Ha ocurrido un error');
		}
	}

	public function eliminarProyectos(){
		$response=0;
		$id = e(Input::get('id_proyectos'));
		$response = Proyectos::buscar_proyectos($id);
		File::delete('img/'.$response->imagen_banner_proyectos);
		File::delete('img/'.$response->imagen_min_proyectos);
		$response = Proyectos::eliminar_proyectos($id);
		if($response == 1){
			return Redirect::to(URL::previous())->with('mensaje','Proyecto Eliminado Correctamente');
		}else{
			return Redirect::to(URL::previous())->with('mensaje','Ha ocurrido un error');
		}
	}

	public function buscarProyectos(){
		$response=0;
		$id = e(Input::get('id_proyectos'));
		$response = Proyectos::buscar_proyectos($id);
		if(count($response) == 1){
			return Redirect::to(URL::previous())->with('mensaje',$response->id_proyectos);
		}else{
			return Redirect::to(URL::previous())->with('mensaje','No se ha encontrado el Proyecto');
		}
	}

	//Fin Proyectos

//Inicio Noticia
		public function ingresarNoticia($centro,$area){
		$response = 0;
		$response = Centro::buscar_centro($centro);
		if(count($response)!=0){
			$response = 0;
			$response = AreaGestion::buscar_area_gestion($area);
			if((count($response)!=0)and($centro==$response->centro_area_gestion)){
				$areas = AreaGestion::where('centro_area_gestion',$centro)->lists('nombre_area_gestion','id_area_gestion');
				if(count($areas)!=0){
					return View::make('pruebas.noticia')->with('noticias',Noticia::listar_noticias(3,$area))->with('centro',$centro)->with('area',$area);
				}else{
					return View::make('pruebas.noticia')->with('error','No existen áreas de gestión');
				}
			}else{
				return View::make('pruebas.noticia')->with('error','No existe el área de gestión');
			}
		}else{
			return View::make('pruebas.noticia')->with('error','No existe un centro de investigacion para ingresar proyectos');
		}
	}



public function guardarNoticia(){
		$response=0;
		$id_noticia = Noticia::codigo_nuevo_noticia();
		$titulo_noticia = e(Input::get('titulo_noticia'));
		$contenido_noticia = e(Input::get('contenido_noticia'));
		$enlace_noticia = e(Input::get('enlace_noticia'));
		$area_gestion_notica = e(Input::get('area_gestion_notica'));
		$imagen_noticia = Input::file('imagen_noticia');
		$centro = e(Input::get('centro_linea_investigacion'));
		$imagen_noticia_nombre = $id_noticia.'_imagenNoticia.'.$imagen_noticia->getClientOriginalExtension();

		$response=Centro::buscar_centro($centro);
		if(count($response) == 1){
			$response = 0;
			$response = AreaGestion::buscar_area_gestion($area_gestion_notica);
			if(count($response) == 1){
				$response = 0;
				$response = Noticia::insertar_noticia($id_noticia, $titulo_noticia, $contenido_noticia, $enlace_noticia, $area_gestion_notica,$imagen_noticia_nombre);
				if($response == 1){
					$imagen_noticia->move('img/noticia',$imagen_noticia_nombre);
					return Redirect::to(URL::previous())->with('mensaje','Noticia Insertada Correctamente');
				}else{
					return Redirect::to(URL::previous())->with('mensaje','Ha ocurrido un error');
				}
			}else{
				return Redirect::to(URL::previous())->with('mensaje','No ha Seleccionado una Área de Gestión Válida');
			}
		}else{
			return Redirect::to(URL::previous())->with('mensaje','No ha Seleccionado un Centro de Investigación Válido');
		}
	}

	public function actualizarNoticia(){
		$response=0;
		$id_noticia =  e(Input::get('id_noticia'));
		$titulo_noticia = e(Input::get('titulo_noticia'));
		$contenido_noticia = e(Input::get('contenido_noticia'));
		$enlace_noticia = e(Input::get('enlace_noticia'));
		$area_gestion_notica = e(Input::get('area_gestion_notica'));
		$centro = e(Input::get('centro_linea_investigacion'));

		$noticia = Noticia::buscar_noticia($id_noticia);

		if(!is_null(Input::file('imagen_noticia'))){
			$imagen_noticia_vieja = $noticia->imagen_noticia;
			$imagen_noticia = Input::file('imagen_noticia');
			$imagen_noticia_nombre = $id_noticia.'_imagenNoticia.'.$imagen_noticia->getClientOriginalExtension();
		}else{
			$imagen_noticia_nombre = $noticia->imagen_noticia;
		}

		//echo $id." ".$descripcion." ".$centro." ".$tipo;

		$response = Centro::buscar_centro($centro);
		if(count($response)==1){
			$response = 0;
			$response = AreaGestion::buscar_area_gestion($area_gestion_notica);
			if(count($response) == 1){
				$response = 0;
				$response = Noticia::actualizar_noticia($id_noticia, $titulo_noticia, $contenido_noticia, $enlace_noticia, $area_gestion_notica, $imagen_noticia_nombre);
				if(count($response) == 1){
					if(!is_null(Input::file('imagen_noticia'))){
						File::delete('img/noticia/'.$imagen_noticia_vieja);
						$imagen_noticia->move('img/noticia',$imagen_noticia_nombre);

			}
					return Redirect::to(URL::previous())->with('mensaje','Noticia Actualizado Correctamente');
				}else{
					return Redirect::to(URL::previous())->with('mensaje','Ha ocurrido un error');
				}
			}else{
				return Redirect::to(URL::previous())->with('mensaje','No ha Seleccionado una Area de Gestión  Válida');
			}
		}else{
			return Redirect::to(URL::previous())->with('mensaje','No ha Seleccionado una Area de Gestión Válido');
		}
	}
	public function eliminarNoticia(){
		$response=0;
		$id = e(Input::get('id_noticia'));
		$noticia = Noticia::buscar_noticia($id);
		if(count($noticia)!=0){
			$response = Noticia::eliminar_noticia($id);
			if($response == 1){
				File::delete('img/noticia/'.$noticia->imagen_noticia);
				return Redirect::to(URL::previous())->with('mensaje','Noticia Eliminada Correctamente');
			}else{
				return Redirect::to(URL::previous())->with('mensaje','Ha ocurrido un error');
			}
		}else{
			return Redirect::to(URL::previous())->with('mensaje','No se ha eliminado, noticia no válida.');
		}
	}

	public function buscarNoticia(){
		$response=0;
		$id = e(Input::get('id_noticia'));
		$response = Noticia::buscar_noticia($id);
		if(count($response)!=0){
			return Redirect::to(URL::previous())->withMensaje($response->id_noticia);
		}else{
			return Redirect::to(URL::previous())->withMensaje('No se ha encontrado la noticia!');
		}
	}

	// FIN Noticias

	//INICIO Multimedia
	public function ingresarMultimedia($id_noticia){
		$response = 0;
		$noticia = Noticia::buscar_noticia($id_noticia);
		if(count($noticia)!=0){
			$tipos = TipoMultimedia::lists('descripcion_tipo_multimedia', 'id_tipo_multimedia');
			if(count($tipos)!=0){
				return View::make('pruebas.multimedia')->withMultimedias(Multimedia::listar_multimedias(3,$id_noticia))->withTipos($tipos)->withNoticia($noticia);
			}else{
				return View::make('pruebas.multimedia')->with('error','No existen tipos de multimedia');
			}
		}else{
			return View::make('pruebas.multimedia')->with('error','No existe una noticia para ingresar multimedia');
		}
	}


		public function guardarMultimedia(){
		$response=0;

		$descripcion = e(Input::get('descripcion_multimedia'));
		$enlace = e(Input::get('enlace_multimedia'));
		$tipo = e(Input::get('tipo_multimedia'));
		$noticia = e(Input::get('noticia_multimedia'));

		$response = Noticia::buscar_noticia($noticia);
		if(count($response) == 1){
			$response = 0;
			$response = TipoMultimedia::buscar_tipo_multimedia($tipo);
			if(count($response) == 1){
				$response = 0;
				$response = Multimedia::insertar_multimedia($enlace,$descripcion,$tipo,$noticia);
				if($response == 1){
					return Redirect::to(URL::previous())->with('mensaje','Multimedia Insertada Correctamente');
				}else{
					return Redirect::to(URL::previous())->with('mensaje','Ha ocurrido un error');
				}
			}else{
				return Redirect::to(URL::previous())->with('mensaje','No ha Seleccionado un Tipo de Multimedia Válida');
			}
		}else{
			return Redirect::to(URL::previous())->with('mensaje','No ha Seleccionado una noticia Válida');
		}
	}


	public function actualizarMultimedia(){
		$response=0;
		$id_multimedia = e(Input::get('id_multimedia'));
		$descripcion_multimedia = e(Input::get('descripcion_multimedia'));
		$enlace_multimedia = e(Input::get('enlace_multimedia'));
		$tipo = e(Input::get('tipo_multimedia'));
		$noticia = e(Input::get('noticia_multimedia'));

		$response = Noticia::buscar_noticia($noticia);
		if(count($response)!=0){
			$response=0;
			$response=TipoMultimedia::buscar_tipo_multimedia($tipo);
			if(count($response)!=0){
				$response = Multimedia::actualizar_multimedia($id_multimedia, $enlace_multimedia, $descripcion_multimedia, $tipo, $noticia);
				if(count($response!=0)){
					return Redirect::to(URL::previous())->withMensaje('Multimedia Actualizada Correctamente!');
				}else {
					return Redirect::to(URL::previous())->withMensaje('Ha ocurrido un error!');
				}
			}else{
				return Redirect::to(URL::previous())->withMensaje('No ha seleccionado un tipo de multimedia válido!');
			}
		}else{
			return Redirect::to(URL::previous())->withMensaje('No ha seleccionado una noticia válida!');
		}
	}


	public function eliminarMultimedia(){
		$response=0;
		$id_multimedia=e(Input::get('id_multimedia'));
		$response = Multimedia::buscar_multimedia($id_multimedia);
		if(count($response)!=0){
			$response=0;
			$response=Multimedia::eliminar_multimedia($id_multimedia);
			if(count($response)!=0){
				return Redirect::to(URL::previous())->withMensaje('Multimedia Eliminada Correctamente!');
			}else{
				return Redirect::to(URL::previous())->withMensaje('Ha ocurrido un Error!');
			}
		}else{
			return Redirect::to(URL::previous())->withMensaje('No se ha encontrado una multimedia válida!');
		}
	}

	public function buscarMultimedia(){
		$response=0;
		$id = e(Input::get('id_multimedia'));
		$response = Multimedia::buscar_multimedia($id);
		if(count($response)!=0){
			return Redirect::to(URL::previous())->withMensaje($response->id_multimedia);
		}else{
			return Redirect::to(URL::previous())->withMensaje('No se ha encontrado multimedia!');
		}
	}

	//Inicio Usuarios
		public function listarUsuario($centro){
		$response = 0;
		$response = Centro::buscar_centro($centro);
		if(count($response)!=0){
			$areas = AreaGestion::where('centro_area_gestion',$centro)->lists('nombre_area_gestion','id_area_gestion');
			//$areas = AreaGestion::listar_area_gestion(3,$centro);
			if(count($areas)!=0){
				$tipos= TipoUsuario::lists('descripcion_tipo_usuario', 'id_tipo_usuario');
				if(count($tipos)!=0){
					return View::make('pruebas.usuario')->with('usuarios',User::listar_usuarios(3))->withAreas($areas)->withTipos($tipos);
				}else{
					return View::make('pruebas.usuario')->with('error', 'No existen tipos de usuario');
				}
			}else{
				return View::make('pruebas.usuario')->with('error','No existen áreas de gestión');
			}
		}else{
			return View::make('pruebas.usuario')->with('error','No existe un centro de investigacion para ingresar proyectos');
		}
	}

	public function guardarUsuario(){
		$response=0;
		$id_usuario = User::codigo_nuevo_usuario();
		$cedula = e(Input::get('cedula_usuario'));
		$nick = e(Input::get('nick_usuario'));
		$nombres = e(Input::get('nombres_usuario'));
		$apellidos = e(Input::get('apellidos_usuario'));
		$password = Hash::make(e(Input::get('contrasena')));
		$correo = e(Input::get('correo_usuario'));
		$telefono = e(Input::get('telefono_usuario'));
		$sexo = e(Input::get('genero_usuario'));
		$imagen_formal = Input::file('imagen_formal');
		$imagen_informal = Input::file('imagen_informal');
		// INICIO conseguir el nombre de archivos
		$imagen_f = $id_usuario.'_imgFormal.'.$imagen_formal->getClientOriginalExtension();
		$imagen_i = $id_usuario.'_imgInformal.'.$imagen_informal->getClientOriginalExtension();
		// FIN conseguir el nombre de archivos
		$fecha_nacimiento =e(Input::get('fecha_nacimiento'));
		$area_gestion= e(Input::get('area_gestion'));
		$tipo_usuario= e(Input::get('tipo_usuario'));


		$response = User::insertar_usuario($id_usuario, $cedula, $nick, $nombres, $apellidos, $password, $correo, $telefono, $sexo, $imagen_f, $imagen_i, $fecha_nacimiento, $area_gestion, $tipo_usuario);
		if($response == 1){
			$imagen_formal->move('img/usuario',$imagen_f);
			$imagen_informal->move('img/usuario',$imagen_i);
			return Redirect::to(URL::previous())->withMensaje('Usuario Insertado Correctamente');
		}else{
			return Redirect::to(URL::previous())->withError('Ha ocurrido un error');
		}
	}

	public function actualizarUsuario(){

		$response=0;

		$id_usuario = e(Input::get('id_usuario'));
		$cedula = e(Input::get('cedula'));
		$nick_usuario = e(Input::get('nick_usuario'));
		$nombres_usuario = e(Input::get('nombres_usuario'));
		$apellidos_usuario = e(Input::get('apellidos_usuario'));
		$contrasena = Hash::make(e(Input::get('contrasena')));
		$correo_usuario = e(Input::get('correo_usuario'));
		$telefono = e(Input::get('telefono'));
		$genero_usuario = e(Input::get('genero_usuario'));

		$usuario = User::buscar_usuario($id_usuario);

		if(!is_null(Input::file('img_formal_usuario'))){
			$img_formal_usuario_vieja = $usuario->img_formal_usuario;
			$img_formal_usuario = Input::file('img_formal_usuario');
			$img_formal_usuario_nombre = $id_usuario.'_imgFormal.'.$img_formal_usuario->getClientOriginalExtension();
		}else{
			$img_formal_usuario_nombre = $usuario->img_formal_usuario;
		}

		if(!is_null(Input::file('img_informal_usuario'))){
			$img_informal_usuario_vieja = $usuario->img_informal_usuario;
			$img_informal_usuario = Input::file('img_informal_usuario');
			$img_informal_usuario_nombre = $id_usuario.'_imgInformal.'.$img_informal_usuario->getClientOriginalExtension();
		}else{
			$img_informal_usuario_nombre = $usuario->img_informal_usuario;
		}

		$fecha_nacimiento=e(Input::get('fecha_nacimiento'));
		$area_usuario=e(Input::get('area_usuario'));
		$tipo_usuario=e(Input::get('tipo_usuario'));

		$response = 0;
		$response = User::actualizar_usuario($id_usuario,$cedula,$nick_usuario,$nombres_usuario,
			$apellidos_usuario,$contrasena,$correo_usuario, $telefono, $genero_usuario,
			$img_formal_usuario_nombre, $img_informal_usuario_nombre, $fecha_nacimiento,
			 $area_usuario, $tipo_usuario);

		if(count($response) == 1){
			if(!is_null(Input::file('img_formal_usuario'))){
				File::delete('img/usuario/'.$img_formal_usuario_vieja);
				$img_formal_usuario->move('img/usuario',$img_formal_usuario_nombre);

			}

			if(!is_null(Input::file('img_informal_usuario'))){
				File::delete('img/usuario/'.$img_informal_usuario_vieja);
				$img_informal_usuario->move('img/usuario',$img_informal_usuario_nombre);
			}

			return Redirect::to(URL::previous())->withMensaje('Usuario Actualizado Correctamente');
		}else{
			return Redirect::to(URL::previous())->withMensaje('Ha ocurrido un error');
		}
	}

	public function buscarUsuario(){
		$response=0;
		$id = e(Input::get('id_usuario'));
		$response = User::buscar_usuario($id);
		if(count($response)!=0){
			return Redirect::to(URL::previous())->withMensaje($response->id_usuario);
		}else{
			return Redirect::to(URL::previous())->withMensaje('No se ha encontrado usuario!');
		}
	}


	public function eliminarUsuario(){
		$response = 0;
		$id_usuario = e(Input::get('id_usuario'));
		$response = User::buscar_usuario($id_usuario);
		//borrando archivos
		File::delete('img/usuario/'.$response->img_formal_usuario);
		File::delete('img/usuario/'.$response->img_informal_usuario);
		if(count($response)!=0){
			$response=0;
			$response = User::eliminar_usuario($id_usuario);
			if(count($response)!=0){
				return Redirect::to(URL::previous())->withMensaje('Usuario Eliminado Correctamente!');
			}else{
				return Redirect::to(URL::previous())->withError('Ha ocurrido un error!');
			}
		}else{
			return Redirect::to(URL::previous())->withError('Usuario no válido');
		}
	}
//FIN USUARIOS

//INICIO INFORMES
	public function listarInformes($id_usuario){
		$response = 0;
		$response = user::buscar_usuario($id_usuario);
		if(count($response)!=0){
				return View::make('pruebas.informe')->withInformes(Informe::listar_informes(3,$id_usuario))->withUsuario($id_usuario);
		}else{
			return View::make('pruebas.informe')->withError('No existe un usuario para ingresar informes');
		}
	}

	public function guardarInforme(){
		$response=0;
		$response = User::buscar_usuario(e(Input::get('usuario_informe')));
		if(count($response)!=0){
			$id_informe = Informe::codigo_nuevo_informe();
			$descripcion_informe = e(Input::get('descripcion_informe'));
			$codigo_informe = e(Input::get('codigo_informe'));
			$archivo_informe = Input::file('archivo_informe');
			$usuario_id_usuario = e(Input::get('usuario_informe'));
			$archivo_informe_nombre = $id_informe.'_archivoInforme.'.$archivo_informe->getClientOriginalExtension();
			$response = 0;
			$response = Informe::insertar_informe($id_informe, $descripcion_informe, $codigo_informe, $archivo_informe_nombre, $usuario_id_usuario);
			if(count($response)!=0){
				$archivo_informe->move('img/informe',$archivo_informe_nombre);
				return Redirect::to(URL::previous())->withMensaje('Informe insertado correctamente.');
			}else{
				return Redirect::to(URL::previous())->withError('Ha ocurrido un error!');
			}
		}else{
			return Redirect::to(URL::previous())->withError('No es un usuario válido!');
		}
	}

	public function actualizarInforme(){
		$response = User::buscar_usuario(e(Input::get('usuario')));
		if(count($response)!=0){
			$id_informe = e(Input::get('id_informe'));
			$descripcion_informe = e(Input::get('descripcion_informe'));
			$codigo_informe = e(Input::get('codigo_informe'));
			$usuario_id_usuario = e(Input::get('usuario'));


			$informe = Informe::buscar_informe($id_informe);
			if(!is_null(Input::file('archivo_informe'))){
				$archivo_informe_viejo = $informe->archivo_informe;
				$archivo_informe = Input::file('archivo_informe');
				$archivo_informe_nombre = $id_informe.'_archivoInforme.'.$archivo_informe->getClientOriginalExtension();
			}else{
				$archivo_informe_nombre = $informe->archivo_informe;
			}


			$response = 0;
			$response = Informe::actualizar_informe($id_informe, $descripcion_informe, $codigo_informe, $archivo_informe_nombre, $usuario_id_usuario);
			if(count($response) == 1){
				if(!is_null(Input::file('archivo_informe'))){
					File::delete('img/informe/'.$archivo_informe_viejo);
					$archivo_informe->move('img/informe',$archivo_informe_nombre);
				}
				return Redirect::to(URL::previous())->withMensaje('Informe Actualizado Correctamente');
			}else{
				return Redirect::to(URL::previous())->withMensaje('Ha ocurrido un error');
			}
		}else{
			return Redirect::to(URL::previous())->withError('No es un usuario válido!');
		}
	}

	public function buscarInforme(){
		$response=0;
		$id_informe=e(Input::get('id_informe'));
		$response = Informe::buscar_informe($id_informe);
		if(count($response)!=0){
			return Redirect::to(URL::previous())->withMensaje($response->id_informe);
		}else{
			return Redirect::to(URL::previous())->withMensaje('No se ha encontrado informe '.$id_informe.'!');
		}
	}

	public function eliminarInforme(){
		$response = 0;
		$id_informe = e(Input::get('id_informe'));
		$response = Informe::buscar_informe($id_informe);
		//borrando archivos

		if(count($response)!=0){
			File::delete('img/informe/'.$response->archivo_informe);
			$response=0;
			$response = Informe::eliminar_informe($id_informe);
			if(count($response)!=0){
				return Redirect::to(URL::previous())->withMensaje('Informe Eliminado Correctamente!');
			}else{
				return Redirect::to(URL::previous())->withError('Ha ocurrido un error!');
			}
		}else{
			return Redirect::to(URL::previous())->withError('Informe no válido');
		}
	}

//FIN INFORMES

}
