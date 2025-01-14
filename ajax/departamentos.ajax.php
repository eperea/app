<?php

require_once "../controladores/departamento.controlador.php";
require_once "../modelos/departamento.modelo.php";

class AjaxDepartamentos{

	/*=============================================
	EDITAR Departamento
	=============================================*/	

	public $idDepartamento;

	public function ajaxEditarDepartamento(){
	

		$item = "idDepartamento";
		$valor = $this->idDepartamento;

		$respuesta = ControladorDepartamentos::ctrMostrarDepartamentos($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR Departamento
=============================================*/	
if(isset($_POST["idDepartamento"])){

	$Departamento = new AjaxDepartamentos();
	$Departamento -> idDepartamento = $_POST["idDepartamento"];
	$Departamento -> ajaxEditarDepartamento();
}
