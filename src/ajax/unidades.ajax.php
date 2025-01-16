<?php



require_once "../controladores/unidades.controlador.php";

require_once "../modelos/unidades.modelo.php";



class AjaxUnidades{



	/*=============================================

	EDITAR UNIDAD

	=============================================*/	



	public $idUnidad;



	public function ajaxEditarUnidad(){

	



		$item = "idUnidaddocumental";

		$valor = $this->idUnidad;



		$respuesta = ControladorUnidades::ctrMostrarUnidades($item, $valor);



		echo json_encode($respuesta);



	}

}



/*=============================================

EDITAR SERIE

=============================================*/	

if(isset($_POST["idUnidad"])){



	$serie = new AjaxUnidades();

	$serie -> idUnidad = $_POST["idUnidad"];

	$serie -> ajaxEditarUnidad();

}

