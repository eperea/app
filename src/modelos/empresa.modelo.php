<?php


require_once "conexion.php";

class ModeloEmpresas{

	/*=============================================
	CREAR EMPRESA
	=============================================*/

	static public function mdlIngresarEmpresas($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (idEmpresa, EmpNombreempresa, emnit, emsigla, emrepresentante, emdireccion, emtelefono, ememail) VALUES (:idEmpresa, :EmpNombreempresa, :emnit, :emsigla, :emrepresentante, :emdireccion, :emtelefono, :ememail)");

		$stmt->bindParam(":idEmpresa", $datos["idEmpresa"], PDO::PARAM_STR);
		$stmt->bindParam(":EmpNombreempresa", $datos["EmpNombreempresa"], PDO::PARAM_STR);
		$stmt->bindParam(":emnit", $datos["emnit"], PDO::PARAM_STR);
		$stmt->bindParam(":emsigla", $datos["emsigla"], PDO::PARAM_STR);
		$stmt->bindParam(":emrepresentante", $datos["emrepresentante"], PDO::PARAM_STR);
		$stmt->bindParam(":emdireccion", $datos["emdireccion"], PDO::PARAM_STR);
		$stmt->bindParam(":emtelefono", $datos["emtelefono"], PDO::PARAM_STR);
		$stmt->bindParam(":ememail", $datos["ememail"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	MOSTRAR EMPRESAS
	=============================================*/

	static public function mdlMostrarEmpresas($tabla, $item, $valor){

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

	static public function mdlEditarEmpresa($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET EmpNombreempresa= :EmpNombreempresa, emnit= :emnit, emsigla= :emsigla, emrepresentante= :emrepresentante, emdireccion= :emdireccion, emtelefono= :emtelefono, ememail= :ememail WHERE idEmpresa = :idEmpresa");

		$stmt->bindParam(":idEmpresa", $datos["idEmpresa"], PDO::PARAM_STR);
		$stmt->bindParam(":EmpNombreempresa", $datos["EmpNombreempresa"], PDO::PARAM_STR);
		$stmt->bindParam(":emnit", $datos["emnit"], PDO::PARAM_STR);
		$stmt->bindParam(":emsigla", $datos["emsigla"], PDO::PARAM_STR);
		$stmt->bindParam(":emrepresentante", $datos["emrepresentante"], PDO::PARAM_STR);
		$stmt->bindParam(":emdireccion", $datos["emdireccion"], PDO::PARAM_STR);
		$stmt->bindParam(":emtelefono", $datos["emtelefono"], PDO::PARAM_STR);
		$stmt->bindParam(":ememail", $datos["ememail"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}


	/*=============================================
	ELIMINAR Empresa
	=============================================*/

	static public function mdlEliminarEmpresa($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idEmpresa = :idEmpresa");

		$stmt -> bindParam(":idEmpresa", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

}

