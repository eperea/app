<?php


require_once "conexion.php";

class ModeloSedes{

	/*=============================================
	CREAR EMPRESA
	=============================================*/

	static public function mdlIngresarSedes($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(idSede, SedLocalizacion) VALUES (:idSede, :SedLocalizacion)");

		$stmt->bindParam(":idSede", $datos["idSede"], PDO::PARAM_STR);
		$stmt->bindParam(":SedLocalizacion", $datos["SedLocalizacion"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	MOSTRAR Sedes
	=============================================*/

	static public function mdlMostrarSedes($tabla, $item, $valor){

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
	EDITAR Empresa
	=============================================*/

	static public function mdlEditarSede($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET SedLocalizacion= :SedLocalizacion WHERE idSede = :idSede");

		$stmt->bindParam(":idSede", $datos["idSede"], PDO::PARAM_STR);
		$stmt->bindParam(":SedLocalizacion", $datos["SedLocalizacion"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}


	/*=============================================
	ELIMINAR SEDE
	=============================================*/

	static public function mdlEliminarSede($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idSede = :idSede");

		$stmt -> bindParam(":idSede", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

}

