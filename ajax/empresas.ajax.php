<?php

require_once "../controladores/empresa.controlador.php";
require_once "../modelos/empresa.modelo.php";

class AjaxEmpresas{

	/*=============================================
	EDITAR SERIE
	=============================================*/	

	public $idEmpresa;

	public function ajaxEditarEmpresa(){
	

		$item = "idEmpresa";
		$valor = $this->idEmpresa;

		$respuesta = ControladorEmpresas::ctrMostrarEmpresas($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR Empresa
=============================================*/	
if(isset($_POST["idEmpresa"])){

	$empresa = new AjaxEmpresas();
	$empresa -> idEmpresa = $_POST["idEmpresa"];
	$empresa -> ajaxEditarEmpresa();
}
