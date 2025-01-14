<?php


require_once "conexion.php";

class ModeloEstanterias{

	/*=============================================
	CREAR Estanteria
	=============================================*/

	static public function mdlIngresarEstanterias($tabla, $datos){

	$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla( num_estante, num_entrepano, bloque, idDeposito) VALUES (:num_estante, :num_entrepano, :bloque, :idDeposito)");

		$stmt->bindParam(":num_estante", $datos["num_estante"], PDO::PARAM_STR);
		$stmt->bindParam(":num_entrepano", $datos["num_entrepano"], PDO::PARAM_STR);
		$stmt->bindParam(":bloque", $datos["bloque"], PDO::PARAM_STR);
		$stmt->bindParam(":idDeposito", $datos["idDeposito"], PDO::PARAM_STR);
	

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

	static public function mdlMostrarEstanterias($tabla, $item, $valor){

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
	MOSTRAR DEPOSITO EN EL CAMPO ESTANTERIA DEL MODULO CAJAS
	=============================================*/

	static public function mdlMostrarEstanterias1($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT  estanteria.idEstanteria, `estanteria`.`num_estante`, estanteria.num_entrepano, deposito.dep_nombre FROM estanteria INNER JOIN deposito ON estanteria.idDeposito = deposito.id");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}
	/*=============================================
	EDITAR Estanteria
	=============================================*/

	static public function mdlEditarEstanteria($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET num_estante= :num_estante, num_entrepano= :num_entrepano, bloque= :bloque, idDeposito= :idDeposito WHERE idEstanteria = :idEstanteria");

		$stmt->bindParam(":idEstanteria", $datos["idEstanteria"], PDO::PARAM_STR);
		$stmt->bindParam(":num_estante", $datos["num_estante"], PDO::PARAM_STR);
		$stmt->bindParam(":num_entrepano", $datos["num_entrepano"], PDO::PARAM_STR);
		$stmt->bindParam(":bloque", $datos["bloque"], PDO::PARAM_STR);
		$stmt->bindParam(":idDeposito", $datos["idDeposito"], PDO::PARAM_STR);
		

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}


	/*=============================================
	ELIMINAR Estanteria
	=============================================*/

	static public function mdlEliminarEstanteria($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idEstanteria = :idEstanteria");

		$stmt -> bindParam(":idEstanteria", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

}

