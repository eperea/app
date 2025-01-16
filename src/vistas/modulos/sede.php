<?php

if($_SESSION["perfil"] == "Colaborador"){

  echo '<script>

    window.location = "inicio";

  </script>';

  return;

}
?>


<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar sede
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar Sede</li>
    
    </ol>

  </section>

<section class="content">

    <div class="box">


      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarSede">
          
          Agregar sede

        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" style="width:100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Id Sede</th>
           <th>Nombre Sede</th>           
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>
          
         <?php

          $item = null;
          $valor = null;

          $Sedes = ControladorSedes::ctrMostrarSedes($item, $valor);

          foreach ($Sedes as $key => $value) {
           
            echo ' <tr>

                    <td>'.($key+1).'</td>

                    <td class="text-uppercase">'.$value["idSede"].'</td>
                    <td class="text-uppercase">'.$value["SedLocalizacion"].'</td>

                     <td>

                      <div class="btn-group">
                          
                        <button class="btn btn-warning btnEditarSede" idSede="'.$value["idSede"].'" data-toggle="modal" data-target="#modalEditarSede"  >
                        <i class="fa fa-pencil"></i></button>';

                        if($_SESSION["perfil"] == "Administrador"){

                          echo '<button class="btn btn-danger btnEliminarSede" idSede="'.$value["idSede"].'"><i class="fa fa-times"></i></button>';

                        }

                      echo '</div>  

                    </td>

                  </tr>';
          }

        ?>

        </tbody>

       </table>

      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL AGREGAR Sede
======================================-->

<div id="modalAgregarSede" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar sede</h4>

        </div>
    
    
    
    

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL IDSede -->
            
            <div class="form-group">

                  <label>ID sede</label>
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-barcode"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevaSede" placeholder="Ingresar Id Sede" >

              </div>

            </div>

            <!-- ENTRADA PARA NOMBRE SEDE -->

             <div class="form-group">

             <label>Nombre sede</label>
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-building"></i></span> 

                <input type="num" class="form-control input-lg" name="nuevoNombreSede" placeholder="Ingresar nombre sede" required>

              </div>

            </div>

            

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Sede</button>

        </div>

        <?php

        $crearSedes = new ControladorSedes();
        $crearSedes -> ctrCrearSedes();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR Sede
======================================-->

<div id="modalEditarSede" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar sede</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL IDSERIE -->
            
            <div class="form-group">

              <label>ID sede</label>
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-barcode"></i></span> 

                <input type="text" class="form-control input-lg" name="editarnuevaSede" id="editarnuevaSede"  >

              </div>

            </div>

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">

              <label>Nombre sede</label>
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-building"></i></span> 

                <input type="text" class="form-control input-lg" name="editarSede" id="editarSede" required>

                 <input type="hidden"  name="idSede" id="idSede" required>

              </div>

            </div>

  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar cambios</button>

        </div>

 

      </form>

       <?php

          $editarSedes = new ControladorSedes();
          $editarSedes -> ctrEditarSede();

        ?> 

    </div>

  </div>

</div>


 <?php

        $EliminarSede = new ControladorSedes();
        $EliminarSede -> ctrEliminarSede();
  ?>