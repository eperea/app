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
      
      Administrar documento
    
    </h1>
    




    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar documento</li>
    
    </ol>

  </section>

<section class="content">

    <div class="box">

      <div class="box-header btn-group with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarSubir">
          
          Subir PDF

        </button>
        
          
        

      </div>
      
      

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" style="font-size: 14px; width:100%">
         
        <thead >
         
         <tr>
           
           <th style="width:10px">#</th>
         
           <th>Documento</th>
           <th>Descripcion</th>
       
           <!-- <th>Tipo</th> -->
           <th>Nota</th>           
          <th style="width:80px">Ver PDF</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>
          
         <?php


          $item = null;
          $valor = null;

          $Subir = ControladorSubirPdf::ctrMostrarSubirPdf($item, $valor);

          foreach ($Subir as $key => $value) {
           
            echo ' <tr>

                    <td>'.($key+1).'</td>

        
                    <td class="text-uppercase">'.$value["titulo"].'</td>
                    <td class="text-uppercase">'.$value["descripcion"].'</td>
                    
                   <!-- <td class="text-uppercase">'.$value["tipo"].'</td> -->
                    <td class="text-uppercase">'.$value["nota"].'</td>
                    <td class="text-uppercase">


                    <div class="box-header with-border btn-group">

                    <button class="btn btn-info btnEditarSubir " idSubir="'.$value["id_documento"].'" data-toggle="modal" data-target="#modalEditarDocumento"  >
                        <i class="fa fa-file-pdf-o"></i></button>

                    <form method="post" action="extensiones/pdf/archivo.php" target="_blank"  >

                    <input type="text" name="subirP" value="'.$value['id_documento'].'" hidden>
  
                    <button class="btn btn-info">

                    </form>
                        
                        <i class="fa fa-eye"></i>

                      </button>




                     

                    </div>

                    </td>
                    <td>

                         


                      <div class="btn-group" style="padding-top: 10px;">
                   
                          
                        <button class="btn btn-warning btnEditarSubir " idSubir="'.$value["id_documento"].'" data-toggle="modal" data-target="#modalEditarSubir"  >
                        <i class="fa fa-pencil"></i></button>';

                        if($_SESSION["perfil"] == "Administrador"){

                          echo '<button class="btn btn-danger btnEliminarSubir" idSubir="'.$value["id_documento"].'" ><i class="fa fa-times"></i></button>';

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
MODAL AGREGAR documento
======================================-->

<div id="modalAgregarSubir" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Documento</h4>

        </div>
    
    
    
    

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

               <!-- ENTRADA PARA EL DEPOSITO  -->

            <div class="form-group">

              <label>Código carpeta</label>
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <select class="form-control input-lg mibuscador" id="nuevaunidades" name="nuevaunidades" required>
                  
                  <option value="">-- Selecione carpeta --</option>

                  <?php

                  $item = null;
                  $valor = null;

                  $tipos = ControladorUnidades::ctrMostrarUnidades($item, $valor);

                  foreach ($tipos as $key => $value) {
                    
                    echo '<option value="'.$value["idUnidaddocumental"].'">'.$value["codigo"], " - ", $value["descripcion"].'</option>';
                  }

                  ?>
  
                </select>

              </div>

            </div>

            <!-- ENTRADA PARA TITULO-->
            
            <div class="form-group">

               <label>Título</label>
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-folder"></i></span> 

                <input type="text" class="form-control input-lg" name="tituloPdf" >

              </div>

            </div>

            <!-- ENTRADA PARA NOMBRE DESCRIPCION -->

             <div class="form-group">

               <label>Descripción</label>
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-folder"></i></span> 

                <input type="text" class="form-control input-lg" name="descripcionPdf"  required>

              </div>

            </div>

             <!-- ENTRADA PARA EL OBSERVACIONES -->
            
            <div class="form-group">

                 <label>Observaciones</label>
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-comments"></i></span> 


                  <textarea class="form-control" name="nota" id="nota" rows="3" placeholder="Ingresar Observacion..."></textarea>
                

              </div>

            </div>


            <!-- ENTRADA PARA NOMBRE ARCHIVO -->

             <div class="form-group">

              <label>Subir documento</label>
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-file-pdf-o"></i></span> 

                <input type="file" class="form-control input-lg" class="editararchivoPdf" name="archivoPdf" placeholder="Subir PDF" required>

              </div>

            </div>

            

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar documento</button>

        </div>

        <?php

        $crearPdf = new ControladorSubirPdf();
        $crearPdf -> ctrCrearSubirPdf();

        ?>

      </form>

    </div>

  </div>

</div>



        

<!--=====================================
MODAL EDITAR documento
======================================-->

<div id="modalEditarSubir" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar documento</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">


             <!-- ENTRADA PARA EL IDSERIE -->
            
            <div class="form-group" hidden>

              <label>Id</label>
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg" name="editarnuevaId" id="editarnuevaId"  >

              </div>

            </div>

        

             <!-- ENTRADA PARA EL DEPOSITO  -->

            <div class="form-group">

              <label>Código carpeta</label>
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <select class="form-control input-lg mibuscador"  name="editarunidades" required>
                  
                  <option id="editarunidades"></option>

                  <?php

                  $item = null;
                  $valor = null;

                  $tipos = ControladorUnidades::ctrMostrarUnidades($item, $valor);

                  foreach ($tipos as $key => $value) {
                    
                    echo '<option value="'.$value["idUnidaddocumental"].'">'.$value["codigo"], " - ", $value["descripcion"].'</option>';
                  }

                  ?>
  
                </select>

              </div>

            </div>

            <!-- ENTRADA PARA EL IDSERIE -->
            
            <div class="form-group">

              <label>Título</label>
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-folder"></i></span> 

                <input type="text" class="form-control input-lg" name="editarnuevaSubirpdf" id="editarnuevaSubirpdf"  >

              </div>

            </div>

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">

              <label>Descripción</label>
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg" name="editarSubirpdf" id="editarSubirpdf">

                <input type="hidden"  name="idSubir" id="idSubir" required>

              </div>

            </div>

             <!-- ENTRADA PARA EL OBSERVACIONES -->
            
            <div class="form-group">

                 <label>Observaciones</label>
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-comments"></i></span> 


                  <textarea class="form-control" name="editarnota" id="editarnota" rows="3" placeholder="Ingresar Observacion..."></textarea>
                

              </div>

            </div>

            <!-- ENTRADA PARA NOMBRE ARCHIVO -->

             <div class="form-group">

              <label>Subir documento</label>
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-file-pdf-o"></i></span> 

                <input type="file" class="form-control input-lg" name="editararchivoPdf" class="editararchivoPdf" placeholder="Subir PDF" >

                 <input type="hidden"  name="idSubir" id="idSubir" required>

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

          $editarSubir = new ControladorSubirPdf();
          $editarSubir -> ctrEditarSubir();

        ?> 

    </div>

  </div>

</div>


 <?php

        $eliminarDoct = new ControladorSubirPdf();
        $eliminarDoct -> ctrEliminarSubir();
  ?>


<!--=====================================
MODAL PDF
======================================-->

<div id="modalEditarDocumento" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" onclick="location.reload();" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Ver documento</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

         
            <!-- ENTRADA PARA SUBIR PDF -->

             <div class="form-group">
              
                   
             <object width="100%" height="500" type="application/pdf" style="height: 70vh;" data="" class="previsualizar" id="nombre" ></object>

                          
            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-primary" onclick="location.reload();" data-dismiss="modal">Cerrar documento</button>
        
        </div>

     
      </form>

    </div>

  </div>

</div>
