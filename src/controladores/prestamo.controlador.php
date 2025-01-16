<?php

class ControladorPrestamos{

/*==============================================================
	CREAR SERIES
================================================================*/

static public function ctrCrearPrestamos(){

		
		if(isset($_POST["descDocumento"])){

			if(
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ.,:@$?¡\-_()* ]+$/', $_POST["descDocumento"])&& 	
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["pres_prioridad"])&& 	
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["pres_formato"])&& 			   			    
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["funcionario"])&& 
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["pres_estado"])&& 
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ.,:@$?¡\-_()* ]+$/', $_POST["observaciones"])){

				$tabla = "prestamo";




				$datos = array("descDocumento"=>$_POST["descDocumento"],
							   "pres_prioridad"=>$_POST["pres_prioridad"],
							   "pres_formato"=>$_POST["pres_formato"],
							   "funcionario"=>$_POST["funcionario"],
							   "pres_estado"=>$_POST["pres_estado"],
							   "observaciones"=>$_POST["observaciones"]);	
							 
				$respuesta = ModeloPrestamos::mdlIngresarPrestamos($tabla, $datos);

				if($respuesta == "ok"){


					/*=============================================
					ACTUALIZAR NOTIFICACIONES NUEVOS PRESTAMOS
					=============================================*/

					$traerNotificaciones = ControladorNotificaciones::ctrMostrarNotificaciones();

					$nuevoUsuario = $traerNotificaciones["nuevas_consultas"] + 1;

					ModeloNotificaciones::mdlActualizarNotificaciones("notificaciones", "nuevas_consultas", $nuevoUsuario);


					/*=============================================
					ALERTAS
					=============================================*/


					echo'<script>

					swal({
						  type: "success",
						  title: "La solicitud ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"	
						  }).then(function(result){
									if (result.value) {

									window.location = "prestamo";

									}
								})

					</script>';

				}



}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El Prestamo documental no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "prestamo";

							}
						})

	  	</script>';

			}

		}

	}


	/*=============================================
	MOSTRAR Prestamos
	=============================================*/

	static public function ctrMostrarPrestamos($item, $valor){

		$tabla = "prestamo";

		$respuesta = ModeloPrestamos::mdlMostrarPrestamos($tabla, $item, $valor);

		return $respuesta;
	
	}

		/*=============================================
	MOSTRAR DOCUMENTOS PRESTADOS
	=============================================*/

	static public function ctrMostrarPrestados($item1, $valor){

		$tabla = "prestamo";

		$respuesta = ModeloPrestamos::mdlMostrarPrestados($tabla, $item1, $valor);
		
		

		return $respuesta;
	
	}

	
/*=============================================
	EDITAR Prestamos
	=============================================*/

	static public function ctrEditarPrestamo(){

		
		if(isset($_POST["editardescDocumento"])){

			if($_POST["editarobservaciones"]){

				$tabla = "prestamo";




				$datos = array("idPrestamo"=>$_POST["idPrestamo"],
							   "fechaEntrega"=>$_POST["editarfechaEntrega"],
						       "descDocumento"=>$_POST["editardescDocumento"],
						       "pres_prioridad"=>$_POST["editar_pres_prioridad"],
						       "pres_formato"=>$_POST["editar_pres_formato"],
							   "folios"=>$_POST["editarnuevoFolio"],	
							   "funcionario"=>$_POST["editarfuncionario"],
							   "fechaDevolucion"=>$_POST["editarfechaDevolucion"],	
							   "funcionarioRec"=>$_POST["editarnuevoFuncionarioRec"],	
							   "pres_estado"=>$_POST["editar_pres_estado"],
							   "observaciones"=>$_POST["editarobservaciones"]);	

				$respuesta = ModeloPrestamos::mdlEditarPrestamo($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El Prestamo documental ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "prestamo";

									}
								})

					</script>';

				}



}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El Prestamo documental no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "prestamo";

							}
						})

	  	</script>';

			}

		}

	}




/*=============================================
	ELIMINAR Prestamo
	=============================================*/

	static public function ctrEliminarPrestamo(){

		if(isset($_GET["idPrestamo"])){

			$tabla ="prestamo";
			
			$datos = $_GET["idPrestamo"];

			$respuesta = ModeloPrestamos::mdlEliminarPrestamo($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El prestamo documental ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result){
								if (result.value) {

								window.location = "prestamo";

								}
							})

				</script>';

			}		

		}

	}

	





}
