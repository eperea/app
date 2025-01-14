<?php





require_once "conexion.php";



class ModeloCajaUbicacion{



	/*=============================================

	MOSTRAR CajaUbicacion

	=============================================*/



	static public function mdlMostrarCajaUbicacion($tabla, $item, $valor){



		if($item != null){



			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");



			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);



			$stmt -> execute();



			return $stmt -> fetch();



		}else{



			$stmt = Conexion::conectar()->prepare("select `caja`.`caja_tipo` AS `caja_tipo`,`caja`.`caja_prefijo` AS `caja_prefijo`,`caja`.`caja_codigo` AS `caja_codigo`,`estanteria`.`num_estante` AS `num_estante`,`estanteria`.`num_entrepano` AS `num_entrepano`,`estanteria`.`bloque` AS `bloque`,`deposito`.`dep_nombre` AS `deposito` from ((`caja` join `estanteria` on((`caja`.`idEstanteria` = `estanteria`.`idEstanteria`))) join `deposito` on((`estanteria`.`idDeposito` = `deposito`.`id`))) ORDER BY `caja`.`caja_codigo` ");



			$stmt -> execute();



			return $stmt -> fetchAll();



		}



		$stmt -> close();



		$stmt = null;



	}







}



