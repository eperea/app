<?php


require_once "conexion.php";

class ModeloSubirPdf{

	/*=============================================
	CREAR EMPRESA
	=============================================*/

	static public function mdlIngresarSubirPdf($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (titulo, nota, descripcion,  tamanio, tipo, nombre_archivo, unidades) VALUES (:titulo, :nota, :descripcion, :tamanio, :tipo, :nombre_archivo, :unidades)");

		
		$stmt->bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR);
		$stmt->bindParam(":nota", $datos["nota"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":tamanio", $datos["tamanio"], PDO::PARAM_STR);
		$stmt->bindParam(":tipo", $datos["tipo"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre_archivo", $datos["nombre_archivo"], PDO::PARAM_STR);
		$stmt->bindParam(":unidades", $datos["unidades"], PDO::PARAM_STR);
		

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	MOSTRAR SUBIR PDF
	=============================================*/

	static public function mdlMostrarSubirPdf($tabla, $item, $valor){

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

	static public function mdlEditarSubir($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET titulo = :titulo, nota = :nota, descripcion = :descripcion, tamanio = :tamanio, tipo = :tipo, nombre_archivo = :nombre_archivo,  unidades = :unidades WHERE id_documento = :id_documento");

		$stmt->bindParam(":id_documento", $datos["id_documento"], PDO::PARAM_STR);
		$stmt->bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR);
		$stmt->bindParam(":nota", $datos["nota"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":tamanio", $datos["tamanio"], PDO::PARAM_STR);
		$stmt->bindParam(":tipo", $datos["tipo"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre_archivo", $datos["nombre_archivo"], PDO::PARAM_STR);
		$stmt->bindParam(":unidades", $datos["unidades"], PDO::PARAM_STR);

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

	static public function mdlEliminarSubir($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_documento = :id_documento");

		$stmt -> bindParam(":id_documento", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

}

