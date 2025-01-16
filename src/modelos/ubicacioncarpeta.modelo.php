<?php





require_once "conexion.php";



class ModeloCarpetaUbicacion{



	/*=============================================

	MOSTRAR CarpetaUbicacion

	=============================================*/



	static public function mdlMostrarCarpetaUbicacion($tabla, $item, $valor){
	    
	    
	    



		if($item != null){



			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");



			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);



			$stmt -> execute();



			return $stmt -> fetch();



		}else{
		    
            		    
         

			$stmt = Conexion::conectar()->prepare("select `unidad_documental`.`codigo1` AS `codigo1`,`unidad_documental`.`descripcion` AS `descripcion`,`caja`.`caja_tipo` AS `caja_tipo`,`caja`.`caja_prefijo` AS `caja_prefijo`,`caja`.`caja_codigo` AS `caja_codigo`,`estanteria`.`num_estante` AS `num_estante`,`estanteria`.`num_entrepano` AS `num_entrepano`,`estanteria`.`bloque` AS `bloque`,`deposito`.`dep_nombre` AS `deposito` from (((`caja` join `unidad_documental` on((`caja`.`idCaja` = `unidad_documental`.`CAJA_idCaja`))) join `estanteria` on((`caja`.`idEstanteria` = `estanteria`.`idEstanteria`))) join `deposito` on((`estanteria`.`idDeposito` = `deposito`.`id`))) order by `unidad_documental`.`codigo1` ");



			$stmt -> execute();



			return $stmt -> fetchAll();



		}



		$stmt -> close();



		$stmt = null;



	}







}



