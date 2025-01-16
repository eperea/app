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

      

     Administrar Categorías

    

    </h1>



    <ol class="breadcrumb">

      

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      

      <li class="active">Administrar Categorías</li>

    

    </ol>



  </section>



  <section class="content">



    <div class="box">



      <div class="box-header with-border">

  

        <button class="btn btn-default" data-toggle="modal" data-target="#modalAgregarSerie">

          

          Agregar Categoría



        </button>



      </div>



      <div class="box-body">

        

       <table class="table table-bordered table-striped dt-responsive tablas" style="width:100%">

         

        <thead>

         

         <tr>

                      

           <th style="width:10px">#</th>

           <th>CODIGO</th>

           <th>DESCRIPCION</th>

           <th>DESDE</th>

           <th>HASTA</th>

           <th>INGRESO</th>                       

           <th>ACCIONES</th>



         </tr> 



        </thead>



        <tbody>

          

         <?php



          $item = null;

          $valor = null;



          $series = ControladorSeries::ctrMostrarSeries($item, $valor);



          foreach ($series as $key => $value) {

           

            echo ' <tr>



                    <td>'.($key+1).'</td>

                    <td class="text-uppercase">'.$value["codigo_serie"].'</td>

                    <td class="text-uppercase">'.$value["nombreSerie"].'</td>

                    <td class="text-uppercase">'.$value["seriesIni"].'</td>

                    <td class="text-uppercase">'.$value["seriesFin"].'</td>

                    <td class="text-uppercase">'.$value["fecha_entrada"].'</td>



                     <td>



                      <div class="btn-group">

                          

                        <button class="btn btn-warning btnEditarSerie" idSerie="'.$value["idSeries"].'" data-toggle="modal" data-target="#modalEditarSerie"  >

                        <i class="fa fa-pencil"></i></button>';



                        if($_SESSION["perfil"] == "Administrador"){



                          echo '<button class="btn btn-danger btnEliminarSerie" idSerie="'.$value["idSeries"].'"><i class="fa fa-times"></i></button>';



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

MODAL AGREGAR SERIE

======================================-->



<div id="modalAgregarSerie" class="modal fade" role="dialog">



  <div class="modal-dialog">



    <div class="modal-content">



      <form role="form" method="post">



        <!--=====================================

        CABEZA DEL MODAL

        ======================================-->



        <div class="modal-header" style="background:#3c8dbc; color:white">



          <button type="button" class="close" data-dismiss="modal">&times;</button>



          <h4 class="modal-title">Agregar Categoría</h4>



        </div>

    

    

    

    



        <!--=====================================

        CUERPO DEL MODAL

        ======================================-->



        <div class="modal-body">



          <label>Código Categoría</label>



          <div class="box-body">



            <!-- ENTRADA PARA EL IDSERIE -->

            

            <div class="form-group">

              

              <div class="input-group">

              

                <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span> 



                <input type="text" class="form-control input-lg" name="nuevaSerie"  >



              </div>



            </div>



            <!-- ENTRADA PARA NOMBRE SERIE -->



             <div class="form-group">



              <label>Descripción</label>

              

              <div class="input-group">

              

                <span class="input-group-addon"><i class="fa fa-folder-open"></i></span> 



                <input type="num" class="form-control input-lg" name="nuevoNombreSerie" required>



              </div>



            </div>



              <!-- ENTRADA PARA FECHA INI -->



             <div class="form-group">



              <label>Fecha desde</label>

              

              <div class="input-group">

              

                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 



                <input type="date" class="form-control input-lg" name="seriesIni"  required>



              </div>



            </div>





             <!-- ENTRADA PARA FECHA FIN -->



             <div class="form-group">



              <label>Fecha hasta</label>

              

              <div class="input-group">

              

                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 



                <input type="date" class="form-control input-lg" name="seriesFin"  required>



              </div>



            </div>





            



          </div>



        </div>



        <!--=====================================

        PIE DEL MODAL

        ======================================-->



        <div class="modal-footer">



          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>



          <button type="submit" class="btn btn-primary">Guardar Serie</button>



        </div>



        <?php



        $crearSeries = new ControladorSeries();

        $crearSeries -> ctrCrearSeries();



        ?>



      </form>



    </div>



  </div>



</div>



<!--=====================================

MODAL EDITAR SERIE

======================================-->



<div id="modalEditarSerie" class="modal fade" role="dialog">

  

  <div class="modal-dialog">



    <div class="modal-content">



      <form role="form" method="post">



        <!--=====================================

        CABEZA DEL MODAL

        ======================================-->



        <div class="modal-header" style="background:#3c8dbc; color:white">



          <button type="button" class="close" data-dismiss="modal">&times;</button>



          <h4 class="modal-title">Editar Categoría</h4>



        </div>



        <!--=====================================

        CUERPO DEL MODAL

        ======================================-->



        <div class="modal-body">



          <div class="box-body">



            <!-- ENTRADA PARA EL IDSERIE -->

            

            <div class="form-group" hidden="">

              

              <div class="input-group">

              

                <span class="input-group-addon"><i class="fa fa-folder"></i></span> 



                <input type="text" class="form-control input-lg" name="editarnuevaSerie" id="editarnuevaSerie" readonly="" >



              </div>



            </div>



            <!-- ENTRADA PARA EL CODIGO -->

            

            <div class="form-group" >



              <label>Código Categoría</label>

              

              <div class="input-group">

              

                <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span> 



                <input type="text" class="form-control input-lg" name="editarnuevaCodigo" id="editarnuevaCodigo"  >



              </div>



            </div>



            <!-- ENTRADA PARA EL NOMBRE -->

            

            <div class="form-group">



              <label>Descripción</label>

              

              <div class="input-group">

              

                <span class="input-group-addon"><i class="fa fa-folder-open"></i></span> 



                <input type="text" class="form-control input-lg" name="editarSerie" id="editarSerie" required>



                 <input type="hidden"  name="idSerie" id="idSerie" required>



              </div>



            </div>





                 <!-- ENTRADA PARA FECHA INI -->



             <div class="form-group">



              <label>Fecha desde</label>

              

              <div class="input-group">

              

                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 



                <input type="date" class="form-control input-lg" name="editarseriesIni" id="editarseriesIni"  onkeyup="

                                    var v = this.value;

                                    if (v.match(/^\d{4}$/) !== null) {

                                        this.value = v + '/';

                                    } else if (v.match(/^\d{4}\/\d{2}$/) !== null) {

                                        this.value = v + '/';

                                    }"

                                maxlength="10">



              </div>



            </div>





             <!-- ENTRADA PARA FECHA FIN -->



             <div class="form-group">



              <label>Fecha hasta</label>

              

              <div class="input-group">

              

                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 



                <input type="date" class="form-control input-lg" name="editarseriesFin" id="editarseriesFin"  onkeyup="

                                    var v = this.value;

                                    if (v.match(/^\d{4}$/) !== null) {

                                        this.value = v + '/';

                                    } else if (v.match(/^\d{4}\/\d{2}$/) !== null) {

                                        this.value = v + '/';

                                    }"

                                maxlength="10">



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



          $editarSerie = new ControladorSeries();

          $editarSerie -> ctrEditarSerie();



        ?> 



    </div>



  </div>



</div>





 <?php



        $EliminarSerie = new ControladorSeries();

        $EliminarSerie -> ctrEliminarSerie();

  ?>