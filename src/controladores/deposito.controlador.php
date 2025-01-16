<?php

class ControladorDepositos{

/*==============================================================
	CREAR Depositos
================================================================*/

static public function ctrCrearDepositos(){

		if(isset($_POST["nuevoSigla"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoSigla"])){

				$tabla = "deposito";

				$datos = array("dep_sigla"=>$_POST["nuevoSigla"],
			                   "dep_nombre"=>$_POST["nuevoNombre"],
			                   "dep_num_tipoalma"=>$_POST["nuevoTipoalma"]);

				$respuesta = ModeloDepositos::mdlIngresarDepositos($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La bodega ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "deposito";

									}
								})

					</script>';

				}



}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La bodega no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "deposito";

							}
						})

	  	</script>';

			}

		}

	}


	/*=============================================
	MOSTRAR DEPOSITO
	=============================================*/

	static public function ctrMostrarDepositos($item, $valor){

		$tabla = "deposito";

		$respuesta = ModeloDepositos::mdlMostrarDepositos($tabla, $item, $valor);

		return $respuesta;
	
	}



/*=============================================
	EDITAR DEPOSITO
	=============================================*/

	static public function ctrEditarDeposito(){

		if(isset($_POST["editarnuevoNombre"])){

			if(
		       preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarnuevoNombre"])){

				$tabla = "deposito";

				$datos = array("id"=>$_POST["editarnuevoDeposito"],
					           "dep_sigla"=>$_POST["editarnuevoSigla"],
			                   "dep_nombre"=>$_POST["editarnuevoNombre"],
			                   "dep_num_tipoalma"=>$_POST["editarnuevoTipoalma"]);

				$respuesta = ModeloDepositos::mdlEditarDeposito($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La bodega ha sido cambiada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "deposito";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La bodega no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "deposito";

							}
						})

			  	</script>';

			}

		}

	}

/*=============================================
	ELIMINAR CLIENTE
	=============================================*/

	static public function ctrEliminarDeposito(){

		if(isset($_GET["idDeposito"])){

			$tabla ="deposito";
			$datos = $_GET["idDeposito"];

			$respuesta = ModeloDepositos::mdlEliminarDeposito($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "La deposito  ha sido borrada correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result){
								if (result.value) {

								window.location = "deposito";

								}
							})

				</script>';

			}else{		
			    
			    
			   echo'<script>



					swal({

						  type: "error",

						  title: "¡No se puede borrar la bodega. Hay estantería(s) relacionadas a ella.!",

						  showConfirmButton: true,

						  confirmButtonText: "Cerrar"

						  }).then(function(result){

							if (result.value) {



							window.location = "deposito";



							}

						})



			  	</script>';
			    
			    
			    
			}
		

		}

	}





}
