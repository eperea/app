<?php

require_once "../controladores/caja.controlador.php";
require_once "../modelos/caja.modelo.php";

class AjaxCajas{

	/*=============================================
	EDITAR Caja
	=============================================*/	

	public $idCaja;

	public function ajaxEditarCaja(){
	

		$item = "idCaja";
		$valor = $this->idCaja;

		$respuesta = ControladorCajas::ctrMostrarCajas($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR Caja
=============================================*/	
if(isset($_POST["idCaja"])){

	$Caja = new AjaxCajas();
	$Caja -> idCaja = $_POST["idCaja"];
	$Caja -> ajaxEditarCaja();
}
