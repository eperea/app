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
      
      Administrar empresa
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar empresa</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarEmpresa">
          
          Agregar empresa

        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" style="width:100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Id Empresa</th>  
           <th>Nombre Empresa</th>
           <th>Nit</th> 
           <th>Sigla</th> 
           <th>Rep legal</th> 
           <th>Dirección</th> 
           <th>Teléfono</th> 
           <th>Email</th>            
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>
          
         <?php

          $item = null;
          $valor = null;

          $empresas = ControladorEmpresas::ctrMostrarEmpresas($item, $valor);

          foreach ($empresas as $key => $value) {
           
            echo ' <tr>

                    <td>'.($key+1).'</td>

                    <td class="text-uppercase">'.$value["idEmpresa"].'</td>                    
                    <td class="text-uppercase">'.$value["EmpNombreempresa"].'</td>
                    <td class="text-uppercase">'.$value["emnit"].'</td>
                    <td class="text-uppercase">'.$value["emsigla"].'</td>
                    <td class="text-uppercase">'.$value["emrepresentante"].'</td>
                    <td class="text-uppercase">'.$value["emdireccion"].'</td>
                    <td class="text-uppercase">'.$value["emtelefono"].'</td>
                    <td class="text-uppercase">'.$value["ememail"].'</td>

                     <td>

                      <div class="btn-group">
                          
                        <button class="btn btn-warning btnEditarEmpresa" idEmpresa="'.$value["idEmpresa"].'" data-toggle="modal" data-target="#modalEditarEmpresa"  >
                        <i class="fa fa-pencil"></i></button>';

                        if($_SESSION["perfil"] == "Administrador"){

                          echo '<button class="btn btn-danger btnEliminarEmpresa" idEmpresa="'.$value["idEmpresa"].'"><i class="fa fa-times"></i></button>';

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
MODAL AGREGAR EMPRESA
======================================-->

<div id="modalAgregarEmpresa" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar empresa</h4>

        </div>
    
    
    
    

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL IDEMPRESA -->
            
            <div class="form-group">

              <label>Código empresa</label>
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-barcode"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevaEmpresa"  >

              </div>

            </div>

            <!-- ENTRADA PARA NOMBRE Empresa -->

             <div class="form-group">

              <label>Ingresar nombre empresa</label>
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-bank"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoNombreEmpresa"  required>

              </div>

            </div>

            
            <!-- ENTRADA PARA NIT -->

             <div class="form-group">

              <label>Ingresar Nit</label>
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-code"></i></span> 

                <input type="number" class="form-control input-lg" name="nuevoNombreNit" required>

              </div>

            </div>

            <!-- ENTRADA PARA SIGLA -->

             <div class="form-group">

              <label>Ingresar sigla</label>
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-check-square"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoNombreSig" >

              </div>

            </div>

             <!-- ENTRADA PARA REP LEGAL -->

             <div class="form-group">

              <label>Ingresar representante legal</label>
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoNombreRep"  required>

              </div>

            </div>

            <!-- ENTRADA PARA DIRECCION -->              


             <div class="form-group">

              <label>Ingresar Dirección</label>

              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoNombreDir" required>

              </div>

            </div>

             <!-- ENTRADA PARA TELEFONO -->

             <div class="form-group">

              <label>Ingresar teléfono</label>
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-phone"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoNombreTel"  required>

              </div>

            </div>

            <!-- ENTRADA PARA EMAIL -->

             <div class="form-group">

              <label>Ingresar Email</label>
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 

                <input type="email" class="form-control input-lg" name="nuevoNombreEmail"  >

              </div>

            </div>


            

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Empresa</button>

        </div>

        <?php

        $crearEmpresas = new ControladorEmpresas();
        $crearEmpresas -> ctrCrearEmpresas();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR EMPRESA
======================================-->

<div id="modalEditarEmpresa" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar empresa</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL IDSERIE -->
            
            <div class="form-group">

             <label>Código empresa</label>
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-barcode"></i></span> 

                <input type="text" class="form-control input-lg" name="editarnuevaEmpresa" id="editarnuevaEmpresa"  >

              </div>

            </div>

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">

              <label>Ingresar nombre empresa</label>
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-building"></i></span>  

                <input type="text" class="form-control input-lg" name="editarEmpresa" id="editarEmpresa" required>

                 <input type="hidden"  name="idEmpresa" id="idEmpresa" required>

              </div>

            </div>

             <!-- ENTRADA PARA EL NIT -->
            
             <div class="form-group">

              <label>Ingresar Nit</label>
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-code"></i></span> 

                <input type="number" class="form-control input-lg" name="editarEmpresaNit" id="editarEmpresaNit" required>

                 
              </div>

            </div>

            <!-- ENTRADA PARA LA SIGLA -->
            
             <div class="form-group">

              <label>Ingresar sigla</label>
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-check-square"></i></span> 

                <input type="text" class="form-control input-lg" name="editarEmpresaSig" id="editarEmpresaSig" required>

                 
              </div>

            </div>


            <!-- ENTRADA PARA EL REPRESENTANTE LEGAL -->
            
            <div class="form-group">

              <label>Ingresar representante legal</label>
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="editarEmpresaRep" id="editarEmpresaRep" required>

                 
              </div>

            </div>

            <!-- ENTRADA PARA LA DIRECCION-->
            
            <div class="form-group">

              <label>Ingresar Dirección</label>

              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg" name="editarEmpresaDir" id="editarEmpresaDir" required>

                 
              </div>

            </div>

            <!-- ENTRADA PARA EL TELEFONO -->
            
           <div class="form-group">

              <label>Ingresar teléfono</label>
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-phone"></i></span> 
 

                <input type="text" class="form-control input-lg" name="editarEmpresaTel" id="editarEmpresaTel" required>

                 
              </div>

            </div>

            <!-- ENTRADA PARA EL EMAIL -->
            
            <div class="form-group">

              <label>Ingresar Email</label>
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 

                <input type="email" class="form-control input-lg" name="editarEmpresaEmail" id="editarEmpresaEmail" required>

                <input type="hidden"  name="idEmpresa" id="idEmpresa" required>
                 
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

          $editarEmpresa = new ControladorEmpresas();
          $editarEmpresa -> ctrEditarEmpresa();

        ?> 

    </div>

  </div>

</div>


 <?php

        $EliminarEmpresa = new ControladorEmpresas();
        $EliminarEmpresa -> ctrEliminarEmpresa();
  ?>