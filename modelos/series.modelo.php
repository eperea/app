<?php





require_once "conexion.php";



class ModeloSeries{



	/*=============================================

	CREAR SERIE

	=============================================*/



	static public function mdlIngresarSeries($tabla, $datos){



		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (codigo_serie, nombreSerie, seriesIni, seriesFin) VALUES (:codigo_serie, :nombreSerie, :seriesIni, :seriesFin)");



		$stmt->bindParam(":codigo_serie", $datos["codigo_serie"], PDO::PARAM_STR);

		$stmt->bindParam(":nombreSerie", $datos["nombreSerie"], PDO::PARAM_STR);

		$stmt->bindParam(":seriesIni", $datos["seriesIni"], PDO::PARAM_STR);

		$stmt->bindParam(":seriesFin", $datos["seriesFin"], PDO::PARAM_STR);



		if($stmt->execute()){



			return "ok";



		}else{



			return "error";

		

		}



		$stmt->close();

		$stmt = null;



	}



	/*=============================================

	MOSTRAR CATEGORIAS

	=============================================*/



	static public function mdlMostrarSeries($tabla, $item, $valor){



		if($item != null){



			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");



			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);



			$stmt -> execute();



			return $stmt -> fetch();



		}else{



			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");



			$stmt -> execute();



			return $stmt -> fetchAll();



		}



		$stmt -> close();



		$stmt = null;



	}



	/*=============================================

	EDITAR SERIE

	=============================================*/



	static public function mdlEditarSerie($tabla, $datos){



		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET codigo_serie = :codigo_serie, nombreSerie = :nombreSerie, seriesIni = :seriesIni,  seriesFin = :seriesFin  WHERE idSeries = :idSeries");



		$stmt->bindParam(":codigo_serie", $datos["codigo_serie"], PDO::PARAM_STR);		

		$stmt->bindParam(":nombreSerie", $datos["nombreSerie"], PDO::PARAM_STR);

		$stmt->bindParam(":seriesIni", $datos["seriesIni"], PDO::PARAM_STR);

		$stmt->bindParam(":seriesFin", $datos["seriesFin"], PDO::PARAM_STR);

		$stmt->bindParam(":idSeries", $datos["idSeries"], PDO::PARAM_STR);



		if($stmt->execute()){



			return "ok";



		}else{



			return "error";

		

		}



		$stmt->close();

		$stmt = null;



	}





	/*=============================================

	ELIMINAR SERIE

	=============================================*/



	static public function mdlEliminarSerie($tabla, $datos){



		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idSeries = :idSeries");



		$stmt -> bindParam(":idSeries", $datos, PDO::PARAM_INT);



		if($stmt -> execute()){



			return "ok";

		

		}else{



			return "error";	



		}



		$stmt -> close();



		$stmt = null;



	}



}



