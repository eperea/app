<?php

require_once "../controladores/series.controlador.php";
require_once "../modelos/series.modelo.php";

class AjaxSeries{

	/*=============================================
	EDITAR SERIE
	=============================================*/	

	public $idSerie;

	public function ajaxEditarSerie(){
	

		$item = "idSeries";
		$valor = $this->idSerie;

		$respuesta = ControladorSeries::ctrMostrarSeries($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR SERIE
=============================================*/	
if(isset($_POST["idSerie"])){

	$serie = new AjaxSeries();
	$serie -> idSerie = $_POST["idSerie"];
	$serie -> ajaxEditarSerie();
}
