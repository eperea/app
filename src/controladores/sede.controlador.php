<?php

class ControladorSedes{

/*==============================================================
	CREAR Empresas
================================================================*/

static public function ctrCrearSedes(){

		if(isset($_POST["nuevaSede"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaSede"])&& 
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombreSede"])){

				$tabla = "sede";

				$datos = array("idSede"=>$_POST["nuevaSede"],					          
					           "SedLocalizacion"=>$_POST["nuevoNombreSede"]);

				$respuesta = ModeloSedes::mdlIngresarSedes($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La sede ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "sede";

									}
								})

					</script>';

				}else{
				    
				    echo'<script>

					swal({
						  type: "warning",
						  title: "¡El "id" de la sede ya existe. Por favor ingrese un "id" diferente!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "sede";

									}
								})

					</script>';
				    
				}



}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La sede no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "sede";

							}
						})

	  	</script>';

			}

		}

	}


	/*=============================================
	MOSTRAR EMPRESA
	=============================================*/

	static public function ctrMostrarSedes($item, $valor){

		$tabla = "sede";

		$respuesta = ModeloSedes::mdlMostrarSedes($tabla, $item, $valor);

		return $respuesta;
	
	}



/*=============================================
	EDITAR CATEGORIA
	=============================================*/

	static public function ctrEditarSede(){

		if(isset($_POST["editarSede"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarnuevaSede"])&& 
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarSede"])){
				$tabla = "sede";

				$datos = array("idSede"=>$_POST["editarnuevaSede"],
					           "SedLocalizacion"=>$_POST["editarSede"]);

				$respuesta = ModeloSedes::mdlEditarSede($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La sede ha sido cambiada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "sede";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La sede no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "sede";

							}
						})

			  	</script>';

			}

		}

	}

/*=============================================
	ELIMINAR CLIENTE
	=============================================*/

	static public function ctrEliminarSede(){

		if(isset($_GET["idSede"])){

			$tabla ="sede";
			$datos = $_GET["idSede"];

			$respuesta = ModeloSedes::mdlEliminarSede($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "La sede ha sido borrada correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result){
								if (result.value) {

								window.location = "sede";

								}
							})

				</script>';

			}		

		}

	}





}
