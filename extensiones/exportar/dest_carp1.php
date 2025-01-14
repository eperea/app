<?php
	header('Content-type:application/xls');
	header('Content-Disposition: attachment; filename=eliminacion_carpeta.xls');

	require_once('conexion.php');
	
	$conn =new Conexion();
	$link = $conn->conectarse();

	$query="SELECT * FROM destruccion_carpetas1 where status_unidad = 'Eliminar'";
	$result=mysqli_query($link, $query);
?>


<table border="1">
	<tr style="background-color:#3c8dbc;">
		   <th style="color: white">CODIGO CARPETA</th>
		   <th style="color: white">DESCRIPCION</th>
           <th style="color: white">PREFIJO</th>          
           <th style="color: white"># CAJA</th>
           <th style="color: white">FECHA FIN DOCUMENTO</th>
           <th style="color: white">FECHA ELIMINACION</th>          
           <th style="color: white">STATUS CARPETA</th>
           
           
	</tr>
	<?php

	

	$total =0;
		while ($row=mysqli_fetch_assoc($result)) {
			?>
				<tr>
					<td><?php echo $row['codigo1']; ?></td>
					<td><?php echo $row['descripcion']; ?></td>
					<td><?php echo $row['caja_prefijo']; ?></td>
					<td><?php echo $row['caja_codigo']; ?></td>
					<td><?php echo $row['fechadestruccion']; ?></td>
					<td><?php echo $row['destruir=<0']; ?></td>					
					<td><?php echo $row['status']; ?></td>					
				</tr>	

			<?php


		}


	?>
</table>

