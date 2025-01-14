<?php
include_once 'extensiones/pdf/config.inc.php';
?>



<div class="content-wrapper">
    
    

  <section class="content-header">
    
    <h1>
      
      Buscar unidades documentales
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Buscar unidades documentales</li>
    
    </ol>
    
    <br>
    
   

  </section>

  <section class="content">

    <div class="box">

   
      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" style="width:100%">
         
        <thead>




         
         <tr>
           
           
           <th>Código carpeta</th>           
           <th>descripción</th>
           <th>Tipo de caja</th>
           <th>Prefijo caja</th>
           <th># Caja</th>
           <th># Estante</th>
           <th># Entrepaño</th>
           <th>Bloque</th>
           <th>Bodega</th>
        
        <!--   <th>Acciones</th> -->
         

         </tr> 

        </thead>

        <tbody>

           <?php
       
        $db=new Conect_MySql();
            $sql = "SELECT * FROM consulta_carpetas";
            $query = $db->execute($sql);
            while($datos=$db->fetch_row($query)){?>
          <tr>
                      <td><?php echo $datos['codigo1']; ?></td>                     
                      <td><?php echo $datos['descripcion']; ?></td>
                      <td><?php echo $datos['caja_tipo']; ?></td>
                      <td><?php echo $datos['caja_prefijo']; ?></td>
                      <td><?php echo $datos['caja_codigo']; ?></td>
                      <td><?php echo $datos['num_estante']; ?></td>
                      <td><?php echo $datos['num_entrepano']; ?></td>
                      <td><?php echo $datos['bloque']; ?></td>
                      <td><?php echo $datos['deposito']; ?></td>
                      
<!--
                     <td>

                      <div class="btn-group">
                          
                        <button class="btn btn-warning btnEditarPdf" idUnidad="'.$value["idUnidaddocumental"].'" data-toggle="modal" data-target="#modalEditarUnidad"  >
                        <i class="fa fa-pencil"></i></button>

                          <button class="btn btn-danger btnEliminarPdf" idUnidad="'.$value["idUnidaddocumental"].'"><i class="fa fa-times"></i></button>

                    </div>  

                    </td>
-->


                  </tr>
         <?php  } ?>
          

        </tbody>

       </table>

              <div class="box-tools pull-left">
                  <!--CODIGO PARA IMPRIMIR REPORTE -->

                  <label>Reportes</label>

                  <form method="post" action="extensiones/tcpdf/pdf/ubicacioncarpeta.php" target="_blank"  >

                    <input type="text" name="create_pdf"  hidden>

                  
                         <div class="btn-group">

                               <a class="btn btn-success" href="extensiones/exportar/ubicacioncarpeta.php" aria-label="reporte xls" title="Descargar reporte en Excel">
                                  <i class="fa fa-file-excel-o" aria-hidden="true"></i>
                                </a>

                              <!--   <button class="btn btn-danger" title="Descargar reporte en pdf" >                    
                          
                                   <i class="fa fa-file-pdf-o"></i>

                               </button> -->

                         </div> 

                  </form>

        </div>


      </div>

    </div>

  </section>

</div>


