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

      

      Administrar Caja

    

    </h1>



    <ol class="breadcrumb">

      

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      

      <li class="active">Administrar Caja</li>

    

    </ol>



  </section>



 <section class="content">



    <div class="box">



      <div class="box-header with-border">

  

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCaja">

          

          Agregar caja



        </button>



      </div>



      <div class="box-body">

        

       <table class="table table-bordered table-striped dt-responsive tablas" style="width:100%">

         

        <thead>

         

         <tr>

           

           

           <th style="width:10px">#</th>



           <th>Caja tipo</th> 

           <th>Prefijo</th>

           <th>Código</th>            

           <th>Sufijo</th> 

           <th>Estanteria</th>           

           <th>Acciones</th>



         </tr> 



        </thead>



        <tbody>

        
         <?php



          $item = null;

          $valor = null;



          $Cajas = ControladorCajas::ctrMostrarCajas($item, $valor);



          foreach ($Cajas as $key => $value) {

           

            echo ' <tr>



                   

                    <td>'.($key+1).'</td>

                    

                    <td class="text-uppercase">'.$value["caja_tipo"].'</td>

                    <td class="text-uppercase">'.$value["caja_prefijo"].'</td>

                    <td class="text-uppercase">'.$value["caja_codigo"].'</td>                    

                    <td class="text-uppercase">'.$value["caja_sufijo"].'</td>

                    <td class="text-uppercase">'.$value["idEstanteria"].'</td>



                     <td>



                      <div class="btn-group">

                        <button class="btn btn-info btnImprimirCaja" codigoCaja="'.$value["idCaja"].'" > <i class="fa fa-print"></i></button> 

                        <button class="btn btn-warning btnEditarCaja" idCaja="'.$value["idCaja"].'" data-toggle="modal" data-target="#modalEditarCaja"  >

                        <i class="fa fa-pencil"></i></button>';



                        if($_SESSION["perfil"] == "Administrador"){



                          echo '<button class="btn btn-danger btnEliminarCaja" idCaja="'.$value["idCaja"].'"><i class="fa fa-times"></i></button>';



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

MODAL AGREGAR Caja

======================================-->



<div id="modalAgregarCaja" class="modal fade" role="dialog">

  

  <div class="modal-dialog">



    <div class="modal-content">



      <form role="form" method="post">



        <!--=====================================

        CABEZA DEL MODAL

        ======================================-->



        <div class="modal-header" style="background:#3c8dbc; color:white">



          <button type="button" class="close" data-dismiss="modal">&times;</button>



          <h4 class="modal-title">Agregar Caja</h4>



        </div>

    

    

    

    



        <!--=====================================

        CUERPO DEL MODAL

        ======================================-->



        <div class="modal-body">



          <div class="box-body">



                  <!-- ENTRADA PARA EL TIPO DE CAJA -->

            

            <div class="form-group">



              <label>Tipo de caja</label>

                  

                  <div class="input-group">

                    

                    <span class="input-group-addon"><i class="fa fa-th"></i></span>

                    

                    <select class="form-control" id="nuevoTipo" name="nuevoTipo" >



                          <option value="">Seleccionar tipo de almacendamiento</option>

                          <option value="FORMATO 12">FORMATO 12</option>

                          <option value="FORMATO 4">FORMATO 4</option>

                                          



                    </select>

                </div>

            </div>



            <!-- ENTRADA PARA CODIGO DE LA CAJA -->

            

            <div class="form-group">



              <label># de caja</label>

              

              <div class="input-group">

              

                <span class="input-group-addon"><i class="fa fa-archive"></i></span> 



                <input type="text" class="form-control input-lg" name="nuevoCodigo" placeholder="Ingresar código de caja" >



              </div>



            </div>



             <!-- ENTRADA PARA EL PREFIJO -->

            

            <div class="form-group">



              <label>Prefijo</label>

              

              <div class="input-group">

              

                <span class="input-group-addon"><i class="fa fa-archive"></i></span> 



                <input type="text" class="form-control input-lg" name="nuevoPrefijo" placeholder="Ingresar prefijo caja" >



              </div>



            </div>





             <!-- ENTRADA PARA CODIGO DE LA CAJA -->

            

            <div class="form-group">



              <label>Sufijo</label>

              

              <div class="input-group">

              

                <span class="input-group-addon"><i class="fa fa-archive"></i></span> 



                <input type="text" class="form-control input-lg" name="nuevoSufijo" placeholder="Ingresar sufijo de caja" >



              </div>



            </div>





           



             <!-- ENTRADA PARA LA ESTANTERIA -->

            

            <div class="form-group">



              <label>Selecionar estantería</label>

                  

                  <div class="input-group">

                    

                    <span class="input-group-addon"><i class="fa fa-th"></i></span>

                    

                    <select class="form-control" id="nuevoNombreCaja" name="nuevoNombreCaja" >



                    <option value="">Seleccionar estantería</option>



                    <?php



                      $item = null;

                      $valor = null;



                      $cajas = ControladorEstanterias::ctrMostrarEstanterias1($item, $valor);



                       foreach ($cajas as $key => $value) {



                         echo '<option value="'.$value["idEstanteria"].'">'. "Estante No: ", $value["num_estante"], ", bandeja No: ", $value["num_entrepano"],  ", Bodega: ", $value["dep_nombre"] .".".'</option>';



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



          <button type="submit" class="btn btn-primary">Guardar Caja</button>



        </div>



        <?php



        $crearCajas = new ControladorCajas();

        $crearCajas -> ctrCrearCajas();



        ?>



      </form>



    </div>



  </div>



</div>



<!--=====================================

MODAL EDITAR Caja

======================================-->



<div id="modalEditarCaja" class="modal fade" role="dialog">

  

  <div class="modal-dialog">



    <div class="modal-content">



      <form role="form" method="post">



        <!--=====================================

        CABEZA DEL MODAL

        ======================================-->



        <div class="modal-header" style="background:#3c8dbc; color:white">



          <button type="button" class="close" data-dismiss="modal">&times;</button>



          <h4 class="modal-title">Editar Caja</h4>



        </div>



        <!--=====================================

        CUERPO DEL MODAL

        ======================================-->



        <div class="modal-body">



          <div class="box-body">





            <!-- ENTRADA PARA EL IDSERIE -->

            

            <div class="form-group" hidden="">



              <label>ID caja</label>

              

              <div class="input-group">

              

                <span class="input-group-addon"><i class="fa fa-archive"></i></span> 



                <input type="text" class="form-control input-lg" name="editarnuevaCaja" id="editarnuevaCaja" readonly=""  >



              </div>



            </div>





                 <!-- ENTRADA PARA EL TIPO DE CAJA -->

            

            <div class="form-group">



              <label>Tipo de caja</label>

                  

                  <div class="input-group">

                    

                    <span class="input-group-addon"><i class="fa fa-th"></i></span>

                    

                    <select class="form-control" id="editarnuevoTipo" name="editarnuevoTipo" >



                          <option value="">Seleccionar tipo de almacendamiento</option>

                          <option value="FORMATO 12">FORMATO 12</option>

                          <option value="FORMATO 4">FORMATO 4</option>

                                          



                    </select>

                </div>

            </div>



            <!-- ENTRADA PARA CODIGO DE LA CAJA -->

            

            <div class="form-group">



              <label># de caja</label>

              

              <div class="input-group">

              

                <span class="input-group-addon"><i class="fa fa-archive"></i></span> 



                <input type="text" class="form-control input-lg" name="editarnuevoCodigo" id="editarnuevoCodigo" placeholder="Ingresar código de caja" >



              </div>



            </div>



             <!-- ENTRADA PARA EL PREFIJO -->

            

            <div class="form-group">



              <label>Prefijo</label>

              

              <div class="input-group">

              

                <span class="input-group-addon"><i class="fa fa-archive"></i></span> 



                <input type="text" class="form-control input-lg" name="editarnuevoPrefijo"  id="editarnuevoPrefijo" placeholder="Ingresar prefijo caja" >



              </div>



            </div>





             <!-- ENTRADA PARA CODIGO DE LA CAJA -->

            

            <div class="form-group">



              <label>Sufijo</label>

              

              <div class="input-group">

              

                <span class="input-group-addon"><i class="fa fa-archive"></i></span> 



                <input type="text" class="form-control input-lg" name="editarnuevoSufijo" id="editarnuevoSufijo" placeholder="Ingresar sufijo de caja" >



              </div>



            </div>







                 <input type="hidden"  name="idCaja" id="idCaja" required>



             

                  <!-- ENTRADA PARA EL EMPRESA -->

            

            <div class="form-group">



                <label>Selecionar estantería</label>

                  

                  <div class="input-group">

                    

                    <span class="input-group-addon"><i class="fa fa-th"></i></span>

                    

                    <select class="form-control" id="editarCaja" name="editarCaja" >



                   


                    <?php



                      $item = null;

                      $valor = null;



                      $cajas = ControladorEstanterias::ctrMostrarEstanterias1($item, $valor);



                       foreach ($cajas as $key => $value) {



                         echo '<option value="'.$value["idEstanteria"].'">'. "Estante No: ", $value["num_estante"], ", bandeja No: ", $value["num_entrepano"],  ", Bodega: ", $value["dep_nombre"] .".".'</option>';



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



          <button type="submit" class="btn btn-primary">Guardar cambios</button>



        </div>



 



      </form>



       <?php



          $editarCajas = new ControladorCajas();

          $editarCajas -> ctrEditarCaja();



        ?> 



    </div>



  </div>



</div>





 <?php



        $EliminarCaja = new ControladorCajas();

        $EliminarCaja -> ctrEliminarCaja();

  ?>