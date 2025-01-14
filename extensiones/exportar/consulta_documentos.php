<?php

	header('Content-type:application/xls');

	header('Content-Disposition: attachment; filename=consulta_documentos.xls');



	require_once('conexion.php');

	

	$conn =new Conexion();

	$link = $conn->conectarse();



	$query="select  unidad_documental.codigo1 AS codigo1,  unidad_documental.descripcion AS descripcion, unidad_documental.UniFechaInicio AS UniFechaInicio, unidad_documental.UniFechafin AS UniFechafin, tbl_documentos.id_documento AS id_documento, tbl_documentos.titulo AS titulo, tbl_documentos.descripcion AS descripcion_tbl, tbl_documentos.nota AS nota, tbl_documentos.nombre_archivo AS nombre_archivo from ( tbl_documentos join  unidad_documental on(( tbl_documentos.unidades =  unidad_documental.idUnidaddocumental)))";

	$result=mysqli_query($link, $query);

?>





<table border="1">

	<tr style="background-color:green;">

		   <th style="color: white">Codigo carpeta</th>

           <th style="color: white">Descripcion</th>

           <th style="color: white">Fecha Inicio carpeta</th>

           <th style="color: white">Fecha FIn carpeta</th>

           <th style="color: white">Nombre documento</th>

           <th style="color: white">Descripcion documento</th>          

           <th style="color: white">Nota documento</th>

           <th style="color: white">Archivo</th>                      

	</tr>

	<?php



	



	$total =0;

		while ($row=mysqli_fetch_assoc($result)) {

			?>

				<tr>

					<td><?php echo $row['codigo1']; ?></td>

					<td><?php echo $row['descripcion']; ?></td>

					<td><?php echo $row['UniFechaInicio']; ?></td>

					<td><?php echo $row['UniFechafin']; ?></td>					

					<td><?php echo $row['titulo']; ?></td>			

					<td><?php echo $row['descripcion_tbl']; ?></td>	

					<td><?php echo $row['nota']; ?></td>

					<td><?php echo $row['nombre_archivo']; ?></td>								

				</tr>	



			<?php





		}





	?>

</table>



