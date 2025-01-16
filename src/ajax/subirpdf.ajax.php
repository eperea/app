<?php

require_once "../controladores/subirpdf.controlador.php";
require_once "../modelos/subirpdf.modelo.php";

class AjaxSubir{

	/*=============================================
	EDITAR SEDE
	=============================================*/	

	public $idSubir;

	public function ajaxEditarSubir(){
	

		$item = "id_documento";
		$valor = $this->idSubir;

		$respuesta = ControladorSubirPdf::ctrMostrarSubirPdf($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR SEDE
=============================================*/	
if(isset($_POST["idSubir"])){

	$Subir = new AjaxSubir();
	$Subir -> idSubir = $_POST["idSubir"];
	$Subir -> ajaxEditarSubir();
}
