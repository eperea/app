<?php

	header('Content-type:application/xls');

	header('Content-Disposition: attachment; filename=productos.xls');



	require_once('conexion.php');

	

	$conn =new Conexion();

	$link = $conn->conectarse();



	$query="SELECT * FROM unidad_documental, caja";

	$result=mysqli_query($link, $query);

?>





<table border="1">

	<tr style="background-color:green;">

		   <th style="color: white">CODIGO</th>

           <th style="color: white">DESCRIPCION</th>

           <th style="color: white">FECHA INI</th>

           <th style="color: white">FECHA FIN</th>

           <th style="color: white">UND CONSERVACION</th>

           <th style="color: white">FECHA ELIMINACION</th>          

           <th style="color: white">OBSERVACIONES</th>

           <th style="color: white">EMPRESA</th>

           <th style="color: white">SEDE</th>

           <th style="color: white">DEPARTAMENTO</th>

           <th style="color: white">SERIE</th>

           <th style="color: white">CAJA</th>

           

	</tr>

	<?php



	



	$total =0;

		while ($row=mysqli_fetch_assoc($result)) {

			?>

				<tr>

					<td><?php echo $row['idUnidaddocumental']; ?></td>

					<td><?php echo $row['descripcion']; ?></td>

					<td><?php echo $row['UniFechaInicio']; ?></td>

					<td><?php echo $row['UniFechafin']; ?></td>

					<td><?php echo $row['conservacion']; ?></td>

					<td><?php echo $row['fechadestruccion']; ?></td>			

					<td><?php echo $row['UniObservaciones']; ?></td>

					<td><?php echo $row['EMPRESA_idEmpresa']; ?></td>

					<td><?php echo $row['SEDE_idSede']; ?></td>

					<td><?php echo $row['DEPARTAMENTO_idDepartamento']; ?></td>

					<td><?php echo $row['SERIES_idSeries']; ?></td>

					<td><?php echo $row['caja_prefijo'], " ", $row['caja_codigo'], " ", $row['caja_sufijo'] ; ?></td>

					

								

				</tr>	



			<?php





		}





	?>

</table>



