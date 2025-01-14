<?php
	header('Content-type:application/xls');
	header('Content-Disposition: attachment; filename=ubicacion_cajas.xls');

	require_once('conexion.php');
	
	$conn =new Conexion();
	$link = $conn->conectarse();

	$query="SELECT * FROM consulta_cajas";
	$result=mysqli_query($link, $query);
?>


<table border="1">
	<tr style="background-color:green;">
		   <th style="color: white">Tipo caja</th>
           <th style="color: white">Prefijo</th>
           <th style="color: white"># Caja</th>
           <th style="color: white"># Estante</th>
           <th style="color: white"># Entrepano</th>
           <th style="color: white">Bloque </th>          
           <th style="color: white">Bodega</th>                     
	</tr>
	<?php

	

	$total =0;
		while ($row=mysqli_fetch_assoc($result)) {
			?>
				<tr>
					<td><?php echo $row['caja_tipo']; ?></td>
					<td><?php echo $row['caja_prefijo']; ?></td>
					<td><?php echo $row['caja_codigo']; ?></td>
					<td><?php echo $row['num_estante']; ?></td>
					<td><?php echo $row['num_entrepano']; ?></td>
					<td><?php echo $row['bloque']; ?></td>			
					<td><?php echo $row['deposito']; ?></td>									
				</tr>	

			<?php


		}


	?>
</table>

