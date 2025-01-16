
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
      
      Administrar Bodegas
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar Bodegas</li>
    
    </ol>

  </section>

 <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarDeposito">
          
          Agregar Bodega

        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" style="width:100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           
           <th>Id Deposito</th>
           <th>Sigla</th>
           <th>Nombre</th>
           <th># Estantes</th>                          
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>
          
         <?php

          $item = null;
          $valor = null;

          $depositos = ControladorDepositos::ctrMostrarDepositos($item, $valor);

          foreach ($depositos as $key => $value) {
           
            echo ' <tr>

                    <td>'.($key+1).'</td>
                    <td class="text-uppercase">'.$value["id"].'</td>
                    <td class="text-uppercase">'.$value["dep_sigla"].'</td>
                    <td class="text-uppercase">'.$value["dep_nombre"].'</td>
                    <td class="text-uppercase">'.$value["dep_num_tipoalma"].'</td>
                    
                    

                     <td>

                      <div class="btn-group">
                          
                        <button class="btn btn-warning btnEditarDeposito" idDeposito="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarDeposito"  >
                        <i class="fa fa-pencil"></i></button>';

                        if($_SESSION["perfil"] == "Administrador"){

                          echo '<button class="btn btn-danger btnEliminarDeposito" idDeposito="'.$value["id"].'"><i class="fa fa-times"></i></button>';

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
MODAL AGREGAR Deposito
======================================-->

<div id="modalAgregarDeposito" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Deposito</h4>

        </div>
    
    
    
    


        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL # DE ESTANTE -->

            
            
            <div class="form-group">

              <label>Sigla</label>
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa  fa-check-square"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoSigla" >

              </div>

            </div>

             <!-- ENTRADA PARA EL NOMBRE DE ENTREPAÑO -->
            
            <div class="form-group">

              <label>Nombre Bodega</label>
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text"  class="form-control input-lg" name="nuevoNombre" >

              </div>

            </div>

             <!-- ENTRADA PARA EL EL BLOQUE -->
            
            <div class="form-group">

              <label># Estantes</label>
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="number" class="form-control input-lg" name="nuevoTipoalma"  >

              </div>

            </div>
           

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Deposito</button>

        </div>

        <?php

        $crearDepositos = new ControladorDepositos();
        $crearDepositos -> ctrCrearDepositos();

        ?>

      </form>

    </div>

  </div>

</div>


<!--=====================================
MODAL EDITAR Estanteria
======================================-->

<div id="modalEditarDeposito" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Deposito</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL IDDeposito -->
            
            <div class="form-group">

              
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-navicon"></i></span> 

                <input type="text" class="form-control input-lg" name="editarnuevoDeposito" id="editarnuevoDeposito" readonly >

              </div>

            </div>

            <!-- ENTRADA PARA LA SIGLA-->
            
            <div class="form-group">

              <label>Sigla</label>
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa  fa-check-square"></i></span> 

                <input type="text" class="form-control input-lg" name="editarnuevoSigla" id="editarnuevoSigla" >

              </div>

            </div>

             <!-- ENTRADA PARA EL NOMBRE DE ENTREPAÑO -->
            
            <div class="form-group">

              <label>Nombre bodega</label>
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text"  class="form-control input-lg" name="editarnuevoNombre" id="editarnuevoNombre" >

              </div>

            </div>

             <input type="hidden"  name="idDeposito" id="idDeposito" required>


             <!-- ENTRADA PARA EL EL Estantes -->
            
            <div class="form-group">

              <label># Estantes</label>
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="number" class="form-control input-lg" name="editarnuevoTipoalma" id="editarnuevoTipoalma"  >

              </div>

            </div>


            <input type="hidden"  name="idDeposito" id="idDeposito" required>


  
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

          $editarDeposito = new ControladorDepositos();
          $editarDeposito -> ctrEditarDeposito();

        ?> 

    </div>

  </div>

</div>


 <?php

        $EliminarDeposito = new ControladorDepositos();
        $EliminarDeposito -> ctrEliminarDeposito();
  ?>