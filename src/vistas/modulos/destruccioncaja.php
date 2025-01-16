<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Destruccion cajas
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar destruccion Cajas </li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

     
      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" style="width:100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
                           
           <th>Prefijo</th>
           <th># Caja</th> 
           <th>Status carpeta</th> 
          

         </tr> 

        </thead>

        <tbody>
          
         <?php

          $item =  null;
          $valor = null;

      
              $Cajas = ControladorCajaDestruccion::ctrMostrarCajaDestruccion($item, $valor);

              foreach ($Cajas as $key => $value) {
               
                echo ' <tr>

                        <td>'.($key+1).'</td>

                        
                      
                        <td class="text-uppercase">'.$value["caja_prefijo"].'</td>
                        <td class="text-uppercase">'.$value["caja_codigo"].'</td>
                         <td class="text-uppercase">'.$value["status_unidad"].'</td>
                        

                         

                      </tr>';
              }

        ?>

          

        </tbody>

       </table>

           <div class="box-tools pull-left">
                  <!--CODIGO PARA IMPRIMIR REPORTE -->

                  <label>Reportes</label>

                  <form method="post" action="extensiones/tcpdf/pdf/destruccioncaja.php" target="_blank"  >

                    <input type="text" name="create_pdf"  hidden>

                  
                         <div class="btn-group">

                               <a class="btn btn-success" href="extensiones/exportar/destruccioncaja.php" aria-label="reporte xls" title="Descargar reporte en Excel">
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


