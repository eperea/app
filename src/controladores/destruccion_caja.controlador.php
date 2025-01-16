<?php

class ControladorCajaDestruccion{

	/*=============================================
	MOSTRAR CajasDestruccion
	=============================================*/

	static public function ctrMostrarCajaDestruccion($item, $valor){

		$tabla = "destruccion_caja2";

		$respuesta = ModeloCajaDestruccion::mdlMostrarCajaDestruccion($tabla, $item, $valor);

		return $respuesta;
	
	}


}
