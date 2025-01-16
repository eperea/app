<?php





require_once "conexion.php";



class ModeloDocumentos{



	/*=============================================

	MOSTRAR Documentos

	=============================================*/



	static public function mdlMostrarDocumentos($tabla, $item, $valor){



	if($item != null){



			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");



			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);



			$stmt -> execute();



			return $stmt -> fetch();



		}else{



			$stmt = Conexion::conectar()->prepare("select  unidad_documental.codigo1 AS codigo1,  unidad_documental.descripcion AS descripcion, unidad_documental.UniFechaInicio AS UniFechaInicio, unidad_documental.UniFechafin AS UniFechafin, tbl_documentos.id_documento AS id_documento, tbl_documentos.titulo AS titulo, tbl_documentos.descripcion AS descripcion_tbl, tbl_documentos.nota AS nota, tbl_documentos.nombre_archivo AS nombre_archivo from ( tbl_documentos join  unidad_documental on(( tbl_documentos.unidades =  unidad_documental.idUnidaddocumental)))");



			$stmt -> execute();



			return $stmt -> fetchAll();



		}



		$stmt -> close();



		$stmt = null;



	}



	}