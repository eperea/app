<?php

require_once "../controladores/sede.controlador.php";
require_once "../modelos/sede.modelo.php";

class AjaxSedes{

	/*=============================================
	EDITAR SEDE
	=============================================*/	

	public $idSede;

	public function ajaxEditarSede(){
	

		$item = "idSede";
		$valor = $this->idSede;

		$respuesta = ControladorSedes::ctrMostrarSedes($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR SEDE
=============================================*/	
if(isset($_POST["idSede"])){

	$Sede = new AjaxSedes();
	$Sede -> idSede = $_POST["idSede"];
	$Sede -> ajaxEditarSede();
}
