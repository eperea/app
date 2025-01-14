

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

      

      Administrar Estanterías

    

    </h1>



    <ol class="breadcrumb">

      

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      

      <li class="active">Administrar Estanterías</li>

    

    </ol>



  </section>



 <section class="content">



    <div class="box">



      <div class="box-header with-border">

  

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarEstanteria">

          

          Agregar Estantería



        </button>



      </div>



      <div class="box-body">

        

       <table class="table table-bordered table-striped dt-responsive tablas" style="width:100%">

         

        <thead>

         

         <tr>

           

           <th style="width:10px">#</th>

         

           <th># Estante</th>

           <th># Entrepaño</th>

           <th># Bloque</th>º

           <th>Id Bodega</th>              

           <th>Acciones</th>



         </tr> 



        </thead>



        <tbody>

          

         <?php



          $item = null;

          $valor = null;



          $Estanterias = ControladorEstanterias::ctrMostrarEstanterias($item, $valor);



          foreach ($Estanterias as $key => $value) {

           

            echo ' <tr>



                    <td>'.($key+1).'</td>



                    

                    <td class="text-uppercase">'.$value["num_estante"].'</td>

                    <td class="text-uppercase">'.$value["num_entrepano"].'</td>

                    <td class="text-uppercase">'.$value["bloque"].'</td>

                    <td class="text-uppercase">'.$value["idDeposito"].'</td>

                    



                     <td>



                      <div class="btn-group">

                          

                        <button class="btn btn-warning btnEditarEstanteria" idEstanteria="'.$value["idEstanteria"].'" data-toggle="modal" data-target="#modalEditarEstanteria"  >

                        <i class="fa fa-pencil"></i></button>';



                        if($_SESSION["perfil"] == "Administrador"){



                          echo '<button class="btn btn-danger btnEliminarEstanteria" idEstanteria="'.$value["idEstanteria"].'"><i class="fa fa-times"></i></button>';



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

MODAL AGREGAR Estanteria

======================================-->



<div id="modalAgregarEstanteria" class="modal fade" role="dialog">

  

  <div class="modal-dialog">



    <div class="modal-content">



      <form role="form" method="post">



        <!--=====================================

        CABEZA DEL MODAL

        ======================================-->



        <div class="modal-header" style="background:#3c8dbc; color:white">



          <button type="button" class="close" data-dismiss="modal">&times;</button>



          <h4 class="modal-title">Agregar Estantería</h4>



        </div>

    

    

    

    



        <!--=====================================

        CUERPO DEL MODAL

        ======================================-->



        <div class="modal-body">



          <div class="box-body">



            <!-- ENTRADA PARA EL # DE ESTANTE -->

            

            <div class="form-group">

              

              <label># Estante</label>

              

              <div class="input-group">

              

                <span class="input-group-addon"><i class="fa fa-th-large"></i></span>



                <input type="number" class="form-control input-lg" name="nuevonum_estante" placeholder="Ingresar # de Estantería" >



              </div>



            </div>







             











             <!-- ENTRADA PARA EL # DE ENTREPAÑO -->

            

            <div class="form-group">

              

               <label># Entrepaño</label>

              

              <div class="input-group">

              

                <span class="input-group-addon"><i class="fa fa-th-large"></i></span> 



                <input type="number" min="0" max="8" class="form-control input-lg" name="nuevonum_entrepano" placeholder="Ingresar # del Entrepaño" >



              </div>



            </div>



             <!-- ENTRADA PARA EL EL BLOQUE -->

            

            <div class="form-group">



              <label># Bloque</label>

              

              <div class="input-group">

              

               <span class="input-group-addon"><i class="fa fa-th-large"></i></span> 



                <input type="number" class="form-control input-lg" name="nuevobloque" placeholder="Ingresar bloque" >



              </div>



            </div>





             <!-- ENTRADA PARA 

            <div class="form-group">

              

              <div class="input-group">

              

                <span class="input-group-addon"><i class="fa fa-folder"></i></span> 



                <input type="text" class="form-control input-lg" name="nuevoidDeposito" placeholder="Ingresar Deposito" >



              </div>



            </div>-->

            







             <!-- ENTRADA PARA EL DEPOSITO  -->



            <div class="form-group">



              <label>Selecionar Bodega</label>

              

              <div class="input-group">

              

                <span class="input-group-addon"><i class="fa fa-th"></i></span> 



                <select class="form-control input-lg" id="nuevoidDeposito" name="nuevoidDeposito" required>

                  

                  <option value="">Selecionar categoría</option>



                  <?php



                  $item = null;

                  $valor = null;



                  $categorias = ControladorDepositos::ctrMostrarDepositos($item, $valor);



                  foreach ($categorias as $key => $value) {

                    

                    echo '<option value="'.$value["id"].'">'.$value["dep_nombre"].'</option>';

                  }



                  ?>

  

                </select>



              </div>



            </div>





            



          </div>



        </div>



        <!--=====================================

        PIE DEL MODAL

        ======================================-->



        <div class="modal-footer">



          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>



          <button type="submit" class="btn btn-primary">Guardar Estantería</button>



        </div>



        <?php



        $crearEstanterias = new ControladorEstanterias();

        $crearEstanterias -> ctrCrearEstanterias();



        ?>



      </form>



    </div>



  </div>



</div>



<!--=====================================

MODAL EDITAR Estanteria

======================================-->



<div id="modalEditarEstanteria" class="modal fade" role="dialog">

  

  <div class="modal-dialog">



    <div class="modal-content">



      <form role="form" method="post">



        <!--=====================================

        CABEZA DEL MODAL

        ======================================-->



        <div class="modal-header" style="background:#3c8dbc; color:white">



          <button type="button" class="close" data-dismiss="modal">&times;</button>



          <h4 class="modal-title">Editar Estantería</h4>



        </div>



        <!--=====================================

        CUERPO DEL MODAL

        ======================================-->



        <div class="modal-body">



          <div class="box-body">



            <!-- ENTRADA PARA EL IDEstanteria -->

            

            <div class="form-group">



              <label>ID estantería</label>

              

              <div class="input-group">

              

                <span class="input-group-addon"><i class="fa fa-th-large"></i></span> 



                <input type="number" class="form-control input-lg" name="editarnuevaEstanteria" id="editarnuevaEstanteria" readonly="" >



              </div>



            </div>



              <!-- ENTRADA PARA EL # DE ESTANTE -->

            

            <div class="form-group">



              <label># Estante</label>

              

              <div class="input-group">

              

                <span class="input-group-addon"><i class="fa fa-th-large"></i></span> 



                <input type="number" class="form-control input-lg" name="editarnuevonum_estante" id="editarnuevonum_estante" placeholder="Ingresar # de Estanteria" >



              </div>



            </div>



             <!-- ENTRADA PARA EL # DE ENTREPAÑO -->

            

            <div class="form-group">



              <label># Entrepaño</label>

              

              <div class="input-group">

              

                <span class="input-group-addon"><i class="fa fa-th-large"></i></span> 



                <input type="number" min="0" max="8" class="form-control input-lg" name="editarnuevonum_entrepano" id="editarnuevonum_entrepano" placeholder="Ingresar # del Entrepaño" >



              </div>



            </div>



             <!-- ENTRADA PARA EL EL BLOQUE -->

            

            <div class="form-group">



              <label># Bloque</label>

              

              <div class="input-group">

              

               <span class="input-group-addon"><i class="fa fa-th-large"></i></span> 



                <input type="number" class="form-control input-lg" name="editarnuevobloque" id="editarnuevobloque" placeholder="Ingresar bloque" >



              </div>



            </div>





             <!-- ENTRADA PARA EL DEPOSITO 

            

            <div class="form-group">

              

              <div class="input-group">

              

                <span class="input-group-addon"><i class="fa fa-folder"></i></span> 



                <input type="text" class="form-control input-lg" name="editarnuevoidDeposito" id="editarnuevoidDeposito" placeholder="Ingresar Deposito" >



              </div>



            </div>-->



            <!-- ENTRADA PARA SELECCIONAR BODEGA -->



            <div class="form-group">



              <label>Selecionar Bodega</label>

              

              <div class="input-group">

              

                <span class="input-group-addon"><i class="fa fa-th"></i></span> 



                <select class="form-control input-lg"  name="editarnuevoidDeposito" readonly required>





                   <option id="editarnuevoidDeposito"></option>

                  

                     <?php



                  $item = null;

                  $valor = null;



                  $categorias = ControladorDepositos::ctrMostrarDepositos($item, $valor);



                  foreach ($categorias as $key => $value) {

                    

                    echo '<option value="'.$value["id"].'">'.$value["dep_nombre"].'</option>';

                  }



                  ?>



                </select>



              </div>



            </div>



            <input type="hidden"  name="idEstanteria" id="idEstanteria" required>





  

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



          $editarEstanteria = new ControladorEstanterias();

          $editarEstanteria -> ctrEditarEstanteria();



        ?> 



    </div>



  </div>



</div>





 <?php



        $EliminarEstanteria = new ControladorEstanterias();

        $EliminarEstanteria -> ctrEliminarEstanteria();

  ?>