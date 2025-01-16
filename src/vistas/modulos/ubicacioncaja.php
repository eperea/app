<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Ubicación cajas
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar ubicación cajas </li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

     
      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" style="width:100%">
         
        <thead>
         
         <tr>
           
           <th style="width:5px">#</th>
           <th style="width:5px">Bodega</th>
           <th style="width:5px">Bloque</th>
           <th style="width:5px"># Estante</th>
           <th style="width:5px"># Entrepaño</th>                           
           <th style="width:5px">Prefijo</th>           
           <th style="width:5px"># Caja</th>
           <th style="width:5px">Tipo</th>
            
           
           
          
          
          

         </tr> 

        </thead>

        <tbody>
          
         <?php



          $item = null;
          $valor = null;

      
          $Cajas = ControladorCajaUbicacion::ctrMostrarCajaUbicacion($item, $valor);

          foreach ($Cajas as $key => $value) {
           
            echo ' <tr>

                    <td>'.($key+1).'</td>

                    
                    
                    <td class="text-uppercase">'.$value["deposito"].'</td> 
                    <td class="text-uppercase">'.$value["bloque"].'</td>               
                    <td class="text-uppercase">'.$value["num_estante"].'</td>
                    <td class="text-uppercase">'.$value["num_entrepano"].'</td>
                    <td class="text-uppercase">'.$value["caja_prefijo"].'</td>
                    <td class="text-uppercase">'.$value["caja_codigo"].'</td>                     
                    <td class="text-uppercase">'.$value["caja_tipo"].'</td>
                                 

                     

                  </tr>';
          }

        ?>

          

        </tbody>

       </table>

           <div class="box-tools pull-left">
                  <!--CODIGO PARA IMPRIMIR REPORTE -->

                  <label>Reportes</label>

                  <form method="post" action="extensiones/tcpdf/pdf/ubicacioncaja.php" target="_blank"  >

                    <input type="text" name="create_pdf"  hidden>

                  
                         <div class="btn-group">

                               <a class="btn btn-success" href="extensiones/exportar/ubicacioncaja.php" aria-label="reporte xls" title="Descargar reporte en Excel">
                                  <i class="fa fa-file-excel-o" aria-hidden="true"></i>
                                </a>

                                <button class="btn btn-danger" title="Descargar reporte en pdf">                    
                          
                                   <i class="fa fa-file-pdf-o"></i>

                               </button>

                         </div> 

                  </form>

        </div>


      </div>

    </div>

  </section>

</div>


