<?php





require_once "conexion.php";



class ModeloCarpetas{



	/*=============================================

	MOSTRAR Carpetas

	=============================================*/



	static public function mdlMostrarCarpetas($tabla, $item, $valor){



		if($item != null){



			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");



			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);



			$stmt -> execute();



			return $stmt -> fetch();



		}else{



			$stmt = Conexion::conectar()->prepare("select `destruccion_carpetas1`.`codigo1` AS `codigo1`, `destruccion_carpetas1`.`descripcion` AS `descripcion`, `destruccion_carpetas1`.`caja_prefijo` AS `caja_prefijo`, `destruccion_carpetas1`.`caja_codigo` AS `caja_codigo`, `destruccion_carpetas1`.`fechadestruccion` AS `fechadestruccion`, `destruccion_carpetas1`.`destruir=<0` AS `destruir=<0`, `status` from `destruccion_carpetas1` WHERE `status` = 'ELIMINAR'");



			$stmt -> execute();



			return $stmt -> fetchAll();



		}



		$stmt -> close();



		$stmt = null;



	}







}



