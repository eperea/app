<?php

class ControladorDocumentos{

	/*=============================================
	MOSTRAR Documentos
	=============================================*/

	static public function ctrMostrarDocumentos($item, $valor){

		$tabla = "documentos";

		$respuesta = ModeloDocumentos::mdlMostrarDocumentos($tabla, $item, $valor);

		return $respuesta;
	
	}


}
