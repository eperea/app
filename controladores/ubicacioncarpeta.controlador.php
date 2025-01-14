<?php

class ControladorCarpetaUbicacion{

	/*=============================================
	MOSTRAR CarpetasUbicacion
	=============================================*/

	static public function ctrMostrarCarpetaUbicacion($item, $valor){

		$tabla = null;

		$respuesta = ModeloCarpetaUbicacion::mdlMostrarCarpetaUbicacion($tabla, $item, $valor);

		return $respuesta;
	
	}


}
 