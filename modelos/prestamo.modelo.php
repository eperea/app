<?php


require_once "conexion.php";

class ModeloPrestamos{

	/*=============================================
	CREAR Prestamo
	=============================================*/

	
	static public function mdlIngresarPrestamos($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (descDocumento, pres_prioridad, pres_formato,  funcionario, pres_estado, observaciones) VALUES (:descDocumento, :pres_prioridad, :pres_formato, :funcionario, :pres_estado, :observaciones)");

		
		
		$stmt->bindParam(":descDocumento", $datos["descDocumento"], PDO::PARAM_STR);
		$stmt->bindParam(":pres_prioridad", $datos["pres_prioridad"], PDO::PARAM_STR);
		$stmt->bindParam(":pres_formato", $datos["pres_formato"], PDO::PARAM_STR);	
		$stmt->bindParam(":funcionario", $datos["funcionario"], PDO::PARAM_STR);
		$stmt->bindParam(":pres_estado", $datos["pres_estado"], PDO::PARAM_STR);			
		$stmt->bindParam(":observaciones", $datos["observaciones"], PDO::PARAM_STR);
	
		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	MOSTRAR Prestamos
	=============================================*/

	static public function mdlMostrarPrestamos($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}elseif ($_SESSION["perfil"] == "Colaborador") {
			# code...
			
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla  WHERE funcionario ='".$_SESSION["nombre"]."'");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
		else{

		
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

		/*=============================================
	MOSTRAR Prestamos
	=============================================*/

	static public function mdlMostrarPrestados($tabla, $item1, $valor){

		if($item1 != null){

			$stmt = Conexion::conectar()->prepare("SELECT COUNT(*) FROM $tabla WHERE $item1 = 'SOLICITADO'");

			$stmt -> bindParam(":".$item1, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}elseif ($_SESSION["perfil"] == "Colaborador") {
			# code...
			
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla  WHERE funcionario ='".$_SESSION["nombre"]."'");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
		else{

		
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}



	

	/*=============================================
	EDITAR Prestamo
	=============================================*/

	
	static public function mdlEditarPrestamo($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET fechaEntrega = :fechaEntrega, descDocumento = :descDocumento, pres_prioridad = :pres_prioridad, pres_formato = :pres_formato,  folios = :folios, funcionario = :funcionario, fechaDevolucion = :fechaDevolucion, funcionarioRec = :funcionarioRec, pres_estado = :pres_estado, observaciones = :observaciones WHERE idPrestamo = :idPrestamo ");

		
		$stmt->bindParam(":idPrestamo", $datos["idPrestamo"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaEntrega", $datos["fechaEntrega"], PDO::PARAM_STR);
		$stmt->bindParam(":descDocumento", $datos["descDocumento"], PDO::PARAM_STR);
		$stmt->bindParam(":pres_prioridad", $datos["pres_prioridad"], PDO::PARAM_STR);
		$stmt->bindParam(":pres_formato", $datos["pres_formato"], PDO::PARAM_STR);					
		$stmt->bindParam(":folios", $datos["folios"], PDO::PARAM_STR);
		$stmt->bindParam(":funcionario", $datos["funcionario"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaDevolucion", $datos["fechaDevolucion"], PDO::PARAM_STR);
		$stmt->bindParam(":funcionarioRec", $datos["funcionarioRec"], PDO::PARAM_STR);
		$stmt->bindParam(":pres_estado", $datos["pres_estado"], PDO::PARAM_STR);
		$stmt->bindParam(":observaciones", $datos["observaciones"], PDO::PARAM_STR);
	

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	ELIMINAR SERIE
	=============================================*/

	static public function mdlEliminarPrestamo($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idPrestamo = :idPrestamo");

		$stmt -> bindParam(":idPrestamo", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

}

