<?php


require_once "conexion.php";

class ModeloCajaDestruccion{

	/*=============================================
	MOSTRAR CajaDestruccion
	=============================================*/

	static public function mdlMostrarCajaDestruccion($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE status_unidad= 'Eliminar'");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}



}

