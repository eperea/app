<?php

require_once "../controladores/deposito.controlador.php";
require_once "../modelos/deposito.modelo.php";

class AjaxDepositos{

	/*=============================================
	EDITAR Deposito
	=============================================*/	

	public $idDeposito;

	public function ajaxEditarDeposito(){
	

		$item = "id";
		$valor = $this->idDeposito;

		$respuesta = ControladorDepositos::ctrMostrarDepositos($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
Eliminar Deposito
=============================================*/	
if(isset($_POST["idDeposito"])){

	$Deposito = new AjaxDepositos();
	$Deposito -> idDeposito = $_POST["idDeposito"];
	$Deposito -> ajaxEditarDeposito();
}
