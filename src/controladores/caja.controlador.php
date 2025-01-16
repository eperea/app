<?php



class ControladorCajas{



/*==============================================================

	CREAR Cajas

================================================================*/



static public function ctrCrearCajas(){



		if(isset($_POST["nuevoTipo"])){



			if(

			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombreCaja"])){



				$tabla = "caja";



				$datos = array("caja_tipo"=>$_POST["nuevoTipo"],

			                   "caja_codigo"=>$_POST["nuevoCodigo"],

		                       "caja_prefijo"=>$_POST["nuevoPrefijo"],

	                           "caja_sufijo"=>$_POST["nuevoSufijo"],

                               "idEstanteria"=>$_POST["nuevoNombreCaja"]);



				$respuesta = ModeloCajas::mdlIngresarCajas($tabla, $datos);



				if($respuesta == "ok"){



					echo'<script>



					swal({

						  type: "success",

						  title: "La Caja ha sido guardada correctamente",

						  showConfirmButton: true,

						  confirmButtonText: "Cerrar"

						  }).then(function(result){

									if (result.value) {



									window.location = "caja";



									}

								})



					</script>';



				}







}else{



				echo'<script>



					swal({

						  type: "error",

						  title: "¡La Caja no puede ir vacía o llevar caracteres especiales o no hay estanterias creadas!",

						  showConfirmButton: true,

						  confirmButtonText: "Cerrar"

						  }).then(function(result){

							if (result.value) {



							window.location = "caja";



							}

						})



	  	</script>';



			}



		}



	}





	/*=============================================

	MOSTRAR Caja

	=============================================*/



	static public function ctrMostrarCajas($item, $valor){



		$tabla = "caja";



		$respuesta = ModeloCajas::mdlMostrarCajas($tabla, $item, $valor);



		return $respuesta;

	

	}







/*=============================================

	EDITAR CAJA

	=============================================*/



	static public function ctrEditarCaja(){



		if(isset($_POST["editarCaja"])){



			if(

			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarCaja"])){

				$tabla = "caja";



				$datos = array("idCaja"=>$_POST["editarnuevaCaja"],

					           "caja_tipo"=>$_POST["editarnuevoTipo"],

			                   "caja_codigo"=>$_POST["editarnuevoCodigo"],

		                       "caja_prefijo"=>$_POST["editarnuevoPrefijo"],

	                           "caja_sufijo"=>$_POST["editarnuevoSufijo"],

					           "idEstanteria"=>$_POST["editarCaja"]);



				$respuesta = ModeloCajas::mdlEditarCaja($tabla, $datos);



				if($respuesta == "ok"){



					echo'<script>



					swal({

						  type: "success",

						  title: "La Caja ha sido cambiada correctamente",

						  showConfirmButton: true,

						  confirmButtonText: "Cerrar"

						  }).then(function(result){

									if (result.value) {



									window.location = "caja";



									}

								})



					</script>';



				}





			}else{



				echo'<script>



					swal({

						  type: "error",

						  title: "¡La Caja no puede ir vacía o llevar caracteres especiales!",

						  showConfirmButton: true,

						  confirmButtonText: "Cerrar"

						  }).then(function(result){

							if (result.value) {



							window.location = "caja";



							}

						})



			  	</script>';



			}



		}



	}



/*=============================================

	ELIMINAR CLIENTE

	=============================================*/



	static public function ctrEliminarCaja(){



		if(isset($_GET["idCaja"])){



			$tabla ="caja";

			$datos = $_GET["idCaja"];



			$respuesta = ModeloCajas::mdlEliminarCaja($tabla, $datos);



			if($respuesta == "ok"){



				echo'<script>



				swal({

					  type: "success",

					  title: "La Caja ha sido borrada correctamente",

					  showConfirmButton: true,

					  confirmButtonText: "Cerrar",

					  closeOnConfirm: false

					  }).then(function(result){

								if (result.value) {



								window.location = "caja";



								}

							})



				</script>';



			}	else{		
			    
			    
			   echo'<script>



					swal({

						  type: "error",

						  title: "¡No se puede borrar la caja. Hay carpetas relacionadas a ella.!",

						  showConfirmButton: true,

						  confirmButtonText: "Cerrar"

						  }).then(function(result){

							if (result.value) {



							window.location = "caja";



							}

						})



			  	</script>';
			    
			    
			    
			}
	



		}



	}











}





