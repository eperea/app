<?php 





require_once "conexion.php";  



class ModeloUnidades{



	/*=============================================

	CREAR UNIDAD

	=============================================*/



	

	static public function mdlIngresarUnidades($tabla, $datos){



		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(codigo, codigo1, cod_subserie, descripcion, uni_rango, uni_rango1, UniFechaInicio, UniFechafin, conservacion,  tiemp_arch_gest, tiemp_arch_cent, fechadestruccion, UniObservaciones, EMPRESA_idEmpresa, SEDE_idSede, DEPARTAMENTO_idDepartamento, SERIES_idSeries, uni_caja) VALUES (:codigo, :codigo1, :cod_subserie, :descripcion, :uni_rango, :uni_rango1, :UniFechaInicio, :UniFechafin, :conservacion, :tiemp_arch_gest, :tiemp_arch_cent, :fechadestruccion, :UniObservaciones, :EMPRESA_idEmpresa, :SEDE_idSede, :DEPARTAMENTO_idDepartamento, :SERIES_idSeries, :uni_caja)");



				$stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_INT);

				$stmt->bindParam(":codigo1", $datos["codigo1"], PDO::PARAM_INT);

				$stmt->bindParam(":cod_subserie", $datos["cod_subserie"], PDO::PARAM_INT);

				$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);

				$stmt->bindParam(":uni_rango", $datos["uni_rango"], PDO::PARAM_STR);

				$stmt->bindParam(":uni_rango1", $datos["uni_rango1"], PDO::PARAM_STR);

				$stmt->bindParam(":UniFechaInicio", $datos["UniFechaInicio"], PDO::PARAM_STR);

				$stmt->bindParam(":UniFechafin", $datos["UniFechafin"], PDO::PARAM_STR);

				$stmt->bindParam(":conservacion", $datos["conservacion"], PDO::PARAM_STR);

				$stmt->bindParam(":tiemp_arch_gest", $datos["tiemp_arch_gest"], PDO::PARAM_STR);

				$stmt->bindParam(":tiemp_arch_cent", $datos["tiemp_arch_cent"], PDO::PARAM_STR);

				$stmt->bindParam(":fechadestruccion", $datos["fechadestruccion"], PDO::PARAM_STR);

				$stmt->bindParam(":UniObservaciones", $datos["UniObservaciones"], PDO::PARAM_STR);

				$stmt->bindParam(":EMPRESA_idEmpresa", $datos["EMPRESA_idEmpresa"], PDO::PARAM_STR);

				$stmt->bindParam(":SEDE_idSede", $datos["SEDE_idSede"], PDO::PARAM_STR);

				$stmt->bindParam(":DEPARTAMENTO_idDepartamento", $datos["DEPARTAMENTO_idDepartamento"], PDO::PARAM_STR);

				$stmt->bindParam(":SERIES_idSeries", $datos["SERIES_idSeries"], PDO::PARAM_STR);

				$stmt->bindParam(":uni_caja", $datos["uni_caja"], PDO::PARAM_STR);

				


			



		if($stmt->execute()){



			return "ok";



		}else{



			return "error";

		

		}



		$stmt->close();

		$stmt = null;



	}



	/*=============================================

	MOSTRAR UNIDADES

	=============================================*/



	static public function mdlMostrarUnidades($tabla, $item, $valor){



		if($item != null){



			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla  WHERE $item = :$item" );



			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);



			$stmt -> execute();



			return $stmt -> fetch();



		}else{



		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla GROUP BY codigo ");



			$stmt -> execute();



			return $stmt -> fetchAll();



		}



		$stmt -> close();



		$stmt = null;



	}



	/*=============================================

	EDITAR UNIDAD

	=============================================*/



	

	static public function mdlEditarUnidad($tabla, $datos){



		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET codigo = :codigo, codigo1 = :codigo1, cod_subserie = :cod_subserie, descripcion = :descripcion,  UniFechaInicio = :UniFechaInicio, UniFechafin = :UniFechafin,  tiemp_arch_gest = :tiemp_arch_gest, tiemp_arch_cent = :tiemp_arch_cent, conservacion = :conservacion, fechadestruccion = :fechadestruccion, UniObservaciones = :UniObservaciones, EMPRESA_idEmpresa = :EMPRESA_idEmpresa, SEDE_idSede = :SEDE_idSede, DEPARTAMENTO_idDepartamento = :DEPARTAMENTO_idDepartamento, SERIES_idSeries = :SERIES_idSeries, uni_caja = :uni_caja WHERE idUnidaddocumental = :idUnidaddocumental ");



		

		$stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);

		$stmt->bindParam(":codigo1", $datos["codigo1"], PDO::PARAM_STR);

		$stmt->bindParam(":cod_subserie", $datos["cod_subserie"], PDO::PARAM_STR);

		$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);

		$stmt->bindParam(":UniFechaInicio", $datos["UniFechaInicio"], PDO::PARAM_STR);

		$stmt->bindParam(":UniFechafin", $datos["UniFechafin"], PDO::PARAM_STR);

		$stmt->bindParam(":conservacion", $datos["conservacion"], PDO::PARAM_STR);

		$stmt->bindParam(":tiemp_arch_gest", $datos["tiemp_arch_gest"], PDO::PARAM_STR);

		$stmt->bindParam(":tiemp_arch_cent", $datos["tiemp_arch_cent"], PDO::PARAM_STR);

		$stmt->bindParam(":fechadestruccion", $datos["fechadestruccion"], PDO::PARAM_STR);

		$stmt->bindParam(":UniObservaciones", $datos["UniObservaciones"], PDO::PARAM_STR);

		$stmt->bindParam(":EMPRESA_idEmpresa", $datos["EMPRESA_idEmpresa"], PDO::PARAM_STR);

		$stmt->bindParam(":SEDE_idSede", $datos["SEDE_idSede"], PDO::PARAM_STR);

		$stmt->bindParam(":DEPARTAMENTO_idDepartamento", $datos["DEPARTAMENTO_idDepartamento"], PDO::PARAM_STR);

		$stmt->bindParam(":SERIES_idSeries", $datos["SERIES_idSeries"], PDO::PARAM_STR);

		$stmt->bindParam(":uni_caja", $datos["uni_caja"], PDO::PARAM_STR);

		$stmt->bindParam(":idUnidaddocumental", $datos["idUnidaddocumental"], PDO::PARAM_STR);





		if($stmt->execute()){



			return "ok";



		}else{



			return "error";

		

		}



		$stmt->close();

		$stmt = null;



	}





	/*=============================================

	ELIMINAR UNIDADES

	=============================================*/



	static public function mdlEliminarUnidad($tabla, $datos){



		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idUnidaddocumental = :idUnidaddocumental");



		$stmt -> bindParam(":idUnidaddocumental", $datos, PDO::PARAM_INT);



		if($stmt -> execute()){



			return "ok";

		

		}else{



			return "error";	



		}



		$stmt -> close();



		$stmt = null;



	}



}



