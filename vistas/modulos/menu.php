<aside class="main-sidebar">



	 <section class="sidebar">



		<ul class="sidebar-menu">



<?php



		if($_SESSION["perfil"] == "Administrador"){



			echo '		



			<li class="active">







				<a href="inicio">



					<i class="fa fa-home"></i>

					<span>Inicio</span>



				</a>



			</li>



			<li>



				<a href="usuarios">



					<i class="fa fa-user"></i>

					<span>Usuarios</span>



				</a>



			</li>

			<li>

		

				<a href="empresa">



					<i class="fa fa-university"></i>

					<span>Empresas</span>



				</a>



			</li>



			<li>



				<a href="sede">



					<i class="fa fa-building"></i>

					<span>Sedes</span>



				</a>



			</li>



			<li>



				<a href="departamento">



					<i class="fa fa-navicon"></i>

					<span>Departamentos</span>



				</a>



			</li>



			

		

			<li>



				<a href="deposito">

					

					<i class="fa fa-th"></i>

					<span>Bodegas</span>



				</a>



			</li>



			<li>



				<a href="estanteria">

					

					<i class="fa fa-th-large"></i>

					<span>Estanterías</span>



				</a>



			</li>



				<li>



				<a href="caja">

					

					<i class="fa fa-archive"></i>

					<span>Cajas</span>



				</a>



			</li>



				<li>



				<a href="series">



					<i class="fa fa-folder-open"></i>

					<span>Categorías</span>



				</a>



			</li>



			<li>



				<a href="unidades">



					<i class="glyphicon glyphicon-level-up"></i>

					<span>Carpetas</span>



				</a>



			</li>



			<li>



				<a href="subirpdf">



					<i class="fa fa-files-o"></i>

					<span>Documentos</span>



				</a>



			</li>';



		}



		if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Colaborador"){



			echo '

				<li>

				<a href="prestamo">

					<i class="fa fa-users"></i>
					<span>Préstamo documento</span>

				</a>
				
				

			</li>



			<li class="treeview">



				<a href="#">



					<i class="fa fa-list-ul"></i>

					

					<span>Consultas</span>

					

					<span class="pull-right-container">

					

						<i class="fa fa-angle-left pull-right"></i>



					</span>



				</a>



				<ul class="treeview-menu">

					

				

					<li>



						<a href="ubicacioncaja">

							

							<i class="fa fa-circle-o"></i>

							<span>Ubicación cajas</span>



						</a>



					</li>



					<li>



						<a href="ubicacioncarpeta">

							

							<i class="fa fa-circle-o"></i>

							<span>Ubicación carpetas</span>



						</a>



					</li>



					



						<li>



						<a href="destruccioncaja">

							

							<i class="fa fa-circle-o"></i>

							<span>Eliminación cajas</span>



						</a>



					</li>



						<li>



						<a href="destruccioncarpeta">

							

							<i class="fa fa-circle-o"></i>

							<span>Eliminación carpetas</span>



						</a>



					</li>



														



					<li>



						<a href="documentos">

							

							<i class="fa fa-circle-o"></i>

							<span>Consulta Documentos</span>



						</a>


						<li>';

					
			



		}


      if($_SESSION["perfil"] == "Administrador"){



			echo '		


					<li>



						<a href="eliminados">

							

							<i class="fa fa-circle-o"></i>

							<span>Pendientes eliminar</span>



						</a>

				
			</li>';

		



		}




					



				



				echo '</ul>



			</li>';



		



		?>



		</ul>



	 </section>



</aside>



