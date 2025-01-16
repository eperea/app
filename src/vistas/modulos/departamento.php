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
      
      Administrar Departamento
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar Departamento</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarDepartamento">
          
          Agregar Departamento

        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" style="width:100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Id Departamento</th>
           <th>Nombre Departamento</th>  
           <th>Sigla</th> 
           <th>Dirección</th>     
           <th>Acto administrativo</th>            
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>
          
         <?php

          $item = null;
          $valor = null;

          $Departamentos = ControladorDepartamentos::ctrMostrarDepartamentos($item, $valor);

          foreach ($Departamentos as $key => $value) {
           
            echo ' <tr>

                    <td>'.($key+1).'</td>

                    <td class="text-uppercase">'.$value["idDepartamento"].'</td>
                    <td class="text-uppercase">'.$value["DepCodigo"].'</td>
                    <td class="text-uppercase">'.$value["empSigla"].'</td>
                    <td class="text-uppercase">'.$value["empDirec"].'</td>
                    <td class="text-uppercase">'.$value["empActAdm"].'</td>

                     <td>

                      <div class="btn-group">
                          
                        <button class="btn btn-warning btnEditarDepartamento" idDepartamento="'.$value["idDepartamento"].'" data-toggle="modal" data-target="#modalEditarDepartamento"  >
                        <i class="fa fa-pencil"></i></button>';

                        if($_SESSION["perfil"] == "Administrador"){

                          echo '<button class="btn btn-danger btnEliminarDepartamento" idDepartamento="'.$value["idDepartamento"].'"><i class="fa fa-times"></i></button>';

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
MODAL AGREGAR Departamento
======================================-->

<div id="modalAgregarDepartamento" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Departamento</h4>

        </div>
    
    
    
    

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL IDDepartamento -->
            
            <div class="form-group">

              <label>Código departamento</label>
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-barcode"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevaDepartamento">

              </div>

            </div>

            <!-- ENTRADA PARA NOMBRE Departamento -->

             <div class="form-group">

              <label>Nombre departamento</label>
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-navicon"></i></span> 

                <input type="num" class="form-control input-lg" name="nuevoNombreDepartamento" required>

              </div>

            </div>

              <!-- ENTRADA PARA SIGLA -->

             <div class="form-group">

              <label>Siglas</label>
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-check-square"></i></span> 

                <input type="num" class="form-control input-lg" name="nuevoNombreSigla" required>

              </div>

            </div>


             <!-- ENTRADA PARA DIRECCION -->

             <div class="form-group">

              <label>Ubicación</label>
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="num" class="form-control input-lg" name="nuevoNombreDir" required>

              </div>

            </div>


            <!-- ENTRADA PARA ACTO ADMINISTRATIVO -->

             <div class="form-group">

              <label>Acto administrativo</label>
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-balance-scale"></i></span> 

                <input type="num" class="form-control input-lg" name="nuevoNombreAct"  required>

              </div>

            </div>

            

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Departamento</button>

        </div>

        <?php

        $crearDepartamentos = new ControladorDepartamentos();
        $crearDepartamentos -> ctrCrearDepartamentos();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR Departamento
======================================-->

<div id="modalEditarDepartamento" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Departamento</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL IDSERIE -->
            
            <div class="form-group">
              
                <label>Código departamento</label>
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-barcode"></i></span> 

                <input type="text" class="form-control input-lg" name="editarnuevaDepartamento" id="editarnuevaDepartamento"  >

              </div>

            </div>

             <div class="form-group">

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <label>Nombre departamento</label>
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-navicon"></i></span> 

                <input type="text" class="form-control input-lg" name="editarDepartamento" id="editarDepartamento" required>

                 <input type="hidden"  name="idDepartamento" id="idDepartamento" required>

              </div>

            </div>

            <!-- ENTRADA PARA SIGLA -->
            
            <div class="form-group">
              
              <label>Siglas</label>
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-check-square"></i></span>  

                <input type="text" class="form-control input-lg" name="editarnuevaSigla" id="editarnuevaSigla"  >

              </div>

            </div>

            <!-- ENTRADA PARA DIRECCION -->
            
            <div class="form-group">
              
              <label>Ubicación</label>
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 


                <input type="text" class="form-control input-lg" name="editarnuevaDir" id="editarnuevaDir"  >

              </div>

            </div>


            <!-- ENTRADA PARA ACTO ADMINISTRATICO -->
            
            <div class="form-group">
              
            <label>Acto administrativo</label>
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-balance-scale"></i></span> 

                <input type="text" class="form-control input-lg" name="editarnuevaAct" id="editarnuevaAct"  >

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

          $editarDepartamentos = new ControladorDepartamentos();
          $editarDepartamentos -> ctrEditarDepartamento();

        ?> 

    </div>

  </div>

</div>


 <?php

        $EliminarDepartamento = new ControladorDepartamentos();
        $EliminarDepartamento -> ctrEliminarDepartamento();
  ?>