<?php


require_once "conexion.php";

class ModeloCajas{

	/*=============================================
	CREAR Caja
	=============================================*/

	static public function mdlIngresarCajas($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla( caja_tipo, caja_codigo, caja_prefijo, caja_sufijo, idEstanteria) VALUES (:caja_tipo, :caja_codigo, :caja_prefijo, :caja_sufijo, :idEstanteria)");

		$stmt->bindParam(":caja_tipo", $datos["caja_tipo"], PDO::PARAM_STR);
		$stmt->bindParam(":caja_codigo", $datos["caja_codigo"], PDO::PARAM_STR);
		$stmt->bindParam(":caja_prefijo", $datos["caja_prefijo"], PDO::PARAM_STR);
		$stmt->bindParam(":caja_sufijo", $datos["caja_sufijo"], PDO::PARAM_STR);
		$stmt->bindParam(":idEstanteria", $datos["idEstanteria"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	MOSTRAR CajaS
	=============================================*/

	static public function mdlMostrarCajas($tabla, $item, $valor){

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
	EDITAR Caja
	=============================================*/

	static public function mdlEditarCaja($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET  caja_tipo = :caja_tipo, caja_codigo= :caja_codigo, caja_prefijo= :caja_prefijo, caja_sufijo= :caja_sufijo, idEstanteria= :idEstanteria WHERE idCaja = :idCaja");

		$stmt->bindParam(":idCaja", $datos["idCaja"], PDO::PARAM_STR);
		$stmt->bindParam(":caja_tipo", $datos["caja_tipo"], PDO::PARAM_STR);
		$stmt->bindParam(":caja_codigo", $datos["caja_codigo"], PDO::PARAM_STR);
		$stmt->bindParam(":caja_prefijo", $datos["caja_prefijo"], PDO::PARAM_STR);
		$stmt->bindParam(":caja_sufijo", $datos["caja_sufijo"], PDO::PARAM_STR);
		$stmt->bindParam(":idEstanteria", $datos["idEstanteria"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}


	/*=============================================
	ELIMINAR Caja
	=============================================*/

	static public function mdlEliminarCaja($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idCaja = :idCaja");

		$stmt -> bindParam(":idCaja", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

}

