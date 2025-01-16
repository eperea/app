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

      

      <td style="width:150px"><img src="images/icono-blanco-cabezote.png"></td>



      <td style="background-color:white; width:140px">

        

        <div style="font-size:8.5px; text-align:right; line-height:15px;">

          

          <br>

          NIT: 90.203.566-3



          <br>

          Dirección: Carrera 5 5 - 48



        </div>



      </td>



      <td style="background-color:white; width:140px">



        <div style="font-size:8.5px; text-align:right; line-height:15px;">

          

          <br>

          Teléfono: 6695778 ext: 103

          

          <br>

          archivobelal@gmail.com



        </div>

        

      </td>



      <td style="background-color:white; alingn:center;  text-align:center; color:red"><br><br><br>INVENTARIO UNICO DE UNIDADES DOCUMENTALES</td>



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



  <table style="font-size:8px; padding:5px 10px;">



    <tr>

      <td style="border: 1px solid #666; background-color:white; width:55px; text-align:center">Empresa</td>

      <td style="border: 1px solid #666; background-color:white; width:45px; text-align:center">Sede</td>

      <td style="border: 1px solid #666; background-color:white; width:50px; text-align:center">Departamento</td>

      <td style="border: 1px solid #666; background-color:white; width:48px; text-align:center">Código Serie</td>

      <td style="border: 1px solid #666; background-color:white; width:48px; text-align:center">Código</td>

      <td style="border: 1px solid #666; background-color:white; width:130px; text-align:center">Descripción</td>

      <td style="border: 1px solid #666; background-color:white; width:70px; text-align:center">Fecha inicial</td>

      <td style="border: 1px solid #666; background-color:white; width:70px; text-align:center">Fecha Final</td>

      <td style="border: 1px solid #666; background-color:white; width:68px; text-align:center">Unidad de conservacion</td>

      <td style="border: 1px solid #666; background-color:white; width:70px; text-align:center">Fecha destruccion</td>

      <td style="border: 1px solid #666; background-color:white; width:100px; text-align:center">Observaciones</td>

      <td style="border: 1px solid #666; background-color:white; width:45px; text-align:center">Caja</td>

      

    </tr>



  </table>



EOF;



$pdf->writeHTML($bloque3, false, false, false, false, '');



// ---------------------------------------------------------

$item= null;

$orden = null;



$respuestaProducto = ControladorUnidades::ctrMostrarUnidades($item, $orden);



foreach ($respuestaProducto as $key => $item1) {











$bloque4 = <<<EOF



  <table style="font-size:8px; padding:5px 10px;">



    <tr>

      

      <td style="border: 1px solid #666; color:#333; background-color:white; width:55px; text-align:center">

        $item1[EMPRESA_idEmpresa]

      </td>



      <td style="border: 1px solid #666; color:#333; background-color:white; width:45px; text-align:center">

        $item1[SEDE_idSede]

      </td>



        <td style="border: 1px solid #666; color:#333; background-color:white; width:50px; text-align:center">

        $item1[DEPARTAMENTO_idDepartamento]

      </td>



      <td style="border: 1px solid #666; color:#333; background-color:white; width:48px; text-align:center">

        $item1[SERIES_idSeries]

      </td>

        <td style="border: 1px solid #666; color:#333; background-color:white; width:48px; text-align:center">

        $item1[idUnidaddocumental]

      </td>



      <td style="border: 1px solid #666; color:#333; background-color:white; width:130px; text-align:center">

        $item1[descripcion]

      </td>

        <td style="border: 1px solid #666; color:#333; background-color:white; width:70px; text-align:center">

        $item1[UniFechaInicio]

      </td>



      <td style="border: 1px solid #666; color:#333; background-color:white; width:70px; text-align:center">

        $item1[UniFechafin]

      </td>

        <td style="border: 1px solid #666; color:#333; background-color:white; width:68px; text-align:center">

        $item1[conservacion]

      </td>



      <td style="border: 1px solid #666; color:#333; background-color:white; width:70px; text-align:center">

        $item1[fechadestruccion]

      </td>

        <td style="border: 1px solid #666; color:#333; background-color:white; width:100px; text-align:center">

        $item1[UniObservaciones]

      </td>



      <td style="border: 1px solid #666; color:#333; background-color:white; width:45px; text-align:center">

        $item1[CAJA_idCaja]

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

$pdf->Output('reporte.pdf');



}



}



$factura = new imprimirFactura();

$factura -> traerImpresionFactura();



}



?>