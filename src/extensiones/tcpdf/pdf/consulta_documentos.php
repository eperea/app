<?php


if(isset($_POST['create_pdf'])){

require_once "../../../controladores/documentos.controlador.php";

require_once "../../../modelos/documentos.modelo.php";

require_once "../../../controladores/usuarios.controlador.php";

require_once "../../../modelos/usuarios.modelo.php";


class imprimirFactura{ 



public function traerImpresionFactura(){ 

//TRAEMOS LA INFORMACIÓN DE LA VENTA

$itemVenta = null;

$valorVenta = null;

$respuestaVenta = ControladorDocumentos::ctrMostrarDocumentos($itemVenta, $valorVenta);


//REQUERIMOS LA CLASE TCPDF

require_once('tcpdf_include.php');

$pdf = new TCPDF('L', 'cm', 'Legal', true, 'UTF-8', false);

$pdf->startPageGroup();

$pdf->AddPage();

// ---------------------------------------------------------

$bloque1 = <<<EOF


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


      <td style="border: 1px solid #666; background-color:white; width:87px;  text-align:center">Código carpeta</td>

      <td style="border: 1px solid #666; background-color:white; width:200px; text-align:center">Descripción</td>

      <td style="border: 1px solid #666; background-color:white; width:80px;  text-align:center">Fecha inicio carpeta</td>

      <td style="border: 1px solid #666; background-color:white; width:50px;  text-align:center">Fecha fin carpeta</td>

      <td style="border: 1px solid #666; background-color:white; width:50px;  text-align:center">Id_documento/td>

      <td style="border: 1px solid #666; background-color:white; width:50px;  text-align:center">Titulo documento/td>

      <td style="border: 1px solid #666; background-color:white; width:75px;  text-align:center">Descripción documento</td>

      <td style="border: 1px solid #666; background-color:white; width:75px;  text-align:center">Nota documento</td> 

      <td style="border: 1px solid #666; background-color:white; width:75px;  text-align:center">Nombre archivo</td>  

    </tr>

  </table>

EOF;

$pdf->writeHTML($bloque3, false, false, false, false, '');

// ---------------------------------------------------------
$item= null;
$orden = null;

$respuestaProducto = ControladorDocumentos::ctrMostrarDocumentos($item, $orden);

foreach ($respuestaProducto as $key => $item1) {


$bloque4 = <<<EOF

  <table style="font-size:8px; padding:5px 10px; text-align:center" >

    <tr>

    <td style="border: 1px solid #666; color:#333; background-color:white; width:87px; text-align:center">
        $item1[codigo1]
      </td>

      <td style="border: 1px solid #666; color:#333; background-color:white; width:200px; text-align:justify">
        $item1[descripcion]
      </td>

        <td style="border: 1px solid #666; color:#333; background-color:white; width:80px; text-align:center">
        $item1[UniFechaInicio]
      </td>

      <td style="border: 1px solid #666; color:#333; background-color:white; width:50px; text-align:center">
        $item1[UniFechafin]
      </td>
       <td style="border: 1px solid #666; color:#333; background-color:white; width:50px; text-align:center">
        $item1[id_documento]
      </td>

        <td style="border: 1px solid #666; color:#333; background-color:white; width:50px; text-align:center">
        $item1[titulo]
      </td>

      <td style="border: 1px solid #666; color:#333; background-color:white; width:75px; text-align:center">
        $item1[descripcion_tbl]
      </td>
        <td style="border: 1px solid #666; color:#333; background-color:white; width:75px; text-align:center">
        $item1[nota]
      </td>
       <td style="border: 1px solid #666; color:#333; background-color:white; width:75px; text-align:center">
        $item1[nombre_archivo]
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
$pdf->Output('consulta_documentos.pdf');

   }



      }

$factura = new imprimirFactura();

$factura -> traerImpresionFactura();



      }

?>