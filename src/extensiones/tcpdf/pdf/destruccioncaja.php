<?php


if(isset($_POST['create_pdf'])){
require_once "../../../controladores/destruccion_caja.controlador.php";
require_once "../../../modelos/destruccion_caja.modelo.php";
require_once "../../../controladores/usuarios.controlador.php";
require_once "../../../modelos/usuarios.modelo.php";


class imprimirFactura{ 



public function traerImpresionFactura(){

//TRAEMOS LA INFORMACIÓN DE LA VENTA

$itemVenta = null;
$valorVenta = null;

$respuestaVenta = ControladorCajaDestruccion::ctrMostrarCajaDestruccion($itemVenta, $valorVenta);

$fecha= date("Y-M-D");

//REQUERIMOS LA CLASE TCPDF

require_once('tcpdf_include.php');

$pdf = new TCPDF('L', 'cm', 'Legal', true, 'UTF-8', false);

$pdf->startPageGroup();

$pdf->AddPage();

// ---------------------------------------------------------

$bloque1 = <<<EOF

  <table >
    
    <tr>
      
      <td style="width:150px"><img src="images/icono-blanco-cabezote.png"></td>

      <td style="background-color:white; width:500;" >
      
      <div class="box-tools pull-right" style="text-align:center">
                          <h1>ELIMINACIÓN CAJAS</h1>
                          $fecha

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

  <table style="font-size:9px; padding:5px 10px; text-align:center">

    <tr>

      <td style="border: 1px solid #666; background-color:white; width:262px;  text-align:center">Prefijo</td>
      <td style="border: 1px solid #666; background-color:white; width:262px;  text-align:center"># Caja</td>
      <td style="border: 1px solid #666; background-color:white; width:262px;  text-align:center">Status unidad</td>
   
    </tr>

  </table>

EOF;

$pdf->writeHTML($bloque3, false, false, false, false, '');

// ---------------------------------------------------------
$item= null;
$orden = null;

$respuestaProducto = ControladorCajaDestruccion::ctrMostrarCajaDestruccion($item, $orden);

foreach ($respuestaProducto as $key => $item1) {


$bloque4 = <<<EOF

  <table style="font-size:8px; padding:5px 10px; text-align:center">

    <tr>


      <td style="border: 1px solid #666; color:#333; background-color:white; width:262px; text-align:center">
        $item1[caja_prefijo]
      </td>

        <td style="border: 1px solid #666; color:#333; background-color:white; width:262px; text-align:center">
        $item1[caja_codigo]
      </td>

      <td style="border: 1px solid #666; color:#333; background-color:white; width:262px; text-align:center">
        $item1[status_unidad]
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
$pdf->Output('destruccioncaja.pdf');

}

}

$factura = new imprimirFactura();
$factura -> traerImpresionFactura();

}

?>