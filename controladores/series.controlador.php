<?php



class ControladorSeries{



/*==============================================================

	CREAR SERIES

================================================================*/



static public function ctrCrearSeries(){ 



		if(isset($_POST["nuevaSerie"])){



			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaSerie"])&& 

			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombreSerie"])){



				$tabla = "series";



				$datos = array("codigo_serie"=>$_POST["nuevaSerie"],					          

					           "nombreSerie"=>$_POST["nuevoNombreSerie"],

					           "seriesIni"=>$_POST["seriesIni"],

					           "seriesFin"=>$_POST["seriesFin"]





					       );



				$respuesta = ModeloSeries::mdlIngresarSeries($tabla, $datos);



				if($respuesta == "ok"){



					echo'<script>



					swal({

						  type: "success",

						  title: "La serie documental ha sido guardada correctamente",

						  showConfirmButton: true,

						  confirmButtonText: "Cerrar"

						  }).then(function(result){

									if (result.value) {



									window.location = "series";



									}

								})



					</script>';



				}else{
				    
				    echo'<script>

					swal({
						  type: "warning",
						  title: "¡El codigo de la carpeta ya existe. Por favor ingrese un codigo diferente!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "series";

									}
								})

					</script>';
				    
				}







}else{



				echo'<script>



					swal({

						  type: "error",

						  title: "¡La serie no puede ir vacía o llevar caracteres especiales!",

						  showConfirmButton: true,

						  confirmButtonText: "Cerrar"

						  }).then(function(result){

							if (result.value) {



							window.location = "series";



							}

						})



	  	</script>';



			}



		}



	}





	/*=============================================

	MOSTRAR CATEGORIAS

	=============================================*/



	static public function ctrMostrarSeries($item, $valor){



		$tabla = "series";



		$respuesta = ModeloSeries::mdlMostrarSeries($tabla, $item, $valor);



		return $respuesta;

	

	}







/*=============================================

	EDITAR CATEGORIA

	=============================================*/



	static public function ctrEditarSerie(){



		if(isset($_POST["editarSerie"])){



			if(

		       preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarSerie"])){



				$tabla = "series";



				$datos = array("idSeries"=>$_POST["editarnuevaSerie"],

					           "codigo_serie"=>$_POST["editarnuevaCodigo"],

					           "nombreSerie"=>$_POST["editarSerie"],

					           "seriesIni"=>$_POST["editarseriesIni"],

					           "seriesFin"=>$_POST["editarseriesFin"]

					       );



				$respuesta = ModeloSeries::mdlEditarSerie($tabla, $datos);



				if($respuesta == "ok"){



					echo'<script>



					swal({

						  type: "success",

						  title: "La serie documental ha sido cambiada correctamente",

						  showConfirmButton: true,

						  confirmButtonText: "Cerrar"

						  }).then(function(result){

									if (result.value) {



									window.location = "series";



									}

								})



					</script>';



				}





			}else{



				echo'<script>



					swal({

						  type: "error",

						  title: "¡La serie no puede ir vacía o llevar caracteres especiales!",

						  showConfirmButton: true,

						  confirmButtonText: "Cerrar"

						  }).then(function(result){

							if (result.value) {



							window.location = "series";



							}

						})



			  	</script>';



			}



		}



	}



/*=============================================

	ELIMINAR CLIENTE

	=============================================*/



	static public function ctrEliminarSerie(){



		if(isset($_GET["idSerie"])){



			$tabla ="series";

			$datos = $_GET["idSerie"];



			$respuesta = ModeloSeries::mdlEliminarSerie($tabla, $datos);



			if($respuesta == "ok"){



				echo'<script>



				swal({

					  type: "success",

					  title: "La serie documental ha sido borrada correctamente",

					  showConfirmButton: true,

					  confirmButtonText: "Cerrar",

					  closeOnConfirm: false

					  }).then(function(result){

								if (result.value) {



								window.location = "series";



								}

							})



				</script>';



			}		



		}



	}











}

