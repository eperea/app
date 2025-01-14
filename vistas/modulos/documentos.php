<div class="content-wrapper">



  <section class="content-header">

    

    <h1>

      

     Documentos

    

    </h1>



    <ol class="breadcrumb">

      

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      

      <li class="active">Administrar documentos </li>

    

    </ol>



  </section>



  <section class="content">



    <div class="box">



     

      <div class="box-body">

        

       <table class="table table-bordered table-striped dt-responsive tablas" style="width: 100%;">

         

        <thead>

         

         <tr>

           

           <th style="width:10px">#</th>

           

           <th>Código carpeta</th>                

           <th>Descripción</th>

           <th>Fecha inicio carpeta</th>

           <th>Fecha fin carpeta</th>

           <th hidden="">Id documento</th>

           <th>Titulo documento</th>

           <th>Descripción documento</th>          

           <th>Nota documento</th>          

           <th>Archivo</th> 

          



         </tr> 



        </thead>



        <tbody>

          

         <?php







          $item = null;

          $valor = null;



      

          $documentos = ControladorDocumentos::ctrMostrarDocumentos($item, $valor);



          foreach ($documentos as $key => $value) {

           

            echo ' <tr>



                    <td>'.($key+1).'</td>



                    

                    <td class="text-uppercase">'.$value["codigo1"].'</td>

                    <td class="text-uppercase">'.$value["descripcion"].'</td>

                    <td class="text-uppercase">'.$value["UniFechaInicio"].'</td>

                    <td class="text-uppercase">'.$value["UniFechafin"].'</td>

                    <td hidden class="text-uppercase">'.$value["id_documento"].'</td>

                    <td class="text-uppercase">'.$value["titulo"].'</td>

                    <td class="text-uppercase">'.$value["descripcion_tbl"].'</td>

                    <td class="text-uppercase">'.$value["nota"].'</td>

                    <td class="text-uppercase" style="width:100px">
    
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

                      




                  </tr>';

          }



        ?>



          



        </tbody>



       </table>



       <div class="box-tools pull-left">

                  <!--CODIGO PARA IMPRIMIR REPORTE -->



         



                                  <!--    <form method="post" action="extensiones/tcpdf/pdf/consulta_documento.php" target="_blank"  >



                                  <input type="text" name="create_pdf"  hidden>-->





                  

                         <div class="btn-group">



                               <a class="btn btn-success" href="extensiones/exportar/consulta_documentos.php" aria-label="reporte xls" title="Descargar reporte en Excel">

                                  <i class="fa fa-file-excel-o" aria-hidden="true"></i>

                               </a>

                             <!--     <button class="btn btn-danger" title="Descargar reporte en pdf">                 

                          

                                   <i class="fa fa-file-pdf-o"></i>



                               </button>-->





                         </div> 



                  </form>



        </div>



      </div>



    </div>



  </section>



</div>


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









