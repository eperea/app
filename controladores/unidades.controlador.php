<?php



class ControladorUnidades{



/*==============================================================

	CREAR SERIES

================================================================*/ 



static public function ctrCrearUnidades(){ 



		

		if(isset($_POST["nuevaUnidad"])){



			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaUnidad"])&& 			   

			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaSubserie"])&& 

			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ@$?¡\-_()* ]+$/', $_POST["nuevaUnidad1"])&& 

			  // preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ@$?¡\-_()*./-_ ]+$/', $_POST["descripcion"])&& 

			   preg_match('/^([0-9]{4})[\/.-]([0-9]{2})[\/.-]([0-9]{2})$/', $_POST["nuevaFechaIni"])&&

			   preg_match('/^([0-9]{4})[\/.-]([0-9]{2})[\/.-]([0-9]{2})$/', $_POST["nuevaFechafin"])&&

			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["conservacion"])&& 			 

			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaObservacion"])&& 

			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaEmpresa"])&& 

			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaSede"])&& 

			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaDepartamento"])&& 

			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaSerie_id"])){



				$tabla = "unidad_documental";















							

				$datos = array("codigo"=>$_POST["nuevaUnidad"],	

					           "codigo1"=>$_POST["nuevaUnidad1"],

					           "cod_subserie"=>$_POST["nuevaSubserie"],		

				               "descripcion"=>$_POST["descripcion"],	

				               "uni_rango"=>$_POST["uni_rango"],

							   "uni_rango1"=>$_POST["uni_rango1"],

							   "UniFechaInicio"=>$_POST["nuevaFechaIni"],

							   "UniFechafin"=>$_POST["nuevaFechafin"],

							   "tiemp_arch_gest"=>$_POST["nuevoTiempogest"],

							   "tiemp_arch_cent"=>$_POST["nuevoTiempocent"],	

							   "conservacion"=>$_POST["conservacion"],

							   "fechadestruccion"=>$_POST["fechadestruccion"],

							   "UniObservaciones"=>$_POST["nuevaObservacion"],	

							   "EMPRESA_idEmpresa"=>$_POST["nuevaEmpresa"],	

							   "SEDE_idSede"=>$_POST["nuevaSede"],	

							   "DEPARTAMENTO_idDepartamento"=>$_POST["nuevaDepartamento"],	

							   "SERIES_idSeries"=>$_POST["nuevaSerie_id"],

							   "uni_caja"=>$_POST["uni_caja"]);



				$respuesta = ModeloUnidades::mdlIngresarUnidades($tabla, $datos);
				echo '<pre>'; print_r($respuesta); echo '</pre>';



				if($respuesta == "ok"){


					/*=============================================
					ACTUALIZAR NOTIFICACIONES NUEVOS CARPETAS
					=============================================*/

					$traerNotificaciones = ControladorNotificaciones::ctrMostrarNotificaciones();

					$nuevoUsuario = $traerNotificaciones["nuevas_carpetas"] + 1;

					ModeloNotificaciones::mdlActualizarNotificaciones("notificaciones", "nuevas_carpetas", $nuevoUsuario);


					/*=============================================
					ALERTAS
					=============================================*/



					echo'<script>



					swal({

						  type: "success",

						  title: "La unidad documental ha sido guardada correctamente",

						  showConfirmButton: true,

						  confirmButtonText: "Cerrar"

						  }).then(function(result){

									if (result.value) {



									window.location = "unidades";



									}

								})



					</script>';



				}







}else{



				echo'<script>



					swal({

						  type: "error",

						  title: "¡La unidad documental no puede ir vacía o llevar caracteres especiales!",

						  showConfirmButton: true,

						  confirmButtonText: "Cerrar"

						  }).then(function(result){

							if (result.value) {



							window.location = "unidades";



							}

						})



	  	</script>';



			}



		}



	}





	/*=============================================

	MOSTRAR UNIDADES

	=============================================*/



	static public function ctrMostrarUnidades($item, $valor){



		$tabla = "unidad_documental";



		$respuesta = ModeloUnidades::mdlMostrarUnidades($tabla, $item, $valor);



		return $respuesta;

	

	}







          

/*=============================================

	EDITAR UNIDADES

	=============================================*/



	static public function ctrEditarUnidad(){



		if(isset($_POST["editarnuevaUnidad"])){



			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarnuevaUnidad"])&& 			   

			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarnuevaSubserie"])&& 

			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ@$?¡\-_()* ]+$/', $_POST["editarnuevaUnidad1"])&& 

			//   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ@$?¡\-_()* ]+$/', $_POST["editardescripcion"])&& 

			   preg_match('/^([0-9]{4})[\/.-]([0-9]{2})[\/.-]([0-9]{2})$/', $_POST["editarnuevaFechaIni"])&&

			   preg_match('/^([0-9]{4})[\/.-]([0-9]{2})[\/.-]([0-9]{2})$/', $_POST["editarnuevaFechafin"])&&

			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarconservacion"])&& 			   

			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarnuevaObservacion"])&& 

			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarnuevaEmpresa"])&& 

			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarnuevaSede"])&& 

			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarnuevaDepartamento"])&& 

			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarnuevaSerie_id"])&& 

			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarnuevaCaja"])){



				$tabla = "unidad_documental";









				$datos = array("idUnidaddocumental"=>$_POST["editarnuevaIdunidad"],

				               "codigo"=>$_POST["editarnuevaUnidad"],

				               "codigo1"=>$_POST["editarnuevaUnidad1"],

				               "cod_subserie"=>$_POST["editarnuevaSubserie"],

				               "descripcion"=>$_POST["editardescripcion"],

							   "UniFechaInicio"=>$_POST["editarnuevaFechaIni"],

							   "UniFechafin"=>$_POST["editarnuevaFechafin"],

							   "tiemp_arch_gest"=>$_POST["editarTiempogest"],

							   "tiemp_arch_cent"=>$_POST["editarTiempocent"],

							   "conservacion"=>$_POST["editarconservacion"],

							   "fechadestruccion"=>$_POST["editarfechadestruccion"],	

							   "UniObservaciones"=>$_POST["editarnuevaObservacion"],	

							   "EMPRESA_idEmpresa"=>$_POST["editarnuevaEmpresa"],	

							   "SEDE_idSede"=>$_POST["editarnuevaSede"],	

							   "DEPARTAMENTO_idDepartamento"=>$_POST["editarnuevaDepartamento"],	

							   "SERIES_idSeries"=>$_POST["editarnuevaSerie_id"],				          

					           "uni_caja"=>$_POST["editarnuevaCaja"]);



				$respuesta = ModeloUnidades::mdlEditarUnidad($tabla, $datos);



				if($respuesta == "ok"){



					echo'<script>



					swal({

						  type: "success",

						  title: "La unidad documental ha sido guardada correctamente",

						  showConfirmButton: true,

						  confirmButtonText: "Cerrar"

						  }).then(function(result){

									if (result.value) {



									window.location = "unidades";



									}

								})



					</script>';



				}







}else{



				echo'<script>



					swal({

						  type: "error",

						  title: "¡La unidad documental no puede ir vacía o llevar caracteres especiales!",

						  showConfirmButton: true,

						  confirmButtonText: "Cerrar"

						  }).then(function(result){

							if (result.value) {



							window.location = "unidades";



							}

						})



	  	</script>';



			}



		}



	}









/*=============================================

	ELIMINAR UNIDAD

	=============================================*/



	static public function ctrEliminarUnidad(){



		if(isset($_GET["idUnidad"])){



			$tabla ="unidad_documental";

			$datos = $_GET["idUnidad"];



			$respuesta = ModeloUnidades::mdlEliminarUnidad($tabla, $datos);



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



								window.location = "unidades";



								}

							})



				</script>';



			}	else{		
			    
			    
			   echo'<script>



					swal({

						  type: "error",

						  title: "¡No se puede borrar la carpeta. Hay documento(s) relacionados a ella.!",

						  showConfirmButton: true,

						  confirmButtonText: "Cerrar"

						  }).then(function(result){

							if (result.value) {



							window.location = "unidades";



							}

						})



			  	</script>';
			    
			    
			    
			}
	



		}



	}



	/*=============================================

	RANGO FECHAS

	=============================================*/	



	static public function ctrRangoFechasVentas($fechaInicial, $fechaFinal){



		$tabla = "ventas";



		$respuesta = ModeloVentas::mdlRangoFechasVentas($tabla, $fechaInicial, $fechaFinal);



		return $respuesta;

		

	}



	/*=============================================

	DESCARGAR EXCEL

	=============================================*/



	public function ctrDescargarReporte(){



		if(isset($_GET["reporte"])){



			$tabla = "unidades";



			if(isset($_GET["fechaInicial"]) && isset($_GET["fechaFinal"])){



				$unidades = ModeloUnidades::mdlRangoFechasUnidades($tabla, $_GET["fechaInicial"], $_GET["fechaFinal"]);



			}else{



				$item = null;

				$valor = null;



				$unidades = ModeloUnidades::mdlMostrarUnidades($tabla, $item, $valor);



			}





			/*=============================================

			CREAMOS EL ARCHIVO DE EXCEL

			=============================================*/



			$Name = $_GET["reporte"].'.xls';



			header('Expires: 0');

			header('Cache-control: private');

			header("Content-type: application/vnd.ms-excel"); // Archivo de Excel

			header("Cache-Control: cache, must-revalidate"); 

			header('Content-Description: File Transfer');

			header('Last-Modified: '.date('D, d M Y H:i:s'));

			header("Pragma: public"); 

			header('Content-Disposition:; filename="'.$Name.'"');

			header("Content-Transfer-Encoding: binary");

		

			echo utf8_decode("<table border='0'> 



					<tr> 

					<td style='font-weight:bold; border:1px solid #eee;'>CÓDIGO</td> 

					<td style='font-weight:bold; border:1px solid #eee;'>CLIENTE</td>

					<td style='font-weight:bold; border:1px solid #eee;'>VENDEDOR</td>

					<td style='font-weight:bold; border:1px solid #eee;'>CANTIDAD</td>

					

					<td style='font-weight:bold; border:1px solid #eee;'>FECHA</td>		

					</tr>");



			foreach ($unidades as $row => $item){



				$cliente = ControladorSeries::ctrMostrarSeries("idSerie", $item["idSerie"]);

				$vendedor = ControladorUsuarios::ctrMostrarUsuarios("id", $item["id_vendedor"]);



			 echo utf8_decode("<tr>

			 			<td style='border:1px solid #eee;'>".$item["nombreSerie"]."</td> 

			 			<td style='border:1px solid #eee;'>".$cliente["nombreSerie"]."</td>

			 			<td style='border:1px solid #eee;'>".$vendedor["nombre"]."</td>

			 			<td style='border:1px solid #eee;'>");



			 	$productos =  json_decode($item["nombreSerie"], true);



			 	foreach ($productos as $key => $valueProductos) {

			 			

			 			echo utf8_decode($valueProductos["nombreSerie"]."<br>");

			 		}



			 	echo utf8_decode("</td><td style='border:1px solid #eee;'>");	



		 		foreach ($productos as $key => $valueProductos) {

			 			

		 			echo utf8_decode($valueProductos["descripcion"]."<br>");

		 		

		 		}



		 		echo utf8_decode("</td>

					<td style='border:1px solid #eee;'>$ ".number_format($item["impuesto"],2)."</td>

					<td style='border:1px solid #eee;'>$ ".number_format($item["neto"],2)."</td>	

					<td style='border:1px solid #eee;'>$ ".number_format($item["total"],2)."</td>

					<td style='border:1px solid #eee;'>".$item["metodo_pago"]."</td>

					<td style='border:1px solid #eee;'>".substr($item["fecha"],0,10)."</td>		

		 			</tr>");





			}





			echo "</table>";



		}



	}











}

