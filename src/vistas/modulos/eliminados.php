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
      
      Administrar Carpetas
    
    </h1>

 </br>
    
    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar carpetas </li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">


  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUnidad">
          
          Agregar Carpeta          

         </button>

    
                

                  
         </div>

       <table class="table table-bordered table-striped dt-responsive tablaUnidades1" width="100%">
         
        <thead>

         
         
         <tr>
           
          
           
           <th style="width:10px">Código sub Categoría</th>
           <th style="width:10px">Código carpeta</th>
           <th>Descripcion</th>
           <th>Fecha inicial</th>
           <th>Fecha final</th>
           <th style="width:10px">Tiempo Archivo Gestión</th>
           <th style="width:10px">Tiempo Archivo Central</th>          
           <th>Disposición final</th>
           <th>Soporte</th>           
           <th>Observaciones</th>
           <th>Status documento</th>           
           <th>Acciones</th>

         </tr> 

        </thead>

        

       </table>

        <div class="box-tools pull-left">
                  <!--CODIGO PARA IMPRIMIR REPORTE -->

                  <label>Reportes</label>

                  <form method="post" action="extensiones/tcpdf/pdf/carpetas.php" target="_blank"  >

                    <input type="text" name="create_pdf"  hidden>

                  
                         <div class="btn-group">

                               <a class="btn btn-success" href="extensiones/exportar/pdf.php" aria-label="reporte xls" title="Descargar reporte en Excel">
                                  <i class="fa fa-file-excel-o" aria-hidden="true"></i>
                                </a>

                                <button class="btn btn-danger" title="Descargar reporte en pdf">                    
                          
                                   <i class="fa fa-file-pdf-o"></i>

                               </button>

                         </div> 

                  </form>

        </div>

<input type="hidden" value="<?php echo $_SESSION['id']; ?>" id="idoculto1">
      

    </div>

  </section>

</div>


<!--=====================================
MODAL AGREGAR UNIDAD
======================================-->

<div id="modalAgregarUnidad" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar unidad</h4>

        </div>
    
    
    
    

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">


             <!-- ENTRADA PARA NOMBRE CÓDIGO SERIE -->

           <div class="form-group">

                  <label>Código serie</label>

                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-folder-open"></i></span>
                    
                    <select class="form-control"  name="nuevaSerie_id" title="Elija la serie a la que le pertenece la unidad documental">

                    <option value="">-- Seleccione --</option>

                      <?php

                      $item = null;

                      $valor = null;

                      $categorias = ControladorSeries::ctrMostrarSeries($item, $valor);

                        foreach ($categorias as $key => $value) {

                         echo '<option value="'.$value["idSeries"].'">'. $value["codigo"], " - ",  $value["nombreSerie"].'</option>';

                       }


                    ?>

                

                    </select>
                </div>
            </div>

            <!-- ENTRADA PARA EL IDSERIE -->
            
            <div class="form-group">

              <label>Código subserie</label>
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span> 

                <input type="number" class="form-control input-lg" name="nuevaUnidad" title="Ingresar codigo de la unidad documental" >

              </div>

            </div>

            <!-- ENTRADA PARA EL IDSERIE -->
            
            <div class="form-group">

              <label>Código carpeta</label>
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span> 

                <input type="number" class="form-control input-lg" name="nuevaUnidad1" title="Ingresar codigo de la unidad documental" >

              </div>

            </div>

            <!-- ENTRADA PARA LA DESCRIPCION -->
            
            <div class="form-group">

              <label>Descripción</label>
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-book"></i></span> 

                <input type="text" class="form-control input-lg" name="descripcion" title="Ingresar descripción de la unidad documental" >

              </div>

            </div>

             <!-- ENTRADA PARA FECHA INICIO -->
            
            <div class="form-group">

              <label>Fecha desde</label>
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

               

                <input type="date" name="nuevaFechaIni" class="form-control input-lg" title="Fecha de inicio de la unidad documental"

                  onkeyup="
                      var v = this.value;
                      if (v.match(/^\d{4}$/) !== null) {
                          this.value = v + '/';
                      } else if (v.match(/^\d{4}\/\d{2}$/) !== null) {
                          this.value = v + '/';
                      }"
                  maxlength="10"}>

              </div>

            </div>

             <!-- ENTRADA PARA FECHA FIN -->
            
            <div class="form-group">

              <label>Fecha hasta</label>
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-calendar-times-o"></i></span> 

                 <input type="date" name="nuevaFechafin" class="form-control input-lg" title="Fecha final de la unidad documental"

                    onkeyup="
                        var v = this.value;
                        if (v.match(/^\d{4}$/) !== null) {
                            this.value = v + '/';
                        } else if (v.match(/^\d{4}\/\d{2}$/) !== null) {
                            this.value = v + '/';
                        }"
                    maxlength="10"}>

              </div>

            </div>

            <!-- ENTRADA PARA TIEMPO ARCHIVO DE GESTION  -->
            
            <div class="form-group">

              <label>Tiempo Archivo Gestión</label>
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-folder"></i></span> 

                <input type="number" class="form-control input-lg" name="nuevoTiempogest"  title="Ingresar codigo de la unidad documental" >

              </div>

            </div>

             <!-- ENTRADA PARA TIEMPO ARCHIVO CENTRAL  -->
            
            <div class="form-group">

              <label>Tiempo Archivo Central</label>
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="glyphicon glyphicon-folder-close"></i></span> 

                <input type="number" class="form-control input-lg" name="nuevoTiempocent" title="Ingresar codigo de la unidad documental" >

              </div>

            </div>

             <!-- ENTRADA PARA LA UNIDAD DE CONSERVACION -->
            
            <div class="form-group">

               <label>Disposición final</label>
                  
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-folder"></i></span>
                    
                    <select class="form-control" id="conservacion" name="conservacion"  >

                    <option value="">-- SELECCIONE --</option>
                    <option value="CONSERVACION TOTAL">CONSERVACION TOTAL</option>
                    <option value="ELIMINACION">ELIMINACION</option>
                    <option value="MEDIO TECNICO">MEDIO TECNICO</option>
                    <option value="SELECCION O MUESTREO">SELECCION O MUESTREO</option>

                  

                    </select>
                </div>
            </div>

                 <!-- ENTRADA PARA SOPORTE -->

                <div class="form-group">

                   <label>Soporte</label>
                            
                            <div class="input-group">
                            
                              <span class="input-group-addon"><i class="fa fa-folder"></i></span> 

                             

                              <select class="form-control" name="fechadestruccion"  >

                              <option value="">-- SELECCIONE --</option>

                              <option value="PAPEL">PAPEL</option>
                              <option value="ELECTRONICO">ELECTRONICO</option>
                              <option value="HIBRIDO">HIBRIDO</option>


                            </select>                             

                            </div>

                          </div>

             <!-- ENTRADA PARA EL OBSERVACIONES -->
            
            <div class="form-group">

                 <label>Observaciones</label>
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-comments"></i></span> 


                  <textarea class="form-control" name="nuevaObservacion" rows="2" placeholder="Ingresar Observacion..."></textarea>
                

              </div>

            </div>

            <hr>

             <!-- ENTRADA PARA EL EMPRESA -->
            
            <div class="form-group">

              <label>Empresa</label>
                  
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-building"></i></span>
                    
                    <select class="form-control"  name="nuevaEmpresa" title="Elija la empresa a la que le pertenece la unidad documental">

                    <option value="">-- SELECCIONE --</option>

                    <?php

                      $item = null;

                      $valor = null;

                      $categorias = ControladorEmpresas::ctrMostrarEmpresas($item, $valor);

                       foreach ($categorias as $key => $value) {

                         echo '<option value="'.$value["idEmpresa"].'">'.$value["EmpNombreempresa"].'</option>';

                       }

                    ?>

                    </select>

                </div>

            </div>

             <!-- ENTRADA PARA EL SEDE -->


          <div class="form-group">
                  
                  <label>Sede</label>

                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-industry"></i></span>
                    
                    <select class="form-control"  name="nuevaSede" title="Elija la sede a la que le pertenece la unidad documental" >

                    <option value="">-- SELECCIONE --</option>

                     <?php

                      $item = null;

                      $valor = null;

                      $categorias = ControladorSedes::ctrMostrarSedes($item, $valor);

                        foreach ($categorias as $key => $value) {

                         echo '<option value="'.$value["idSede"].'">'.$value["SedLocalizacion"].'</option>';

                       }


                    ?>


                    </select>
                </div>
            </div>

            <!-- ENTRADA PARA NOMBRE DEPARTAMENTO -->

             <div class="form-group">

              <label>Departamento</label>
                  
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-university"></i></span>
                    
                    <select class="form-control"  name="nuevaDepartamento" title="Elija el departamento al que le pertenece la unidad documental">

                    <option value="">-- SELECCIONE --</option>

                      <?php

                      $item = null;

                      $valor = null;

                      $categorias = ControladorDepartamentos::ctrMostrarDepartamentos($item, $valor);

                        foreach ($categorias as $key => $value) {

                         echo '<option value="'.$value["idDepartamento"].'">'.$value["DepCodigo"].'</option>';

                       }


                    ?>

              

                    </select>
                </div>
            </div>

             


              <!-- ENTRADA PARA CAJA -->

<div class="form-group">


  <label>Caja</label>
                  
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-archive"></i></span>
                    
                    <select class="form-control" name="nuevaCaja" title="Elija la caja en donde se conservarà la unidad documental en el archivo" >

                    <option value="">-- SELECCIONE --</option>

                    <?php

                      $item = null;

                      $valor = null;

                      $categorias = ControladorCajas::ctrMostrarCajas($item, $valor);

                        foreach ($categorias as $key => $value) {

                         echo '<option value="'.$value["idCaja"].'">'. $value["caja_prefijo"], " ",  $value["caja_codigo"].'</option>';

                         
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

          <button type="submit" class="btn btn-primary">Guardar Unidad</button>

        </div>

        <?php

        $crearUnidades = new ControladorUnidades();
        $crearUnidades -> ctrCrearUnidades();

        ?>

      </form>

    </div>

  </div>

</div>



<!--=====================================
MODAL EDITAR UNIDAD
======================================-->

<div id="modalEditarUnidad" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar unidad</h4>

        </div>
   
    

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- CODIGO ID UNIDAD DOCUMENTAL -->
            
            <div class="form-group">

              <label>Id subserie</label>
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-folder"></i></span> 

                <input type="text" class="form-control input-lg" name="editarnuevaIdunidad" id="editarnuevaIdunidad" title="Ingresar codigo de la unidad documental" readonly="">

              </div>

            </div>

            <!-- ENTRADA PARA NOMBRE CÓDIGO SERIE -->

           <div class="form-group">

                  <label>Código serie</label>

                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                    
                    <select class="form-control"  name="editarnuevaSerie_id" title="Elija la serie a la que le pertenece la unidad documental">

                    <option id="editarnuevaSerie_id"></option>

                         <?php

                      $item = null;

                      $valor = null;

                      $categorias = ControladorSeries::ctrMostrarSeries($item, $valor);

                        foreach ($categorias as $key => $value) {

                         echo '<option value="'.$value["idSeries"].'">'. $value["codigo"], " - ",  $value["nombreSerie"].'</option>';

                       }


                    ?>

                

                    </select>
                </div>
            </div>

             <!-- ENTRADA PARA SUBSERIE -->
            
            <div class="form-group">

              <label>Código subserie</label>
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-barcode"></i></span> 

                <input type="number" class="form-control input-lg" name="editarnuevaUnidad" id="editarnuevaUnidad" title="Ingresar codigo de la unidad documental" >

              </div>

            </div>  

             <!-- ENTRADA PARA CARPETA -->
            
            <div class="form-group">

              <label>Código carpeta</label>
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-barcode"></i></span> 

                <input type="number" class="form-control input-lg" name="editarnuevaUnidad1" id="editarnuevaUnidad1" title="Ingresar codigo de la unidad documental" >

              </div>

            </div>  
           

            <!-- ENTRADA PARA LA DESCRIPCION -->
            
            <div class="form-group">

              <label>Descripción</label>
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-book"></i></span> 

                <input type="text" class="form-control input-lg" name="editardescripcion"  id="editardescripcion" title="Ingresar descripción de la unidad documental" >

              </div>

            </div>

            
             <!-- ENTRADA PARA FECHA INICIO -->
            
            <div class="form-group">

              <label>Fecha desde</label>
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

               

                <input type="date" name="editarnuevaFechaIni" id="editarnuevaFechaIni" class="form-control input-lg" title="Fecha de inicio de la unidad documental"

                  onkeyup="
                      var v = this.value;
                      if (v.match(/^\d{4}$/) !== null) {
                          this.value = v + '/';
                      } else if (v.match(/^\d{4}\/\d{2}$/) !== null) {
                          this.value = v + '/';
                      }"
                  maxlength="10"}>

              </div>

            </div>

             <!-- ENTRADA PARA FECHA FIN -->
            
            <div class="form-group">

              <label>Fecha hasta</label>
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span> 

                 <input type="date" name="editarnuevaFechafin" id="editarnuevaFechafin" class="form-control input-lg" title="Fecha final de la unidad documental"

                    onkeyup="
                        var v = this.value;
                        if (v.match(/^\d{4}$/) !== null) {
                            this.value = v + '/';
                        } else if (v.match(/^\d{4}\/\d{2}$/) !== null) {
                            this.value = v + '/';
                        }"
                    maxlength="10"}>

              </div>

            </div>

            <!-- ENTRADA PARA TIEMPO ARCHIVO DE GESTION  -->
            
            <div class="form-group">

              <label>Tiempo Archivo Gestión</label>
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-folder"></i></span> 

                <input type="number" class="form-control input-lg" name="editarTiempogest" id="editarTiempogest"  title="Ingresar codigo de la unidad documental" >

              </div>

            </div>

             <!-- ENTRADA PARA TIEMPO ARCHIVO CENTRAL  -->
            
            <div class="form-group">

              <label>Tiempo Archivo Central</label>
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-folder"></i></span> 

                <input type="number" class="form-control input-lg" name="editarTiempocent" id="editarTiempocent" title="Ingresar codigo de la unidad documental" >

              </div>

            </div>

             <!-- ENTRADA PARA LA UNIDAD DE CONSERVACION -->
            
            <div class="form-group">

               <label>Disposición final</label>
                  
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-folder"></i></span>
                    
                    <select class="form-control" id="editarconservacion" name="editarconservacion"  >

                    <option value="">-- SELECCIONE --</option>
                    <option value="CONSERVACION TOTAL">CONSERVACION TOTAL</option>
                    <option value="ELIMINACION">ELIMINACION</option>
                    <option value="MEDIO TECNICO">MEDIO TECNICO</option>
                    <option value="SELECCION O MUESTREO">SELECCION O MUESTREO</option>

                  

                    </select>
                </div>
            </div>

                 <!-- ENTRADA PARA SOPORTE -->

                <div class="form-group">

                   <label>Soporte</label>
                            
                            <div class="input-group">
                            
                              <span class="input-group-addon"><i class="fa fa-folder"></i></span> 

                             

                              <select class="form-control" name="editarfechadestruccion" id="editarfechadestruccion" >

                              <option value="">-- SELECCIONE --</option>

                              <option value="PAPEL">PAPEL</option>
                              <option value="ELECTRONICO">ELECTRONICO</option>
                              <option value="HIBRIDO">HIBRIDO</option>


                            </select>                             

                            </div>

                          </div>

             <!-- ENTRADA PARA EL OBSERVACIONES -->
            
            <div class="form-group">

                 <label>Observaciones</label>
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-comments"></i></span> 


                  <textarea class="form-control" name="editarnuevaObservacion" id="editarnuevaObservacion" rows="2" placeholder="Ingresar Observacion..."></textarea>
                

              </div>

            </div>

            <hr>

             <!-- ENTRADA PARA EL EMPRESA -->
            
            <div class="form-group">

              <label>Empresa</label>
                  
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-building"></i></span>
                    
                    <select class="form-control"  name="editarnuevaEmpresa" title="Elija la empresa a la que le pertenece la unidad documental">

                     <option id="editarnuevaEmpresa"></option>

                    <?php

                      $item = null;

                      $valor = null;

                      $categorias = ControladorEmpresas::ctrMostrarEmpresas($item, $valor);

                       foreach ($categorias as $key => $value) {

                         echo '<option value="'.$value["idEmpresa"].'">'.$value["EmpNombreempresa"].'</option>';

                       }

                    ?>

                    </select>

                </div>

            </div>

             <!-- ENTRADA PARA EL SEDE -->


          <div class="form-group">
                  
                  <label>Sede</label>

                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-industry"></i></span>
                    
                    <select class="form-control"  name="editarnuevaSede"  title="Elija la sede a la que le pertenece la unidad documental" >

                     <option id="editarnuevaSede"></option>

                     <?php

                      $item = null;

                      $valor = null;

                      $categorias = ControladorSedes::ctrMostrarSedes($item, $valor);

                        foreach ($categorias as $key => $value) {

                         echo '<option value="'.$value["idSede"].'">'.$value["SedLocalizacion"].'</option>';

                       }


                    ?>


                    </select>
                </div>
            </div>

            <!-- ENTRADA PARA NOMBRE DEPARTAMENTO -->

             <div class="form-group">

              <label>Departamento</label>
                  
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-university"></i></span>
                    
                    <select class="form-control"  name="editarnuevaDepartamento"  title="Elija el departamento al que le pertenece la unidad documental">

                    <option id="editarnuevaDepartamento"></option>

                      <?php

                      $item = null;

                      $valor = null;

                      $categorias = ControladorDepartamentos::ctrMostrarDepartamentos($item, $valor);

                        foreach ($categorias as $key => $value) {

                         echo '<option value="'.$value["idDepartamento"].'">'.$value["DepCodigo"].'</option>';

                       }


                    ?>

              

                    </select>
                </div>
            </div>

             


              <!-- ENTRADA PARA CAJA -->

<div class="form-group">


  <label>Caja</label>
                  
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-archive"></i></span>
                    
                    <select class="form-control" name="editarnuevaCaja">

                     <option id="editarnuevaCaja"></option>

                    <?php

                      $item = null;

                      $valor = null;

                      $categorias = ControladorCajas::ctrMostrarCajas($item, $valor);

                        foreach ($categorias as $key => $value) {

                         echo '<option value="'.$value["idCaja"].'">'. $value["caja_prefijo"], " ",  $value["caja_codigo"].'</option>';

                         
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

          <button type="submit" class="btn btn-primary">Guardar Unidad</button>

        </div>

        <?php

        $editarUnidad = new ControladorUnidades();
        $editarUnidad -> ctrEditarUnidad();
   
        

        ?>

      </form>



    </div>

  </div>

    </div>





 <?php

        $eliminarUnidad = new ControladorUnidades();
        $eliminarUnidad -> ctrEliminarUnidad();
  ?>
