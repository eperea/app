<?php

if($_SESSION["perfil"] != "Administrador"){

	return;	

}

$notificaciones = ControladorNotificaciones::ctrMostrarNotificaciones();

$totalNotificaciones = $notificaciones["nuevas_consultas"] + $notificaciones["nuevas_carpetas"];


?>

<!--=====================================
NOTIFICACIONES
======================================-->

<!-- notifications-menu -->
<li class="dropdown notifications-menu">
	
	<!-- dropdown-toggle -->
	<a href="#" class="dropdown-toggle" data-toggle="dropdown">
		
		<i class="fa fa-bell-o"></i>
		
		<span class="label label-warning"><?php  echo $totalNotificaciones; ?></span>
	
	</a>
	<!-- dropdown-toggle -->

	<!--dropdown-menu -->
	<ul class="dropdown-menu">

		<li class="header">Tu tienes <?php  echo $totalNotificaciones; ?> notificaciones</li>

		<li>
			<!-- menu -->
			<ul class="menu">

				
				<!-- Consultas -->
				<li>
				
					<a href="prestamo"  class="actualizarNotificaciones" item="nuevas_consultas">
					
						<i class="fa fa-shopping-cart text-aqua"></i> <?php  echo $notificaciones["nuevas_consultas"] ?> nuevas consultas documentos
					
					</a>

				</li>
				
				<!-- Carpetas -->
				<li>
				
					<a href="unidades" class="actualizarNotificaciones" item="nuevas_carpetas">
					
						<i class="fa fa-book text-aqua"></i> <?php  echo $notificaciones["nuevas_carpetas"] ?> nuevas carpetas ingresadas
					
					</a>

				</li>

			</ul>
			<!-- menu -->

		</li>

	</ul>
	<!--dropdown-menu -->

</li>
<!-- notifications-menu -->	