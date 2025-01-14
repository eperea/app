<?php


if(isset($_POST['create_pdf'])){
require_once "../../../controladores/unidades.controlador.php";
require_once "../../../modelos/unidades.modelo.php";
require_once "../../../controladores/usuarios.controlador.php";
require_once "../../../modelos/usuarios.modelo.php";


class imprimirFactura{ 



public function traerImpresionFactura(){

//TRAEMOS LA INFORMACIÓN DE LA VENTA

$itemVenta = null;
$valorVenta = null;

$respuestaVenta = ControladorUnidades::ctrMostrarUnidades($itemVenta, $valorVenta);





//REQUERIMOS LA CLASE TCPDF

require_once('tcpdf_include.php');

$pdf = new TCPDF('L', 'cm', 'Legal', true, 'UTF-8', false);

$pdf->startPageGroup();

$pdf->AddPage();

// ---------------------------------------------------------

$bloque1 = <<<EOF

  <table>
    
    <tr>
      
      <td style="width:150px"><img src="images/logo-blanco-bloque.png"></td>

      <td style="background-color:white; width:500;" >
      
      <div class="box-tools pull-right" style="text-align:center">
                          <h1>INVENTARIO UNICO UNIDADES DOCUMENTALES</h1>

      </div>

      </td>   

    </tr>

  </table>

EOF;

$pdf->writeHTML($bloque1, false, false, false, false, '');

// ---------------------------------------------------------

$bloque2 = <<<EOF

  <table>
    
    <tr>
      
      <td style="width:540px"><img src="images/back.jpg"></td>
    
    </tr>

  </table>

  

EOF;

$pdf->writeHTML($bloque2, false, false, false, false, '');

// ---------------------------------------------------------

$bloque3 = <<<EOF

  <table style="font-size:8px; padding:5px 8px;">

    <tr>
      <td style="border: 1px solid #666; background-color:white; width:55px;  text-align:center">Empresa</td>
      <td style="border: 1px solid #666; background-color:white; width:50px;  text-align:center">Sede</td>
      <td style="border: 1px solid #666; background-color:white; width:70px;  text-align:center">Departamento</td>
      <td style="border: 1px solid #666; background-color:white; width:50px;  text-align:center">Cód. Serie</td>
      <td style="border: 1px solid #666; background-color:white; width:50px;  text-align:center">Código carpeta</td>
      <td style="border: 1px solid #666; background-color:white; width:150px; text-align:center">Descripción</td>
      <td style="border: 1px solid #666; background-color:white; width:50px;  text-align:center">Fecha inicial</td>
      <td style="border: 1px solid #666; background-color:white; width:50px;  text-align:center">Fecha Final</td>
      <td style="border: 1px solid #666; background-color:white; width:80px;  text-align:center">Disposición final</td>
      <td style="border: 1px solid #666; background-color:white; width:80px;  text-align:center">Soporte</td>
      <td style="border: 1px solid #666; background-color:white; width:100px; text-align:center">Observaciones</td>
      
      
    </tr>

  </table>

EOF;

$pdf->writeHTML($bloque3, false, false, false, false, '');

// ---------------------------------------------------------
$item= null;
$orden = null;

$respuestaProducto = ControladorUnidades::ctrMostrarUnidades($item, $orden);

foreach ($respuestaProducto as $key => $item1) {



              date_default_timezone_set('America/Bogota');


              $fecha_actual  = date($item1["UniFechafin"]); 


              $fecha = date("Y-m-d");



              $tiempoarch = number_format($item1["tiemp_arch_gest"] + $item1["tiemp_arch_cent"]);

              //Incrementando 2 años
              $mod_date = strtotime($fecha_actual." + ".$tiempoarch." years");

              $fecha1 = date("Y-m-d",$mod_date);

              if ($fecha1 < $fecha){
                # code... 

                  if ($item1["conservacion"] == "CONSERVACION TOTAL"){
                                  # code...

                    $fecha1 = "<button><strong><p style='color: gray'>CONSERVACION TOTAL</p></strong></button>";

                    } 

                  if ($item1["conservacion"] == "ELIMINACION"){
                                  # code...

                    $fecha1 = "<button><strong><p style='color: red'>ELIMINACION</p></strong></button>";
                    
                    } 

                  if ($item1["conservacion"] == "MEDIO TECNICO"){
                                  # code...

                    $fecha1 = "<button><strong><p style='color: blue'>DIGITALIZACION</p></strong></button>";
                    
                    } 

                  if ($item1["conservacion"] == "SELECCION O MUESTREO"){
                                  # code...

                    $fecha1 = "<button><strong><p style='color: black'>SELECCION O MUESTREO</p></strong></button>";
                    
                    }
                  }         

              else{

                  $fecha1 = "<button><strong><p style='color: green'>DOCUMENTO VIGENTE</p></strong></button> ";
              }

              


 


$bloque4 = <<<EOF

  <table style="font-size:7px; padding:5px 10px;">

    <tr>


    <td style="border: 1px solid #666; color:#333; background-color:white; width:55px; text-align:center">
        $item1[EMPRESA_idEmpresa]
      </td>

      <td style="border: 1px solid #666; color:#333; background-color:white; width:50px; text-align:center">
        $item1[SEDE_idSede]
      </td>

        <td style="border: 1px solid #666; color:#333; background-color:white; width:70px; text-align:center">
        $item1[DEPARTAMENTO_idDepartamento]
      </td>

      <td style="border: 1px solid #666; color:#333; background-color:white; width:50px; text-align:center">
        $item1[SERIES_idSeries]
      </td>
        <td style="border: 1px solid #666; color:#333; background-color:white; width:50px; text-align:center">
        $item1[codigo1]
      </td>

      <td style="border: 1px solid #666; color:#333; background-color:white; width:150px; text-align:center">
        $item1[descripcion]
      </td>
        <td style="border: 1px solid #666; color:#333; background-color:white; width:50px; text-align:center">
        $item1[UniFechaInicio]
      </td>

      <td style="border: 1px solid #666; color:#333; background-color:white; width:50px; text-align:center">
        $item1[UniFechafin]
      </td>
      

        <td style="border: 1px solid #666; color:#333; background-color:white; width:80px; text-align:center">
        $fecha1
      </td>

      <td style="border: 1px solid #666; color:#333; background-color:white; width:80px; text-align:center">
        $item1[fechadestruccion]
      </td>
        <td style="border: 1px solid #666; color:#333; background-color:white; width:100px; text-align:center">
        $item1[UniObservaciones]
      </td>

      


    </tr>

  </table>


EOF;

$pdf->writeHTML($bloque4, false, false, false, false, '');

}

// ---------------------------------------------------------

$bloque5 = <<<EOF


EOF;

$pdf->writeHTML($bloque5, false, false, false, false, '');



// ---------------------------------------------------------
//SALIDA DEL ARCHIVO 

//$pdf->Output('factura.pdf', 'D');
$pdf->Output('carpetas.pdf');

}

}

$factura = new imprimirFactura();
$factura -> traerImpresionFactura();

}

?>