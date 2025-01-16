<?php

class ControladorEmpresas{

/*==============================================================
	CREAR Empresas
================================================================*/

static public function ctrCrearEmpresas(){

		if(isset($_POST["nuevoNombreSig"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaEmpresa"])&& 
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombreEmpresa"])){

				$tabla = "empresa";

				$datos = array("idEmpresa"=>$_POST["nuevaEmpresa"],					          
					           "EmpNombreempresa"=>$_POST["nuevoNombreEmpresa"],
					           "emnit"=>$_POST["nuevoNombreNit"],	
					           "emsigla"=>$_POST["nuevoNombreSig"],	
					           "emrepresentante"=>$_POST["nuevoNombreRep"],	
					           "emdireccion"=>$_POST["nuevoNombreDir"],	
					           "emtelefono"=>$_POST["nuevoNombreTel"],	
					           "ememail"=>$_POST["nuevoNombreEmail"]);

				$respuesta = ModeloEmpresas::mdlIngresarEmpresas($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La empresa ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "empresa";

									}
								})

					</script>';

				}else{
				    
				    echo'<script>

					swal({
						  type: "warning",
						  title: "¡El codigo de la empresa ya existe. Por favor ingrese un codigo diferente!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "empresa";

									}
								})

					</script>';
				    
				}



}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La empresa no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "empresa";

							}
						})

	  	</script>';

			}

		}

	}


	/*=============================================
	MOSTRAR EMPRESA
	=============================================*/

	static public function ctrMostrarEmpresas($item, $valor){

		$tabla = "empresa";

		$respuesta = ModeloEmpresas::mdlMostrarEmpresas($tabla, $item, $valor);

		return $respuesta;
	
	}



/*=============================================
	EDITAR CATEGORIA
	=============================================*/

	static public function ctrEditarEmpresa(){

		if(isset($_POST["editarEmpresa"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarnuevaEmpresa"])&& 
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarEmpresa"])){

				$tabla = "empresa";

				$datos = array("idEmpresa"=>$_POST["editarnuevaEmpresa"],
					           "EmpNombreempresa"=>$_POST["editarEmpresa"],
					           "emnit"=>$_POST["editarEmpresaNit"],	
					           "emsigla"=>$_POST["editarEmpresaSig"],	
					           "emrepresentante"=>$_POST["editarEmpresaRep"],	
					           "emdireccion"=>$_POST["editarEmpresaDir"],	
					           "emtelefono"=>$_POST["editarEmpresaTel"],	
					           "ememail"=>$_POST["editarEmpresaEmail"]);

				$respuesta = ModeloEmpresas::mdlEditarEmpresa($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La empresa ha sido cambiada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "empresa";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La empresa no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "empresa";

							}
						})

			  	</script>';

			}

		}

	}

/*=============================================
	ELIMINAR CLIENTE
	=============================================*/

	static public function ctrEliminarEmpresa(){

		if(isset($_GET["idEmpresa"])){

			$tabla ="empresa";
			$datos = $_GET["idEmpresa"];

			$respuesta = ModeloEmpresas::mdlEliminarEmpresa($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "La empresa ha sido borrada correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result){
								if (result.value) {

								window.location = "empresa";

								}
							})

				</script>';

			}		

		}

	}





}
