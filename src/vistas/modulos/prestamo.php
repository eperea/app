<?php

// Las siguientes lineas de código son para configurar el envio de mails una vez se hagan solicitudes de documentos
  //$mensaje="HOLA";
  if(isset($_POST["envio"])){
  
    include("extensiones/correo_enviar/php/envioCorreo.php");
      $email = new email($_POST["funcionario"],"info@demo.gdplus.co","tpa2019");

      $email->agregar("info@demo.gdplus.co", $_POST["nombre"], $_SESSION["email"]);

      //variables enviadas al archivo envioCorreo.php para ser incluidas dentro del cuerpo del mensaje del correo.

      $documento1 = $_POST["descDocumento"];

      $prioridad1 = $_POST["pres_prioridad"];

      $formato1 = $_POST["pres_formato"];

      $observaciones1 = $_POST["observaciones"];

            
      if ($email->enviar("GDPLUS - Tiene una nueva solicitud por: ", $_SESSION["nombre"], $contenido_html)){
              
          $mensaje= 'mensaje enviado';
              
      }else{
               
         $mensaje= 'El mensaje no se pudo enviar';
         $email->ErrorInfo;
      }



}elseif (isset($_POST["envio1"])) {

  include("extensiones/correo_enviar/php/envioCorreo.php");
      $email = new email($_POST["funcionario"],"info@demo.gdplus.co","tpa2019");

      $email->agregar("info@demo.gdplus.co", $_POST["nombre"], $_SESSION["email"]);

      //variables enviadas al archivo envioCorreo.php para ser incluidas dentro del cuerpo del mensaje del correo.

      $documento = $_POST["editardescDocumento"];

      $prioridad = $_POST["editar_pres_prioridad"];

      $formato = $_POST["editar_pres_formato"];

      $observaciones = $_POST["editarobservaciones"];

      $fecha_prestamo =     $_POST["editarfechaEntrega"];

      $numero_folios =      $_POST["editarnuevoFolio"];

      $estado_consulta =    $_POST["editar_pres_estado"];

      $fecha_devolucion =   $_POST["editarfechaDevolucion"];

      $funcionario_recibe = $_POST["editarnuevoFuncionarioRec"];
            
      if ($email->enviar("GDPLUS - El estado de su solicitud No {$_POST["idPrestamo"]} es:    ", "{$_POST["editar_pres_estado"]}", $contenido_html1)){
              
          $mensaje= 'mensaje enviado';
              
      }else{
               
         $mensaje= 'El mensaje no se pudo enviar';
         $email->ErrorInfo;
      }
  # code...
}


?>



<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar Préstamos documentales
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar Préstamos</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarPrestamo">
          
          Agregar Préstamo

        </button>

      </div>
      <!--=====================================
CAJAS DE ESTADO DE DOCUMENTOS
======================================-->

<?php

//SE DEFINEN COMO CONSTANTES LOS ESTADOS DE PRESTAMO DE DOCUMENTOS DEL MODULO PRESTAMOS

define("ESTADO_PRES1", "SOLICITADO");

define("ESTADO_PRES2", "EN PROCESO");

define("ESTADO_PRES3", "PRESTADO");

define("ESTADO_PRES4", "DEVUELTO");



$item = null;

$valor = null;

$orden = "id";


$estado_prestamos = ControladorPrestamos::ctrMostrarprestamos($item, $valor);


$estado_solicitado=0;
$estado_en_proceso=0;
$estado_prestado=0;
$estado_devuelto=0;



foreach ($estado_prestamos as $key => $value) {
    
    
          if($value["pres_estado"]== ESTADO_PRES1) 
          
          $estado_solicitado++;
    
          elseif($value["pres_estado"]== ESTADO_PRES2) 
          
          $estado_en_proceso++;
          
          elseif($value["pres_estado"]== ESTADO_PRES3) 
          
          $estado_prestado++;
          
          elseif($value["pres_estado"]== ESTADO_PRES4) 
          
          $estado_devuelto++;
          
                    
           
                                
          }



?>
      
    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
          <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-folder-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Solicitados</span>
              <span class="info-box-number"><?php echo  $estado_solicitado ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa  fa-hourglass-1 "></i></span>

            <div class="info-box-content">
              <span class="info-box-text">En Proceso</span>
              <span class="info-box-number"><?php echo  $estado_en_proceso ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="ion ion-ios-cart-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Préstados</span>
              <span class="info-box-number"><?php echo $estado_prestado  ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-archive"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Devueltos</span>
              <span class="info-box-number"><?php echo $estado_devuelto  ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->


      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th style="width:10px">Código</th>   
           <th>Descripcion</th>  
           <th>Prioridad </th> 
           <th>Formato</th>         
           <th>Funcionario</th>
           <th>Fecha solicitud</th>
           <th>Fecha entrega</th>
           <th>Folios</th>
           <th>Fecha Devolución</th>
           <th>Funcionario Archivo que recibe</th>  
           <th>Estado</th>         
           <th>Observaciones</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>
          
         <?php



          $item = null;
          $valor = null;

      
          $unidades = ControladorPrestamos::ctrMostrarPrestamos($item, $valor);
          
          
          
          
          

          foreach ($unidades as $key => $value) {
           
           
           //CODIGO PARA MOSTRAR UN COLOR DE ACUERDO AL TIPO DE ESTADO
           
          if ($value["pres_estado"]== ESTADO_PRES1)
              
               $estado = '<button type="button" class="btn bg-yellow btn-flat margin">'.ESTADO_PRES1.'</button>';
               
          if ($value["pres_estado"]== ESTADO_PRES2)
              
               $estado = '<button type="button" class="btn bg-aqua btn-flat margin">'.ESTADO_PRES2.'</button>';
               
          if ($value["pres_estado"]== ESTADO_PRES3)
              
               $estado = '<button type="button" class="btn bg-red btn-flat margin">'.ESTADO_PRES3.'</button>';
               
          if ($value["pres_estado"]== ESTADO_PRES4)
              
               $estado = '<button type="button" class="btn bg-green btn-flat margin">'.ESTADO_PRES4.'</button>';
          
         
            echo ' <tr>

                    <td>'.($key+1).'</td>

                    <td class="text-uppercase">'.$value["idPrestamo"].'</td>                  
                    <td class="text-uppercase">'.$value["descDocumento"].'</td> 
                    <td class="text-uppercase">'.$value["pres_prioridad"].'</td>  
                    <td class="text-uppercase">'.$value["pres_formato"].'</td>                     
                    <td class="text-uppercase">'.$value["funcionario"].'</td>
                    <td class="text-uppercase">'.$value["fechaPrestamo"].'</td>
                    <td class="text-uppercase">'.$value["fechaEntrega"].'</td>
                    <td class="text-uppercase">'.$value["folios"].'</td>
                    <td class="text-uppercase">'.$value["fechaDevolucion"].'</td>
                    <td class="text-uppercase">'.$value["funcionarioRec"].'</td>
                    <td class="text-uppercase">'.$estado.'</td>
                    <td>'.$value["observaciones"].'</td>
                 

                     <td>

                      <div class="btn-group">';

                      if($_SESSION["perfil"] == "Administrador"){

                          echo '
                          
                        <button class="btn btn-warning btnEditarPrestamo" idPrestamo="'.$value["idPrestamo"].'" data-toggle="modal" data-target="#modalEditarPrestamo"  >
                        <i class="fa fa-pencil"></i></button>

                        <button class="btn btn-danger btnEliminarPrestamo" idPrestamo="'.$value["idPrestamo"].'"><i class="fa fa-times"></i></button>';

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
MODAL AGREGAR Prestamo
======================================-->

<div id="modalAgregarPrestamo" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Préstamo</h4>

        </div>
    
    
    
    

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">


            <!-- ENTRADA PARA LA DESCRIPCION -->


              <div class="form-group">



              <label>Documentos a solicitar:</label>

              

              <div class="input-group">

              

                <span class="input-group-addon"><i class="fa fa-files-o"></i></span> 



                <select class="form-control input-lg mibuscador" style="width:100%" name="descDocumento" required>

                  

                  <option value="">-- Selecione Subserie --</option>



                  <?php



                  $item = null;

                  $valor = null;



                  $tipos = ControladorUnidades::ctrMostrarUnidades($item, $valor);



                  foreach ($tipos as $key => $value) {

                    

                    echo '<option value="'.$value["codigo1"].'">'.$value["codigo"], " - ", $value["descripcion"].'</option>';

                  }



                  ?>

  

                </select>




              </div>



            </div>

           

         

           
            <!-- ENTRADA PARA PRIORIDAD -->

            

            <div class="form-group">



               <label>Prioridad</label>

                  

                  <div class="input-group">

                    

                    <span class="input-group-addon"><i class="fa fa-folder"></i></span>

                    

                    <select class="form-control" id="pres_prioridad" name="pres_prioridad"  >



                    <option value="">-- SELECCIONE --</option>

                    <option value="ALTA">ALTA</option>

                    <option value="MEDIA">MEDIA</option>

                    <option value="BAJA">BAJA</option>

                                     



                    </select>

                </div>

            </div>


             <!-- ENTRADA PARA FORMATO -->

            

            <div class="form-group">



               <label>Formato</label>

                  

                  <div class="input-group">

                    

                    <span class="input-group-addon"><i class="fa fa-file"></i></span>

                    

                    <select class="form-control" id="pres_formato" name="pres_formato"  >



                    <option value="">-- SELECCIONE --</option>

                    <option value="DIGITAL">DIGITAL</option>

                    <option value="FISICO">FISICO</option>

                    <option value="FISICO Y DIGITAL">FISICO Y DIGITAL</option>

                               



                    </select>

                </div>

            </div>




   
                   

           
                            
             <!-- ENTRADA PARA EL FOLIO -->
            
<!--             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-file"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoFolio" placeholder="Ingresar cantidad de folios" >

              </div>

            </div> -->

 <!-- ENTRADA PARA EL FUNCIONARIO -->
            
         <!--    <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <input type="text" class="form-control input-lg" name="funcionario" placeholder="Ingresar nombre del colaborador que solicita el documento" >

              </div>

            </div> -->
   <!-- ENTRADA PARA EL EMPRESA -->
            
            <div class="form-group" hidden="">

              <label>Usuario que solicita:</label>
                  
                  
                     <div class="input-group">

              

                <span class="input-group-addon"><i class="fa fa-folder"></i></span> 



                <input type="text" class="form-control input-lg" name="funcionario" id="funcionario" value="<?php echo $_SESSION['nombre'];?>" title="Ingresar codigo de la unidad documental" readonly="">



          
                </div>
            </div>


             <!-- ENTRADA PARA FECHA DEVOLUCION 
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span> 

                 <input type="text" name="fechaDevolucion" placeholder="yyyy/mm/dd" class="form-control input-lg" 

                    onkeyup="
                        var v = this.value;
                        if (v.match(/^\d{4}$/) !== null) {
                            this.value = v + '/';
                        } else if (v.match(/^\d{4}\/\d{2}$/) !== null) {
                            this.value = v + '/';
                        }"
                    maxlength="10"}>

              </div>

            </div>-->

 <!-- ENTRADA PARA EL FUNCIONARIO 
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoFuncionarioRec" placeholder="Ingresar nombre del funcionario que recibe el documento" >

              </div>

            </div>-->


     


             <!-- ENTRADA PARA LA OBSERVACION -->
            
            <!-- ENTRADA PARA EL OBSERVACIONES -->

             <div class="form-group" hidden="">

              <label>Usuario que solicita:</label>
                  
                  
                     <div class="input-group">

              

                <span class="input-group-addon"><i class="fa fa-folder"></i></span> 



                <input type="text" class="form-control input-lg" name="pres_estado" id="pres_estado" value="SOLICITADO" title="Ingresar codigo de la unidad documental" readonly="">



          
                </div>
            </div>


            

            <div class="form-group">



                 <label>Observaciones</label>

              

              <div class="input-group">

              

                <span class="input-group-addon"><i class="fa fa-comments"></i></span> 





                  <textarea class="form-control" name="observaciones" rows="2"   placeholder="Ingresar Observacion..." > </textarea>

                
                    <input name="envio" value="si" hidden="hidden">


              </div>



            </div>


            
            </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

       

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Préstamo</button>

        </div>

        <?php

        $crearPrestamos = new ControladorPrestamos();
        $crearPrestamos -> ctrCrearPrestamos();

        ?>

      </form>

    </div>

  </div>

</div>



<!--=====================================
MODAL EDITAR Prestamo
======================================-->

<div id="modalEditarPrestamo" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Préstamo</h4>

        </div>
    
    
    
    

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

          <p style="color: #3c8dbc;">Datos de la solicitud</p>
                     
            <!-- ENTRADA PARA LA DESCRIPCION -->
            
            <div class="form-group">
              
               <label>Documentos a solicitar:</label>

              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-files-o"></i></span> 

                <input type="text" class="form-control input-lg" name="editardescDocumento" id="editardescDocumento" placeholder="Ingresar descripcion" readonly>
                 <input type="hidden"  name="idPrestamo" id="idPrestamo" required>
              </div>

            </div>

              <!-- ENTRADA PARA PRIORIDAD -->

            

            <div class="form-group">



               <label>Prioridad</label>

                  

                  <div class="input-group">

                    

                    <span class="input-group-addon"><i class="fa fa-folder"></i></span>

                    

                    <select class="form-control" id="editar_pres_prioridad" name="editar_pres_prioridad"  >



                    <option value="">-- SELECCIONE --</option>

                    <option value="ALTA">ALTA</option>

                    <option value="MEDIA">MEDIA</option>

                    <option value="BAJA">BAJA</option>                                   



                    </select>

                </div>

            </div>


             <!-- ENTRADA PARA FORMATO -->

            

            <div class="form-group">



               <label>Formato</label>

                  

                  <div class="input-group">

                    

                    <span class="input-group-addon"><i class="fa fa-file"></i></span>

                    

                    <select class="form-control input-lg" id="editar_pres_formato" name="editar_pres_formato"  >



                    <option value="">-- SELECCIONE --</option>

                    <option value="DIGITAL">DIGITAL</option>

                    <option value="FISICO">FISICO</option>

                    <option value="FISICO Y DIGITAL">FISICO Y DIGITAL</option>                              



                    </select>

                </div>

            </div>




            <!-- ENTRADA PARA EL FUNCIONARIO -->
            
            <div class="form-group">

               <label>Usuario que solicita:</label>
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <input type="text" class="form-control input-lg" name="editarfuncionario" id="editarfuncionario" placeholder="Ingresar nombre del funcionario que solicita el documento" readonly >

              </div>

            </div>

            <!-- ENTRADA PARA LA OBSERVACION -->
            
            <div class="form-group">



                 <label>Observaciones</label>

              

              <div class="input-group">

              

                <span class="input-group-addon"><i class="fa fa-comments"></i></span> 





                  <textarea class="form-control" name="editarobservaciones" id="editarobservaciones" rows="2"   placeholder="Ingresar Observacion..." > </textarea>

                
                  <input name="envio1" value="si" hidden="hidden">



              </div>



            </div>

            <hr style="color:#3c8dbc; ">

            <p style="color: #3c8dbc;">Datos del préstamo</p>

             <!-- ENTRADA PARA FECHA PRESTAMO 
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span> 

                 <input type="text" name="editarfechaPrestamo" id="editarfechaPrestamo" placeholder="yyyy/mm/dd" title="Fecha prèstamo del documento" class="form-control input-lg  " 

                    onkeyup="
                        var v = this.value;
                        if (v.match(/^\d{4}$/) !== null) {
                            this.value = v + '/';
                        } else if (v.match(/^\d{4}\/\d{2}$/) !== null) {
                            this.value = v + '/';
                        }"
                    maxlength="10"}>

              </div>

            </div>-->


            <!-- ENTRADA PARA ENTREGA DEL DOCUMENTO -->
            
            <div class="form-group">

              <label>Fecha de entrega:</label>
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span> 

                 <input type="date" name="editarfechaEntrega" id="editarfechaEntrega" placeholder="yyyy/mm/dd" title="Fecha prèstamo del documento" class="form-control input-lg  " 

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


             <!-- ENTRADA PARA EL FOLIO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-file"></i></span> 

                <input type="text" title="# de folios que se prestan" class="form-control input-lg" name="editarnuevoFolio" id="editarnuevoFolio" placeholder="Ingresar cantidad de folios" >

              </div>

            </div>
          
            <hr>

            <p style="color: #3c8dbc;">Datos de la devolución</p>

<!-- ENTRADA PARA ESTADO -->

            

            <div class="form-group">



               <label>Estado</label>

                  

                  <div class="input-group">

                    

                    <span class="input-group-addon"><i class="fa fa-folder"></i></span>

                    

                    <select class="form-control" id="editar_pres_estado" name="editar_pres_estado"  >



                    <option value="">-- SELECCIONE --</option>
                    
                    <option value="SOLICITADO">SOLICITADO</option>

                    <option value="EN PROCESO">EN PROCESO</option>

                    <option value="PRESTADO">PRESTADO</option>

                    <option value="DEVUELTO">DEVUELTO</option>

                                  



                    </select>

                </div>

            </div>

             <!-- ENTRADA PARA FECHA DEVOLUCION -->
            
            <div class="form-group">

              <label>Fecha de devolución:</label>
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span> 

                 <input type="date" name="editarfechaDevolucion" id="editarfechaDevolucion" placeholder="yyyy/mm/dd" title="Fecha devolución del documento"class="form-control input-lg" 

                    onkeyup="
                        var v = this.value;
                        if (v.match(/^\d{4}$/) !== null) {
                            this.value = v + '/';
                        } else if (v.match(/^\d{4}\/\d{2}$/) !== null) {
                            this.value = v + '-';
                        }"
                    maxlength="10"}>

              </div>

            </div>

 <!-- ENTRADA PARA EL NOMBRE DEL FUNCIONARIO -->
            
           <!--  <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="editarnuevoFuncionarioRec" id="editarnuevoFuncionarioRec" placeholder="Ingresar nombre del funcionario que recibe" >

              </div>

            </div> -->


              <!-- ENTRADA PARA EL FUNCIONARIO DE ARCHIVO -->

<div class="form-group">

  <label>Funcionario que recibe en el archivo:</label>
                  
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    
                    <select class="form-control" title="Usuario que recibe el documento en el archivo" id="editarnuevoFuncionarioRec" name="editarnuevoFuncionarioRec" >

                    <?php

                      $item = null;
                      $valor = null;

                      $usuario = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

                       foreach ($usuario as $key => $value) {

                         echo '<option value="'.$value["nombre"].'">'.$value["nombre"].'</option>';

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

          <button type="submit" class="btn btn-primary">Guardar Préstamo</button>

        </div>

        <?php

        $editarPrestamo = new ControladorPrestamos();
        $editarPrestamo -> ctrEditarPrestamo();
   
        

        ?>

          <?php
        echo $mensaje;
      ?>

      </form>

    </div>

  </div>

</div>



 <?php

        $eliminarPrestamo = new ControladorPrestamos();
        $eliminarPrestamo -> ctrEliminarPrestamo();
  ?>
