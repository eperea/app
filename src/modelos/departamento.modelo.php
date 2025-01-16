<?php


require_once "conexion.php";

class ModeloDepartamentos{

	/*=============================================
	CREAR Departamento
	=============================================*/

	static public function mdlIngresarDepartamentos($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(idDepartamento, DepCodigo, empSigla, empDirec, empActAdm) VALUES (:idDepartamento, :DepCodigo, :empSigla, :empDirec, :empActAdm)");

		$stmt->bindParam(":idDepartamento", $datos["idDepartamento"], PDO::PARAM_STR);
		$stmt->bindParam(":DepCodigo", $datos["DepCodigo"], PDO::PARAM_STR);
		$stmt->bindParam(":empSigla", $datos["empSigla"], PDO::PARAM_STR);
		$stmt->bindParam(":empDirec", $datos["empDirec"], PDO::PARAM_STR);
		$stmt->bindParam(":empActAdm", $datos["empActAdm"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	MOSTRAR DepartamentoS
	=============================================*/

	static public function mdlMostrarDepartamentos($tabla, $item, $valor){

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
	EDITAR Departamento
	=============================================*/

	static public function mdlEditarDepartamento($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET DepCodigo = :DepCodigo, empSigla = :empSigla, empDirec = :empDirec, empActAdm = :empActAdm WHERE idDepartamento = :idDepartamento");

		$stmt->bindParam(":idDepartamento", $datos["idDepartamento"], PDO::PARAM_STR);
		$stmt->bindParam(":DepCodigo", $datos["DepCodigo"], PDO::PARAM_STR);
		$stmt->bindParam(":empSigla", $datos["empSigla"], PDO::PARAM_STR);
		$stmt->bindParam(":empDirec", $datos["empDirec"], PDO::PARAM_STR);
		$stmt->bindParam(":empActAdm", $datos["empActAdm"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}


	/*=============================================
	ELIMINAR Departamento
	=============================================*/

	static public function mdlEliminarDepartamento($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idDepartamento = :idDepartamento");

		$stmt -> bindParam(":idDepartamento", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

}

