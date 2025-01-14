<?php


if(isset($_POST['create_pdf'])){
require_once "../../../controladores/ubicacioncaja.controlador.php";
require_once "../../../modelos/ubicacioncaja.modelo.php";
require_once "../../../controladores/usuarios.controlador.php";
require_once "../../../modelos/usuarios.modelo.php";


class imprimirFactura{ 



public function traerImpresionFactura(){

//TRAEMOS LA INFORMACIÓN DE LA VENTA

$itemVenta = null;
$valorVenta = null;

$respuestaVenta = ControladorCajaUbicacion::ctrMostrarCajaUbicacion($itemVenta, $valorVenta);


//REQUERIMOS LA CLASE TCPDF

require_once('tcpdf_include.php');

$pdf = new TCPDF('L', 'cm', 'Legal', true, 'UTF-8', false);

$pdf->startPageGroup();

$pdf->AddPage();

// ---------------------------------------------------------

$bloque1 = <<<EOF

  <table>
    
    <tr>
      
      <td style="width:150px"><img src="images/icono-blanco-cabezote.png"></td>

      <td style="background-color:white; width:500;" >
      
      <div class="box-tools pull-right" style="text-align:center">
                          <h1>UBICACIÓN CAJAS</h1>

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
      <td style="border: 1px solid #666; background-color:white; width:112px;  text-align:center">Tipo caja</td>
      <td style="border: 1px solid #666; background-color:white; width:112px;  text-align:center">Prefijo</td>
      <td style="border: 1px solid #666; background-color:white; width:112px;  text-align:center"># Caja</td>
      <td style="border: 1px solid #666; background-color:white; width:112px;  text-align:center"># Estante</td>
      <td style="border: 1px solid #666; background-color:white; width:112px;  text-align:center"># Entrepaño</td>
      <td style="border: 1px solid #666; background-color:white; width:112px; text-align:center">Bloque</td>
      <td style="border: 1px solid #666; background-color:white; width:112px;  text-align:center">Bodega</td>      
    </tr>

  </table>

EOF;

$pdf->writeHTML($bloque3, false, false, false, false, '');

// ---------------------------------------------------------
$item= null;
$orden = null;

$respuestaProducto = ControladorCajaUbicacion::ctrMostrarCajaUbicacion($item, $orden);

foreach ($respuestaProducto as $key => $item1) {


$bloque4 = <<<EOF

  <table style="font-size:8px; padding:5px 10px; text-align:center" >

    <tr>


    <td style="border: 1px solid #666; color:#333; background-color:white; width:112px; text-align:center">
        $item1[caja_tipo]
      </td>

      <td style="border: 1px solid #666; color:#333; background-color:white; width:112px; text-align:center">
        $item1[caja_prefijo]
      </td>

        <td style="border: 1px solid #666; color:#333; background-color:white; width:112px; text-align:center">
        $item1[caja_codigo]
      </td>

      <td style="border: 1px solid #666; color:#333; background-color:white; width:112px; text-align:center">
        $item1[num_estante]
      </td>
        <td style="border: 1px solid #666; color:#333; background-color:white; width:112px; text-align:center">
        $item1[num_entrepano]
      </td>

      <td style="border: 1px solid #666; color:#333; background-color:white; width:112px; text-align:center">
        $item1[bloque]
      </td>
        <td style="border: 1px solid #666; color:#333; background-color:white; width:112px; text-align:center">
        $item1[deposito]
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
$pdf->Output('ubicacioncaja.pdf');

}

}

$factura = new imprimirFactura();
$factura -> traerImpresionFactura();

}

?>