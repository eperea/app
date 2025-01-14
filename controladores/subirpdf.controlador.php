<?php

class ControladorSubirPdf{

/*==============================================================
	CREAR DOCUMENTOS
================================================================*/

static public function ctrCrearSubirPdf(){

		
				

				if (isset($_POST['tituloPdf'])) {


					$tabla = "tbl_documentos";


			    $nombre = $_FILES['archivoPdf']['name'];
			    $tipo = $_FILES['archivoPdf']['type'];
			    $tamanio = $_FILES['archivoPdf']['size'];
				$ruta = $_FILES['archivoPdf']['tmp_name'];
				$destino = "extensiones/pdf/archivos/" . $nombre;

    if ($nombre != "") {
        if (copy($ruta, $destino)) {
             $titulo= $_POST['tituloPdf'];
             $descri= $_POST['descripcionPdf'];

				$datos = array( "titulo"=>$_POST['tituloPdf'],	
								"descripcion"=>$_POST['descripcionPdf'],	
								"tamanio"=>$_FILES['archivoPdf']['size'],	
								"tipo"=>$_FILES['archivoPdf']['type'],	
								"nombre_archivo"=>$_FILES['archivoPdf']['name'],
								"nota"=>$_POST['nota'],
								"unidades"=>$_POST['nuevaunidades']
					            );

				

				$respuesta = ModeloSubirPdf::mdlIngresarSubirPdf($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El documento ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "subirpdf";

									}
								})

					</script>';

				}



}
else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El documento no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "subirpdf";

							}
						})

	  	</script>';

			}

		           }

		       }

	      }
      
      


	/*=============================================
	MOSTRAR RELACION DOCUMENTOS
	=============================================*/

	static public function ctrMostrarSubirPdf($item, $valor){

		$tabla = "tbl_documentos";

		$respuesta = ModeloSubirPdf::mdlMostrarSubirPdf($tabla, $item, $valor);

		return $respuesta;
	
	}

	



/*=============================================
	EDITAR CATEGORIA
	=============================================*/

	static public function ctrEditarSubir(){

		if (isset($_POST['editarnuevaSubirpdf'])) {


				


        	    $nombre = $_FILES['editararchivoPdf']['name'];
			    $tipo = $_FILES['editararchivoPdf']['type'];
			    $tamanio = $_FILES['editararchivoPdf']['size'];
				$ruta = $_FILES['editararchivoPdf']['tmp_name'];
				$destino = "extensiones/pdf/archivos/" . $nombre;

				if ($nombre != "") {
        if (copy($ruta, $destino)) {
                      

				$datos = array("id_documento"=>$_POST['editarnuevaId'],							   
							   "titulo"=>$_POST['editarnuevaSubirpdf'],						           
							   "descripcion"=>$_POST['editarSubirpdf'],	
							   "tamanio"=>$_FILES['editararchivoPdf']['size'],	
							   "tipo"=>$_FILES['editararchivoPdf']['type'],	
							   "nombre_archivo"=>$_FILES['editararchivoPdf']['name'],
							   "nota"=>$_POST['editarnota'],	
							   "unidades"=>$_POST['editarunidades']			
					            );

					$tabla = "tbl_documentos";

				$respuesta = ModeloSubirPdf::mdlEditarSubir($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El documento ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "subirpdf";

									}
								})

					</script>';

				}

   }

	      
      


}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El documento no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "subirpdf";

							}
						})

	  	</script>';

			

		           }

		       }

	      }
      
/*=============================================
	ELIMINAR CLIENTE
	=============================================*/

	static public function ctrEliminarSubir(){

		if(isset($_GET["idSubir"])){

			$tabla ="tbl_documentos";
			$datos = $_GET["idSubir"];

			$respuesta = ModeloSubirPdf::mdlEliminarSubir($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "La Subir ha sido borrada correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result){
								if (result.value) {

								window.location = "subirpdf";

								}
							})

				</script>';

			}		

		}

	}





}
