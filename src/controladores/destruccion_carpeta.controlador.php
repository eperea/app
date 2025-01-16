<?php

class ControladorCarpetas{

	/*=============================================
	MOSTRAR Carpetas
	=============================================*/

	static public function ctrMostrarCarpetas($item, $valor){

		$tabla = "destruccion_carpetas1";

		$respuesta = ModeloCarpetas::mdlMostrarCarpetas($tabla, $item, $valor);

		return $respuesta;
	
	}


}
