<?php
	header('Content-type:application/xls');
	header('Content-Disposition: attachment; filename=eliminar_cajas.xls');

	require_once('conexion.php');
	
	$conn =new Conexion();
	$link = $conn->conectarse();

	$query="SELECT * FROM destruccion_caja2";
	$result=mysqli_query($link, $query);
?>


<table border="1">
	<tr style="background-color:green;">
		   <th style="color: white">Prefijo</th>
           <th style="color: white"># Caja</th>
           <th style="color: white">Status_unidad</th>
                          
	</tr>
	<?php

	

	$total =0;
		while ($row=mysqli_fetch_assoc($result)) {
			?>
				<tr>
					
					<td><?php echo $row['caja_prefijo']; ?></td>
					<td><?php echo $row['caja_codigo']; ?></td>
					<td><?php echo $row['status_unidad']; ?></td>
														
				</tr>	

			<?php


		}


	?>
</table>

