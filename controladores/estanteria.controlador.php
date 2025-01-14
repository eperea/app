<?php

class ControladorEstanterias{

/*==============================================================
	CREAR EstanteriaS
================================================================*/

static public function ctrCrearEstanterias(){

		if(isset($_POST["nuevonum_estante"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevonum_estante"])){

				$tabla = "estanteria";

				$datos = array("num_estante"=>$_POST["nuevonum_estante"], 
			                   "num_entrepano"=>$_POST["nuevonum_entrepano"],
			                   "bloque"=>$_POST["nuevobloque"],
			                   "idDeposito"=>$_POST["nuevoidDeposito"]);

				$respuesta = ModeloEstanterias::mdlIngresarEstanterias($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La estanteria ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "estanteria";

									}
								})

					</script>';

				}



}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La estanteria no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "estanteria";

							}
						})

	  	</script>';

			}

		}

	}


	/*=============================================
	MOSTRAR CATEGORIAS
	=============================================*/

	static public function ctrMostrarEstanterias($item, $valor){

		$tabla = "estanteria";

		$respuesta = ModeloEstanterias::mdlMostrarEstanterias($tabla, $item, $valor);

		return $respuesta;
	
	}
	
		/*=============================================
	MOSTRAR DEPOSITO EN EL CAMPO ESTANTERIA DEL MODULO CAJAS
	=============================================*/

	static public function ctrMostrarEstanterias1($item, $valor){

		$tabla = "estanteria";

		$respuesta = ModeloEstanterias::mdlMostrarEstanterias1($tabla, $item, $valor);

		return $respuesta;
	
	}



	



/*=============================================
	EDITAR CATEGORIA
	=============================================*/

	static public function ctrEditarEstanteria(){

		if(isset($_POST["editarnuevonum_estante"])){

			if(
		       preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarnuevonum_estante"])){

				$tabla = "estanteria";

				$datos = array("idEstanteria"=>$_POST["editarnuevaEstanteria"],
					           "num_estante"=>$_POST["editarnuevonum_estante"],
					           "num_entrepano"=>$_POST["editarnuevonum_entrepano"],
					           "bloque"=>$_POST["editarnuevobloque"],
					           "idDeposito"=>$_POST["editarnuevoidDeposito"]);

				$respuesta = ModeloEstanterias::mdlEditarEstanteria($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La estanteria ha sido cambiada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "estanteria";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La Estanteria no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "estanteria";

							}
						})

			  	</script>';

			}

		}

	}

/*=============================================
	ELIMINAR CLIENTE
	=============================================*/

	static public function ctrEliminarEstanteria(){

		if(isset($_GET["idEstanteria"])){

			$tabla ="estanteria";
			$datos = $_GET["idEstanteria"];

			$respuesta = ModeloEstanterias::mdlEliminarEstanteria($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "La estanteria  ha sido borrada correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result){
								if (result.value) {

								window.location = "estanteria";

								}
							})

				</script>';

			}else{		
			    
			    
			   echo'<script>



					swal({

						  type: "error",

						  title: "¡No se puede borrar la estantería (Bandeja). Hay cajas relacionadas a ella.!",

						  showConfirmButton: true,

						  confirmButtonText: "Cerrar"

						  }).then(function(result){

							if (result.value) {



							window.location = "estanteria";



							}

						})



			  	</script>';
			    
			    
			    
			}
		

		}

	}





}
