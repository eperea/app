<?php

class ControladorCajaUbicacion{

	/*=============================================
	MOSTRAR CajasUbicacion
	=============================================*/

	static public function ctrMostrarCajaUbicacion($item, $valor){

		$tabla = null;

		$respuesta = ModeloCajaUbicacion::mdlMostrarCajaUbicacion($tabla, $item, $valor);

		return $respuesta;
	
	}


}
 