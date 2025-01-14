<?php

require_once "../controladores/prestamo.controlador.php";
require_once "../modelos/prestamo.modelo.php";

class AjaxPrestamos{

	/*=============================================
	EDITAR PRESTAMO
	=============================================*/	

	public $idPrestamo;

	public function ajaxEditarPrestamo(){
	

		$item = "idPrestamo";
		$valor = $this->idPrestamo;

		$respuesta = ControladorPrestamos::ctrMostrarPrestamos($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR PRESTAMO
=============================================*/	
if(isset($_POST["idPrestamo"])){

	$serie = new AjaxPrestamos();
	$serie -> idPrestamo = $_POST["idPrestamo"];
	$serie -> ajaxEditarPrestamo();
}
