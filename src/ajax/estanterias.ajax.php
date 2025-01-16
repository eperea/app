<?php

require_once "../controladores/estanteria.controlador.php";
require_once "../modelos/estanteria.modelo.php";

class AjaxEstanterias{

	/*=============================================
	EDITAR Estanteria
	=============================================*/	

	public $idEstanteria;

	public function ajaxEditarEstanteria(){
	

		$item = "idEstanteria";
		$valor = $this->idEstanteria;

		$respuesta = ControladorEstanterias::ctrMostrarEstanterias($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR Estanteria
=============================================*/	
if(isset($_POST["idEstanteria"])){

	$Estanteria = new AjaxEstanterias();
	$Estanteria -> idEstanteria = $_POST["idEstanteria"];
	$Estanteria -> ajaxEditarEstanteria();
}
