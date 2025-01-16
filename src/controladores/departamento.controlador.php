<?php

class ControladorDepartamentos{

/*==============================================================
	CREAR Departamentos
================================================================*/

static public function ctrCrearDepartamentos(){

		if(isset($_POST["nuevaDepartamento"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaDepartamento"])&& 
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombreDepartamento"])){

				$tabla = "departamento";

				$datos = array("idDepartamento"=>$_POST["nuevaDepartamento"],					          
					           "DepCodigo"=>$_POST["nuevoNombreDepartamento"],
					           "empSigla"=>$_POST["nuevoNombreSigla"],
					   		   "empDirec"=>$_POST["nuevoNombreDir"],
							   "empActAdm"=>$_POST["nuevoNombreAct"]);

				$respuesta = ModeloDepartamentos::mdlIngresarDepartamentos($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La Departamento ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "departamento";

									}
								})

					</script>';

				}else{
				    
				    echo'<script>

					swal({
						  type: "warning",
						  title: "¡El codigo del departamento ya existe. Por favor ingrese un codigo diferente!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "departamento";

									}
								})

					</script>';
				    
				}



}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La Departamento no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "departamento";

							}
						})

	  	</script>';

			}

		}

	}


	/*=============================================
	MOSTRAR Departamento
	=============================================*/

	static public function ctrMostrarDepartamentos($item, $valor){

		$tabla = "departamento";

		$respuesta = ModeloDepartamentos::mdlMostrarDepartamentos($tabla, $item, $valor);

		return $respuesta;
	
	}


 
/*=============================================
	EDITAR CATEGORIA
	=============================================*/

	static public function ctrEditarDepartamento(){

		if(isset($_POST["editarDepartamento"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarnuevaDepartamento"])&& 
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarDepartamento"])){
				$tabla = "departamento";

				$datos = array("idDepartamento"=>$_POST["editarnuevaDepartamento"],
					           "DepCodigo"=>$_POST["editarDepartamento"],
					           "empSigla"=>$_POST["editarnuevaSigla"],
					   		   "empDirec"=>$_POST["editarnuevaDir"],
							   "empActAdm"=>$_POST["editarnuevaAct"]);

				$respuesta = ModeloDepartamentos::mdlEditarDepartamento($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La Departamento ha sido cambiada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "departamento";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La Departamento no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "departamento";

							}
						})

			  	</script>';

			}

		}

	}

/*=============================================
	ELIMINAR CLIENTE
	=============================================*/

	static public function ctrEliminarDepartamento(){

		if(isset($_GET["idDepartamento"])){

			$tabla ="departamento";
			$datos = $_GET["idDepartamento"];

			$respuesta = ModeloDepartamentos::mdlEliminarDepartamento($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "La Departamento ha sido borrada correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result){
								if (result.value) {

								window.location = "departamento";

								}
							})

				</script>';

			}		

		}

	}





}


