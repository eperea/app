<?php



require_once "../controladores/unidades.controlador.php";

require_once "../modelos/unidades.modelo.php";





class TablaUnidades{



/*=============================================

MOSTRAR TABLA UNIDADES

=============================================*/



			public function mostrarTablaUnidades(){



		



         





		  $item = null;



          $valor = null;

      

          $unidades = ControladorUnidades::ctrMostrarUnidades($item, $valor);          	

 

          $datosJson = '{

		  "data": [';



		  for ($i=0; $i < count($unidades); $i++) { 

		  	# code...

$botones =  "<div class='btn-group btn-block'><button class='btn btn-info btnImprimirFactura btn-sm' idUnidad='".$unidades[$i]["codigo1"]."''><i class='fa fa-print'></i></button><button class='btn btn-warning btnEditarUnidad btn-sm' idUnidad='".$unidades[$i]["idUnidaddocumental"]."' data-toggle='modal' data-target='#modalEditarUnidad'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarUnidad btn-sm' idUnidad='".$unidades[$i]["idUnidaddocumental"]."''><i class='fa fa-times'></i></button></div>"; 



   

							date_default_timezone_set('America/Bogota');





							$fecha_actual  = date($unidades[$i]["UniFechafin"]); 





							$fecha = date("Y-m-d");







							$tiempoarch = number_format($unidades[$i]["tiemp_arch_gest"] + $unidades[$i]["tiemp_arch_cent"]);



							//Incrementando 2 años

							$mod_date = strtotime($fecha_actual." + ".$tiempoarch." years");



							$fecha1 = date("Y-m-d",$mod_date);



							if ($fecha1 < $fecha){

								# code...	



									if ($unidades[$i]["conservacion"] == "CONSERVACION TOTAL"){

																	# code...



										$fecha1 = "<strong><p style='color: gray'>CONSERVACION TOTAL</p></strong>";



										}	



									if ($unidades[$i]["conservacion"] == "ELIMINACION"){

																	# code...



										$fecha1 = "<strong><p style='color: red'>ELIMINACION</p></strong>";

										

										}	



									if ($unidades[$i]["conservacion"] == "MEDIO TECNICO"){

																	# code...



										$fecha1 = "<strong><p style='color: blue'>DIGITALIZACION</p></strong>";

										

										}	



									if ($unidades[$i]["conservacion"] == "SELECCION O MUESTREO"){

																	# code...



										$fecha1 = "<strong><p style='color: black'>SELECCION O MUESTREO</p></strong>";

										

										}

									}					



							else{



									$fecha1 = "<strong><p style='color: green'>DOCUMENTO VIGENTE</p></strong> ";

							}



							

								# code...

								$datosJson .= '[

		      

		     

		      "'.$unidades[$i]["codigo"].'",



		      "'.$unidades[$i]["codigo1"].'",

		      

		      "'.$unidades[$i]["descripcion"].'",

		      

		      "'.$unidades[$i]["UniFechaInicio"].'",

		      

		      "'.$unidades[$i]["UniFechafin"].'",

		      

		      "'.$unidades[$i]["tiemp_arch_gest"].'",

		      

		      "'.$unidades[$i]["tiemp_arch_cent"].'", 

		      

		      "'.$unidades[$i]["conservacion"].'",

		      

		      "'.$unidades[$i]["fechadestruccion"].'",

		      

		      

		      "'.$unidades[$i]["UniObservaciones"].'", 

		      



		      "'.$fecha1.'", 

		       

		      "'.$botones.'"  

		      		      

		    ],';

														

		  	

		  }





		  $datosJson = substr($datosJson, 0, -1);



		 $datosJson .=    ']



		 }';

 



		 echo $datosJson;

      



			



			}





}





/*=============================================

ACTIVAR TABLA DE UNIDADES

=============================================*/





$activarUnidades = new TablaUnidades();

$activarUnidades -> mostrarTablaUnidades();

