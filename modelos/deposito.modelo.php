<?php


require_once "conexion.php";

class ModeloDepositos{

	/*=============================================
	CREAR Deposito
	=============================================*/

	static public function mdlIngresarDepositos($tabla, $datos){

	$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (dep_sigla, dep_nombre, dep_num_tipoalma) VALUES (:dep_sigla, :dep_nombre, :dep_num_tipoalma)");

		$stmt->bindParam(":dep_sigla", $datos["dep_sigla"], PDO::PARAM_STR);
		$stmt->bindParam(":dep_nombre", $datos["dep_nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":dep_num_tipoalma", $datos["dep_num_tipoalma"], PDO::PARAM_STR);
		

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

	static public function mdlMostrarDepositos($tabla, $item, $valor){

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
	EDITAR Deposito
	=============================================*/

	static public function mdlEditarDeposito($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET dep_sigla = :dep_sigla, dep_nombre = :dep_nombre, dep_num_tipoalma = :dep_num_tipoalma WHERE id = :id");

		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt->bindParam(":dep_sigla", $datos["dep_sigla"], PDO::PARAM_STR);
		$stmt->bindParam(":dep_nombre", $datos["dep_nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":dep_num_tipoalma", $datos["dep_num_tipoalma"], PDO::PARAM_STR);
		
		

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}


	/*=============================================
	ELIMINAR Deposito
	=============================================*/

	static public function mdlEliminarDeposito($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

}

